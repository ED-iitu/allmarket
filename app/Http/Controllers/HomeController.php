<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use Session;
use Redirect;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    protected $client;

    protected $response;

    protected $errors;

    public function __construct()
    {
        sleep(1);
        $this->client = new Client();
    }

    public function index()
    {
        $popular = $this->getPopularProduct();
        $recommended = $this->getRecommendedProducts();
        $sale = $this->getSaleProducts();
        $sections = $this->getAllSections();

        $token = session()->get('token');
        $favIds = [];

        if ($token != null) {
            $ids = $this->getFavorite($token);

            foreach ($ids as $id) {
                $favIds[$id->product->id] = $id->product->id;
            }

            session()->put('favorited', $favIds);
        }


        return view('home', [
            'popular_products' => $popular->products,
            'recommended_products' => $recommended->products,
            'sale_products' => $sale->products,
            'sections' => $sections->sections,
            'cities' => $this->getAvailableCitites()
        ]);
    }

    public function getFavorite($token)
    {
        try {
            $response = $this->client->request('GET', env('API_URL') . '/favorites', [
                'query' => [
                    'city_id' => session()->get('city')['id'] ?? 6,
                ],
                'headers' =>
                    [
                        'Authorization' => 'Bearer ' . $token,
                        'Accept' => 'application/json'
                    ]

            ]);
        } catch (ClientException $e) {
            $this->errors = json_decode($e);

            return redirect()->back()->with('error', 'Произошла ошибка попробуйте позже');
        }

        $response = json_decode($response->getBody()->getContents());


        return $response->favorites;
    }

    public function addToFavorite(Request $request)
    {
        $token = session()->get('token');
        $product_id = $request->product_id;
        $successData['success'] = 'Товар успешно добавлен в избранное';
        $deletedSuccess['success'] = 'Товар успешно удален из избранных';

        if (null !== $token) {

            $this->client->request('POST', env('API_URL') . '/favorites', [
                'query' => [
                    'city_id' => session()->get('city')['id'] ?? 6,
                ],
                'form_params' => [
                    'product_id' => $product_id
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json'
                ]
            ]);

            $alreadyInFav = (array)session()->get('favorited');

            if (in_array($product_id, $alreadyInFav)) {
                unset($alreadyInFav[$product_id]);

                return $deletedSuccess;
            } else {
                session()->put('favorited', array_push($alreadyInFav, $product_id));

                return $successData;
            }

        } else {
            return [
                'success' => "Вы должны быть авторизованным"
            ];
        }
    }

    public function getPopularProduct()
    {

        $response = $this->client->request('GET', env('API_URL') . '/products/popular', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
                'order' => "price.desc",
                'paginate' => 12,
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $response = $response->getBody()->getContents();

        return json_decode($response);
    }

    public function getRecommendedProducts()
    {

        $response = $this->client->request('GET', env('API_URL') . '/products/recommended', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
                'paginate' => 12,
                'order' => "price.desc"
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $response = $response->getBody()->getContents();

        return json_decode($response);
    }

    public function getSaleProducts(Request $request = null)
    {

        $response = $this->client->request('GET', env('API_URL') . '/products/sale', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
                'paginate' => 12,
                'order' => $request->order ?? "price.asc",
                'page' => $request->page ?? 1,
                'price_from' => $request->price_from ?? 0,
                'price_to' => $request->price_to ?? 10000000
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $response = $response->getBody()->getContents();

        return json_decode($response);
    }

    public function getAllSections()
    {
        $client = new Client();
        $response = $client->request('GET', env('API_URL') . '/product_sections', [
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);


        $response = $response->getBody()->getContents();


        return json_decode($response);
    }

    public function about()
    {
        $sections = $this->getAllSections();


        return view('about', [
            'sections' => $sections->sections,
            'cities' => $this->getAvailableCitites()
        ]);
    }

    public function faq()
    {
        $sections = $this->getAllSections();
        return view('faq', [
            'sections' => $sections->sections,
            'cities' => $this->getAvailableCitites()
        ]);
    }

    public function sections()
    {
        $sections = $this->getAllSections();

        return view('sections', [
            'sections' => $sections->sections,
            'cities' => $this->getAvailableCitites()
        ]);
    }

    public function getSectionById($sectionId, Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', env('API_URL') . '/product_sections/' . $sectionId, [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,

            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $products = $this->getProductsBySectionId($sectionId, $request);
        $response = $response->getBody()->getContents();
        $sections = $this->getAllSections();
        $res = json_decode($response);

        $token = session()->get('token');

        if ($token != null) {
            $ids = $this->getFavorite($token);

            foreach ($ids as $id) {
                $favIds[$id->product->id] = $id->product->id;
            }

            if (!empty($favIds)) {
                session()->put('favorited', $favIds);
            }
        }

        if (\request()->ajax()) {
            return view('section-product-list', [
                'products' => $products->products,
                'links' => $products->links,
                'meta' => $products->meta,
                'cities' => $this->getAvailableCitites()
            ]);
        }

        return view('section', [
            'section'  => $res->section,
            'sectionList' => $sections->sections,
            'sections' => $sections->sections,
            'products' => $products->products,
            'links'    => $products->links,
            'meta'     => $products->meta,
            'cities'   => $this->getAvailableCitites()
        ]);
    }

    public function getSections($id)
    {
        $client = new Client();
        $response = $client->request('GET', env('API_URL') . '/product_sections/' . $id . '/categories', [
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);


        $response = $response->getBody()->getContents();

        $res = json_decode($response);

        return $res->categories;
    }

    public function getProductsBySectionId($sectionId, $request)
    {
        $client = new Client();
        $response = $client->request('GET', env('API_URL') . '/product_sections/' . $sectionId . '/products', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
                'paginate' => 12,
                'order' => $request->order ?? '',
                'page' => $request->page ?? 1,
                'price_from' => $request->price_from ?? 0,
                'price_to' => $request->price_to ?? 100000
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $response = $response->getBody()->getContents();

        return json_decode($response);
    }

    public function product($id)
    {
        $client = new Client();
        $response = $client->request('GET', env('API_URL') . '/products/' . $id, [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $reviews = $this->getReviews($id);

        $response = $response->getBody()->getContents();

        $res = json_decode($response);

        $categories = $this->getSections($res->product->section->id);

        $sections = $this->getAllSections();

        $reviews = json_decode($reviews);

        return view('product', [
            'sections' => $sections->sections,
            'product' => $res->product,
            'categories' => $categories,
            'cities' => $this->getAvailableCitites(),
            'reviews' => $reviews->reviews ?? []
        ]);

    }

    public function getProductsByCategoryId($section_id, $category_id, Request $request)
    {
        $client = new Client();
        $response = $client->request('GET', env('API_URL') . '/product_categories/' . $category_id . '/products', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
                'paginate' => 12,
                'order' => $request->order ?? '',
                'page' => $request->page ?? 1,
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $response = $response->getBody()->getContents();

        $res = json_decode($response);
        $category = "";

        $token = session()->get('token');

        if ($token != null) {
            $ids = $this->getFavorite($token);

            foreach ($ids as $id) {
                $favIds[$id->product->id] = $id->product->id;
            }

            if (!empty($favIds)) {
                session()->put('favorited', $favIds);
            }
        }

        foreach ($res->products as $cat) {
            $category = $cat->category->title;
        }

        $categories = $this->getSections($section_id);
        $sections = $this->getAllSections();

        if (\request()->ajax()) {
            return view('section-product-list', [
                'products' => $res->products,
                'links' => $res->links,
                'meta' => $res->meta
            ]);
        }

        return view('category-products', [
            'category' => $category,
            'categories' => $categories,
            'sections' => $sections->sections,
            'section_id' => $section_id,
            'products' => $res->products,
            'links' => $res->links,
            'meta' => $res->meta,
            'cities' => $this->getAvailableCitites()
        ]);
    }

    public function registration(Request $request)
    {
        $client = new Client();

        $username = $request->name;
        $phone = $request->phone;

        try {

            $client->request('POST', env('API_URL') . '/auth/register', [
                'auth' => [
                    'dev@allmarket.kz',
                    'dev'
                ],
                'form_params' => [
                    'name' => $request->name,
                    'phone' => $request->phone,
                    'city_id' => session()->get('city')['id'] ?? 6,
                ],
                'headers' => [
                    'Accept' => 'application/json'
                ],

            ]);

            if (!$this->errors) {
                session()->put('username', $username);
                session()->put('phone', $phone);
            }

            return redirect()->back()->with('success', 'На ваш номер отправлен смс');

        } catch (ClientException $e) {
            $this->errors = json_decode($e->getResponse()->getBody()->getContents())->errors->phone[0];

            if ($this->errors) {
                return redirect()->back()->with('error', $this->errors);
            }
        }

    }

    public function login(Request $request)
    {
        $client = new Client();

        $phone = $request->phone;

        try {

            $client->request('POST', env('API_URL') . '/auth/login', [
                'auth' => [
                    'dev@allmarket.kz',
                    'dev'
                ],
                'form_params' => [
                    'phone' => $phone,
                ],
                'headers' => [
                    'Accept' => 'application/json'
                ],

            ]);

            if (!$this->errors) {
                session()->put('phone', $phone);
            }

            return [
                'success' => 200,
            ];

        } catch (ClientException $e) {
            $this->errors = json_decode($e->getResponse()->getBody()->getContents())->errors->phone[0];

            if ($this->errors) {
                return redirect()->back()->with('error', $this->errors);
            }
        }
    }

    public function sendSms(Request $request)
    {
        $client = new Client();

        $sms = (int)$request->one . '' . $request->two . '' . $request->three . '' . $request->four;

        $phone = session()->get('phone');

        if (!$phone) {
            return redirect()->back()->with('error', 'Произошла ошибка попробуйте позже');
        }

        try {

            $responce = $client->request('POST', env('API_URL') . '/auth/verify', [
                'auth' => [
                    'dev@allmarket.kz',
                    'dev'
                ],
                'form_params' => [
                    'phone' => $phone,
                    'code' => $sms
                ],
                'headers' => [
                    'Accept' => 'application/json'
                ],

            ]);

            $res = json_decode($responce->getBody()->getContents());

            $token = $res->token;

            $username = $this->getUserData($token);

            if (!$this->errors) {
                session()->put('token', $token);
                session()->put('phone', $phone);
                session()->put('username', $username->user->name);
            }

            return redirect()->back();

        } catch (ClientException $e) {
            $this->errors = $e;

            if ($this->errors) {
                return redirect()->back()->with('error', 'Ошибка при отправке смс, либо смс введен не верно, попробуйте еще раз');
            }
        }


    }

    public function getUserData($token)
    {
        $client = new Client();

        try {

            $responce = $client->request('GET', env('API_URL') . '/users',
                [
                    'headers' =>
                        [
                            'Authorization' => 'Bearer ' . $token,
                            'Accept' => 'application/json'
                        ]
                ]
            );

        } catch (ClientException $e) {

            if ($this->errors) {
                return redirect()->back()->with('error', 'Ошибка при отправке смс, попробуйте еще раз');
            }
        }

        return json_decode($responce->getBody()->getContents());
    }

    public function account()
    {

        $token = session()->get('token');


        if (null === $token) {
            return redirect()->route('home');
        } else {
            $favorites = $this->getFavorite($token);

            $orders = $this->getUserOrders();
            foreach ($orders->orders as $order) {
                $productOrder = $this->getOrderById($order->id);
                $order->products = $productOrder->order->items;

            }

            $userData = $this->getUserData($token);

            $sections = $this->getAllSections();


            return view('personal-account', [
                'favorites' => $favorites,
                'orders' => $orders->orders,
                'user' => $userData->user,
                'sections' => $sections->sections,
                'cities' => $this->getAvailableCitites()
            ]);
        }
    }

    public function getOrderById($id)
    {
        sleep(0.5);
        //https://dev-api.allmarket.kz/api/v2/orders/1164?city_id=6

        $token = session()->get('token');

        $responce = $this->client->request('GET', env('API_URL') . '/orders/' . $id, [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ]
        ]);

        $responce = $responce->getBody()->getContents();

        $responce = json_decode($responce);


        return $responce;
    }

    public function duplicate_order(Request $request)
    {
        sleep(0.5);
        $getOrder = $this->getOrderById($request->order_id);
        $products = $getOrder->order->items;
        $cart = session()->get('cart');
        if (!$cart) {
            $cart_product = [];
            foreach ($products as $product) {
                $cart_product[$product->id] =
                    [
                        "title" => $product->product->title,
                        "category" => $product->product->category->title,
                        "quantity" => $product->count,
                        "price" => $product->price,
                        "image" => $product->product->image,
                    ];
            }
            session()->put('cart', $cart_product);
            return redirect()->back()->with('success', 'Заказ успешно склонирован');
        } else {
            foreach ($products as $product) {
                if (isset($cart[$product->id])) {
                    $cart[$product->id]['quantity'] += (int)$product->count;
                } else {
                    $cart[$product->id] = [
                        "title" => $product->product->title,
                        "category" => $product->product->category->title,
                        "quantity" => $product->count,
                        "price" => $product->price,
                        "image" => $product->product->image
                    ];
                }
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Товар успешно добавлен в корзину!');
        }
    }


    public function logout()
    {
        session()->remove('username');
        session()->remove('phone');
        session()->remove('favorited');
        session()->remove('cart');
        session()->remove('totalPrice');
        return redirect()->route('home');
    }


    public function search(Request $request)
    {

        $client = new Client();

        $url = env('API_URL') . '/products/search';

        try {
            $response = $client->request('GET', $url, [
                'auth' => [
                    'dev@allmarket.kz',
                    'dev'
                ],
                'query' => [
                    'city_id' => session()->get('city')['id'] ?? 6,
                    'term' => $request->title
                ],
                'headers' => [
                    'Accept' => 'application/json'
                ],
            ]);

        } catch (ClientException $e) {
            $this->errors = json_decode($e->getResponse()->getBody()->getContents())->errors->phone[0];

            if ($this->errors) {
                return redirect()->back()->with('error', $this->errors);
            }
        }

        $response = $response->getBody()->getContents();

        $res = json_decode($response);


        $sections = $this->getAllSections();

        return view('search-page', [
            'sections' => $sections->sections,
            'products' => $res->products,
            'title' => $request->title,
            'cities' => $this->getAvailableCitites()
        ]);
    }

    public function addToServerCart($token, $product_id, $offerId, $quantity = 1)
    {
        $responce = $this->client->request('POST', env('API_URL') . '/baskets/increase', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'form_params' => [
                'count' => $quantity,
                'product_id' => $product_id,
                'offer_id' => $offerId
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ]
        ]);

        $res = $responce->getBody()->getContents();

        return json_decode($res);
    }

    public function addToCart(Request $request)
    {
        $id = $request->product_id;
        $quantity = $request->quantity;
        $product = $this->getProductById($id);
        $token = session()->get('token');

//        if (isset($product)) {
//            dd($product);
//        } else {
//            dd("Piska");
//        }

      //  $this->addToServerCart($token, $id, $offerId, $quantity);


        $productPrice = $product->price;

        if ($product->price_sale > $product->price or $product->price_sale != 0) {
            $productPrice = $product->price_sale;
        }

        $productPriceSession = session()->get('totalPrice');

        if (!$productPriceSession) {
            session()->put('totalPrice', $productPrice);
        } else {
            session()->put('totalPrice', $productPriceSession + $productPrice);
        }

        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if (!$cart) {
            $cart = [
                $id => [
                    "title" => $product->title,
                    "category" => $product->category->title,
                    "quantity" => $quantity,
                    "price" => $productPrice,
                    "image" => $product->image
                ]
            ];

            session()->put('cart', $cart);
        }
        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] += (int)$quantity;
            session()->put('cart', $cart);
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "title" => $product->title,
            "category" => $product->category->title,
            "quantity" => $quantity,
            "price" => $productPrice,
            "image" => $product->image
        ];
        session()->put('cart', $cart);

    }

    public function addToCartSale(Request $request)
    {
        $share_id = $request->share_id;

        $response = $this->client->request('GET', env('API_URL') . '/sales/' . $share_id, [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);
        $response = $response->getBody()->getContents();
        $shareProducts = $this->getShareProducts($response);

        // if cart is empty then this the first product
        $cart = session()->get('cart');
        if (!$cart) {
            $cart_product = [];
            foreach ($shareProducts as $product) {
                $cart_product[$product->id] =
                    [
                        "title" => $product->title,
                        "category" => $product->category->title,
                        "quantity" => 1,
                        "price" => $product->price_sale ?? $product->price,
                        "image" => $product->image,
                        "type" => 'sales',
                    ];
            }
            session()->put('cart', $cart_product);
        } else {
            foreach ($shareProducts as $product) {
                if (isset($cart[$product->id])) {
                    $cart[$product->id]['quantity'] += (int)$product->count;
                } else {
                    $cart[$product->id] = [
                        "title" => $product->title,
                        "category" => $product->category->title,
                        "quantity" => 1,
                        "price" => $product->price_sale ?? $product->price,
                        "image" => $product->image,
                        "type" => 'sales',
                    ];
                }
            }
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Акцния успешно добавлена в корзину');
    }

    public function removeFromServerCart($id)
    {
        //https://dev-api.allmarket.kz/api/v2/baskets/2

        $token = session()->get('token');

        $this->client->request('DELETE', env('API_URL') . '/baskets/' . $id, [
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ]
        ]);
    }

    public function removeToCart(Request $request)
    {
        $id = $request->product_id;
        $quantity = $request->quantity;
        $product = $this->getProductById($id);
        $token = session()->get('token');

        if (null === $token) {
            return redirect()->back()->with('error', 'Не удалось найти пользователя');
        }

        $this->removeFromServerCart($id);

//        $this->addToServerCart($token, $id, $offerId, $quantity);

        $productPrice = $product->price;
        if ($product->price_sale > $product->price or $product->price_sale != 0) {
            $productPrice = $product->price_sale;
        }

        $cart = session()->get('cart');

        // if cart not empty then check if this product exist then increment quantity
        if (isset($cart[$id])) {
            $cart[$id]['quantity']--;
            session()->put('cart', $cart);
        }
//        // if item not exist in cart then add to cart with quantity = 1
//        $cart[$id] = [
//            "title" => $product->title,
//            "category" => $product->category->title,
//            "quantity" => $quantity,
//            "price" => $productPrice * $quantity,
//            "image" => $product->image
//        ];
//        session()->put('cart', $cart);
    }

    public function update_cart()
    {
        $count = 0;
        $prices = 0;
        $cart = session()->get('cart');
        $share = [];
        if ($cart != false) {
            foreach ($cart as $item) {

                $count += $item['quantity'];
                $prices += (int)$item['price'] * $item['quantity'];
            }
        }


        $totalPrice = session()->get('totalPrice');


//        if ($totalPrice && (int)$totalPrice > 2000) {
//            $share = $this->getShareById(201);
//
//            foreach ($share as $product) {
//
//                // if cart is empty then this the first product
//                if (!$cart) {
//                    $cart = [
//                        $product->id => [
//                            "title" => $product->title,
//                            "category" => $product->category->title,
//                            "quantity" => 1,
//                            "price" => 1,
//                            "image" => $product->image,
//                            "type" => 'sales',
//                        ]
//                    ];
//                    session()->put('cart', $cart);
//                } else {
//
//                    foreach ($cart as $key => $cartProduct) {
//                        if (in_array($product->id, $cart)) {
//                            continue;
//                        } else {
//                            // if item not exist in cart then add to cart with quantity = 1
//                            $cart[$product->id] = [
//                                "title" => $product->title,
//                                "category" => $product->category->title,
//                                "quantity" => 1,
//                                "price" => 1,
//                                "image" => $product->image,
//                                "type" => 'sales'
//                            ];
//                            session()->put('cart', $cart);
//                        }
//                    }
//
//                }
//            }
//        }


        return response()->json(['count' => $count, 'prices' => $prices, 'shares' => $share], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    protected function update_cart_data()
    {
        $total_sum = 0;
        $countProduct = 0;
        $cart_products = [];
        $countCartItems = session()->get('cart');


        if ($countCartItems != false) {
            foreach ($countCartItems as $key => $item) {
                    $product_array = [
                        'count' => $item['quantity'],
                        'product_id' => $key,
                        'title' => $item["title"],
                        'price' => $item["price"],
                        'image' => $item["image"],
                        'total' => (int)$item["price"] * $item['quantity'],
                        'category_title' => $item["category"],
                        'type' => $item["type"] ?? 'main'
                    ];
                    array_push($cart_products, $product_array);
                    $total_sum += (int)$item["price"] * $item['quantity'];
                    $countProduct += 1;


            }
        }

        $wines = ['products' => $cart_products];
        $count_wine_array = ['count_products' => $countProduct];
        $total_sums = ['total_sum' => $total_sum];
        $result = array_merge($wines, $count_wine_array, $total_sums);

        return response()->json($result, 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
    }

    protected function remove_to_cart(int $product_id, int $qty = 1)
    {
        $checkProduct = $this->getProductById($product_id);
        $countItem = $checkProduct->count;
        if ($qty > $countItem) {
            return response()->json(['error' => trans('shop.error.many-item')], 400, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
        }
        $sessionItems = session()->get('cart');
        if ($sessionItems) {
            if ($qty == 0) {
                foreach ($sessionItems as $key => $item) {
                    if ($product_id == $key) {
                        unset($sessionItems[$key]);

                    }
                }
            }
            $count = false;
            session()->forget('cart');
            if ($sessionItems) {
                $count = True;
                session()->put('cart', $sessionItems);
            }

            return response()->json(['success' => trans('shop.success.remove-cart'), 'count' => $count], 200, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
        } else {
            return response()->json(['success' => trans('shop.success.no-cart')], 404, array('Content-Type' => 'application/json;charset=utf8'), JSON_UNESCAPED_UNICODE);
        }
    }


    public function getProductById($id)
    {
        try {
            $client = new Client();
            $response = $client->request('GET', env('API_URL') . '/products/' . $id, [
                'query' => [
                    'city_id' => session()->get('city')['id'] ?? 6,
                ],
                'auth' => [
                    'dev@allmarket.kz',
                    'dev'
                ]
            ]);

            $response = $response->getBody()->getContents();

            $res = json_decode($response);

            return $res->product;
        } catch (RequestException $e) {
            return redirect()->back();
        }

        return 0;
    }

    public function getUserOrders()
    {
        //https://allmarket.armenianbros.com/api/v2/orders

        $token = session()->get('token');
        $response = $this->client->request('GET', env('API_URL') . '/orders', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ]
        ]);

        $response = $response->getBody()->getContents();

        return json_decode($response);
    }


    public function updateUserData(Request $request)
    {
        if ($request->happy != 'yes') {
            return redirect()->back()->with('error', 'Для обновления Вам необходимо принять условия Полиитики');
        }

        $token = session()->get('token');

        if (null == $token) {
            return redirect()->route('home');
        }

        try {
            $responce = $this->client->request('PUT', env('API_URL') . '/users',
                [
                    'headers' =>
                        [
                            'Authorization' => 'Bearer ' . $token,
                            'Accept' => 'application/json'
                        ],
                    'query' => [
                        'name' => $request->name,
                        'phone' => $request->phone,
                        'city_id' => $request->city_id,
                        'email' => $request->email,
                    ],
                ]
            );

            if ($responce) {
                session()->remove('username');
                session()->remove('phone');
                session()->put('username', $request->name);
                session()->put('phone', $request->phone);
                return redirect()->back()->with('success', 'Данные успешно обновлены');
            }

        } catch (ClientException $e) {

            if ($this->errors) {
                return redirect()->back()->with('error', 'Ошибка при отправке смс, попробуйте еще раз');
            }
        }
    }

    public function basketDelete()
    {
        $token = session()->get('token');

        if (null === $token) {
            // TODO
            return redirect()->back();
        }

        $responce = $this->client->request('DELETE', env('API_URL') . '/baskets', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ]
        ]);

        session()->remove('cart');
        session()->remove('totalPrice');

        return $responce->getBody()->getContents();
    }

    public function checkout()
    {
        $token = session()->get('token');

        // https://dev-api.allmarket.kz/api/v2/baskets/multiple?city_id=2

        $products = session()->get('cart');
        $body = [];

        foreach ($products as $key => $product) {
            $body['items'][] = [
                'product_id' => $key,
                'count' => $product["quantity"]
            ];
        }

       $this->client->request('POST', env('API_URL') . '/baskets/multiple', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ],
            'json' => $body,
        ]);


        $responce = $this->client->request('POST', env('API_URL') . '/checkout', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ]
        ]);

        return $responce->getBody()->getContents();
    }

    public function createUserOrder(Request $request)
    {
        $token = session()->get('token');

        $responce = $this->client->request('POST', env('API_URL') . '/orders', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'form_params' => [
                'address' => $request->address,
                'phone' => $request->phone,
                'delivery_time_id' => $request->delivery_time_id,
                'comment' => $request->comment ?? null
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ]
        ]);

        $res = $responce->getBody()->getContents();

        $res = json_decode($res);


        if ($request->payment_type == 2) {
            $res = $this->createPayment($res->id, 2, '', 1);

            return json_encode($res);
        }

        session()->remove('cart');
    }

    public function createPayment($orderId, $type, $promo_code, $decrease)
    {
        $token = session()->get('token');

        $responce = $this->client->request('POST', env('API_URL') . '/order_payments', [
            'form_params' => [
                'order_id' => $orderId,
                'type_id' => $type,
                'promo_code' => $promo_code ?? '',
                'decrease_balance' => $decrease
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ]
        ]);

        $res = $responce->getBody()->getContents();
        $res = json_decode($res);

        return $res;
    }

    public function sale(Request $request)
    {

        $sale = $this->getSaleProducts($request);

        $token = session()->get('token');

        if ($token != null) {
            $ids = $this->getFavorite($token);

            foreach ($ids as $id) {
                $favIds[$id->product->id] = $id->product->id;
            }

            if (!empty($favIds)) {
                session()->put('favorited', $favIds);
            }
        }

        if (\request()->ajax()) {
            return view('section-product-list', [
                'products' => $sale->products,
                'links' => $sale->links,
                'meta' => $sale->meta,
                'cities' => $this->getAvailableCitites()
            ]);
        }

        $sections = $this->getAllSections();
        return view('sale', [
            'sections' => $sections->sections,
            'products' => $sale->products,
            'links' => $sale->links,
            'meta' => $sale->meta,
            'cities' => $this->getAvailableCitites()
        ]);
    }

    public function getSharesList()
    {
        $response = $this->client->request('GET', env('API_URL') . '/sales', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $response = $response->getBody()->getContents();

        return json_decode($response);
    }

    public function shares()
    {
        $sections = $this->getAllSections();
        $shares = $this->getSharesList();

        return view('shares', [
            'sections' => $sections->sections,
            'shares' => $shares,
            'cities' => $this->getAvailableCitites()
        ]);
    }

    public function getShareById($id) {
        $response = $this->client->request('GET', env('API_URL') . '/sales/' . $id, [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $response = $response->getBody()->getContents();

        $shareProducts = $this->getShareProducts($response);

        return $shareProducts;
    }


    public function getSharesById($id)
    {
        $sections = $this->getAllSections();
        $response = $this->client->request('GET', env('API_URL') . '/sales/' . $id, [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $response = $response->getBody()->getContents();

        $shareProducts = $this->getShareProducts($response);

        $response = json_decode($response);
        return view('shares-product-list', [
            'sections' => $sections->sections,
            'share' => $response->sale,
            'shareProducts' => $shareProducts,
            'cities' => $this->getAvailableCitites()
        ]);


    }

    protected function getShareProducts($data)
    {
        $data = json_decode($data);
        $products = [];
        foreach ($data->sale->offers as $offers) {
            if (isset($offers->rules->sale_items)) {
                foreach ($offers->rules->sale_items as $items) {
                    if ($items->price) {
                        $items->product->price = $items->price;
                    }
                    $products[] = $items->product;
                }
            }
            if (isset($offers->rules->base_items)) {
                foreach ($offers->rules->base_items as $items) {
                    $products[] = $items->product;
                }
            }
        }
        return $products;
    }


    public function getAvailableCitites()
    {
        $response = $this->client->request('GET', env('API_URL') . '/cities', [
            'query' => [
                'city_id' => session()->get('city')['id'] ?? 6,
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $response = $response->getBody()->getContents();

        $response = json_decode($response);


        return $response->cities;
    }

    public function addRaiting(Request $request)
    {

        $token = session()->get('token');

        if (null === $token) {
            return redirect()->back()->with('error', 'Необходима авторизация');
        }

        try {
            $this->client->request('GET', env('API_URL') . '/' . $request->productId . '/ratings', [
                'form_params' => [
                    'rating' => $request->raiting,
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json'
                ],
            ]);

            return redirect()->back()->with('success', 'Спасибо, Ваш голос принят!');

        } catch (ClientException $e) {
            return redirect()->back()->with('error', 'Произошла ошибка');
        }
    }


    public function selectCity($id, $title)
    {
        $city = session()->get('city');

        if ($city == null) {
            $city = [
                'id' => $id,
                'title' => $title
            ];

            session()->put('city', $city);
        }

        if ($city["id"] !== $id) {
            session()->remove('city');

            $city = [
                'id' => $id,
                'title' => $title
            ];

            session()->put('city', $city);
        }

        return redirect()->back();
    }

    public function addReview(Request $request)
    {
        $token = session()->get('token');

        if (null === $token) {
            return redirect()->back()->with('error', 'Необходима авторизация');
        }

        //https://dev-api.allmarket.kz/api/v2/products/11/reviews
        try {
            $this->client->request('POST', env('API_URL') . '/products/' . $request->productId . '/reviews', [
                'form_params' => [
                    'message' => $request->message,
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json'
                ],

            ]);

            return redirect()->back()->with('success', 'Спасибо, Ваш отзыв принят!');

        } catch (ClientException $e) {
            return redirect()->back()->with('error', 'Произошла ошибка');
        }
    }

    public function getReviews($productId)
    {
//        https://dev-api.allmarket.kz/api/v2/products/11/reviews

        $token = session()->get('token');

        if (null === $token) {
            return;
        }

        try {
            $response = $this->client->request('GET', env('API_URL') . '/products/' . $productId . '/reviews', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $token,
                    'Accept' => 'application/json'
                ],

            ]);

            return $response->getBody()->getContents();

        } catch (ClientException $e) {
            return $e->getMessage();
        }
    }


}
