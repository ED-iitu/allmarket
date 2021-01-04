<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ClientException;
use Session;

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
        $this->client = new Client();
    }

    public function index()
    {
        $popular     = $this->getPopularProduct();
        $recommended = $this->getRecommendedProducts();
        $sale        = $this->getSaleProducts();
        $sections    = $this->getAllSections();

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
        ]);
    }

    public function getFavorite($token)
    {
        try {
            $response = $this->client->request('GET', env('API_URL').'/favorites', [
                'query' => [
                    'city_id' => 6,
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

                $this->client->request('POST', env('API_URL').'/favorites', [
                    'query' => [
                        'city_id' => 6,
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

        $response = $this->client->request('GET', env('API_URL').'/products/popular', [
            'query' => [
                'city_id' => 6,
                'paginate' =>30,
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

    public function getRecommendedProducts()
    {

        $response = $this->client->request('GET', env('API_URL').'/products/recommended', [
            'query' => [
                'city_id' => 6,
                'paginate' =>30,
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

    public function getSaleProducts()
    {

        $response = $this->client->request('GET', env('API_URL').'/products/sale', [
            'query' => [
                'city_id' => 6,
                'paginate' => 30,
                'order' => "price.asc"
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
        $response = $client->request('GET', env('API_URL').'/product_sections', [
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
        $sections    = $this->getAllSections();

        return view('about', [
            'sections' => $sections->sections
        ]);
    }

    public function faq()
    {
        $sections    = $this->getAllSections();
        return view('faq', [
            'sections' => $sections->sections
        ]);
    }

    public function sections()
    {
        $sections = $this->getAllSections();

       // dd($sections);

        return view('sections', [
            'sections' => $sections->sections
        ]);
    }

    public function getSectionById($sectionId)
    {
        $client = new Client();
        $response = $client->request('GET', env('API_URL').'/product_sections/'.$sectionId, [
            'query' => [
                'city_id' => 6,
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $products = $this->getProductsBySectionId($sectionId);

        $response = $response->getBody()->getContents();
        $sections    = $this->getAllSections();



        $res = json_decode($response);


        return view('section', [
            'section' => $res->section,
            'sections' => $sections->sections,
            'products' => $products->products,
            'links'    => $products->links
        ]);
    }

    public function getSections($id)
    {
        $client = new Client();
        $response = $client->request('GET', env('API_URL').'/product_sections/'.$id.'/categories', [
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);


        $response = $response->getBody()->getContents();

        $res = json_decode($response);

        return $res->categories;
    }

    public function getProductsBySectionId($sectionId)
    {
        $client = new Client();
        $response = $client->request('GET', env('API_URL').'/product_sections/'.$sectionId.'/products', [
            'query' => [
                'city_id' => 6,
                'paginate' => 30,
                'order' => 'price.asc'
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
        $response = $client->request('GET', env('API_URL').'/products/'.$id, [
            'query' => [
                'city_id' => 6,
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $response = $response->getBody()->getContents();

        $res = json_decode($response);

        $categories = $this->getSections($res->product->section->id);

        $sections    = $this->getAllSections();


        return view('product', [
            'sections' => $sections->sections,
            'product' => $res->product,
            'categories' => $categories,
        ]);

    }

    public function getProductsByCategoryId($section_id, $category_id )
    {
        $client = new Client();
        $response = $client->request('GET', env('API_URL').'/product_categories/'.$category_id.'/products', [
            'query' => [
                'city_id' => 6,
            ],
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ]
        ]);

        $response = $response->getBody()->getContents();

        $res = json_decode($response);
        $category = "";


       foreach ($res->products as $cat) {
           $category = $cat->category->title;
       }


        $categories = $this->getSections($section_id);
        $sections    = $this->getAllSections();


        return view('category-products', [
            'category' => $category,
            'categories' => $categories,
            'sections' => $sections->sections,
            'section_id' => $section_id,
            'products' => $res->products,
            'links'    => $res->links
        ]);
    }

    public function registration(Request $request)
    {
        $client = new Client();

        $username = $request->name;
        $phone = $request->phone;

        try {

            $client->request('POST', env('API_URL').'/auth/register', [
                'auth' => [
                    'dev@allmarket.kz',
                    'dev'
                ],
                'form_params' => [
                    'name'    => $request->name,
                    'phone'   => $request->phone,
                    'city_id' => 6,
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

            $client->request('POST', env('API_URL').'/auth/login', [
                'auth' => [
                    'dev@allmarket.kz',
                    'dev'
                ],
                'form_params' => [
                    'phone'   => $phone,
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

        $sms = (int)$request->one . '' . $request->two .''. $request->three .''. $request->four;

        $phone = session()->get('phone');

        if (!$phone) {
            return redirect()->back()->with('error', 'Произошла ошибка попробуйте позже');
        }

        try {

            $responce = $client->request('POST', env('API_URL').'/auth/verify', [
                'auth' => [
                    'dev@allmarket.kz',
                    'dev'
                ],
                'form_params' => [
                    'phone'   => $phone,
                    'code'  => $sms
                ],
                'headers' => [
                    'Accept' => 'application/json'
                ],

            ]);

            $res =  json_decode($responce->getBody()->getContents());

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

            $responce = $client->request('GET', env('API_URL').'/users',
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
            $userData = $this->getUserData($token);
            $sections    = $this->getAllSections();

            return view('personal-account', [
                'favorites' => $favorites,
                'orders' => $orders->orders,
                'user' => $userData->user,
                'sections' => $sections->sections
            ]);
        }
    }

    public function cloneOrder(Request $request)
    {
        $token = session()->get('token');
        //https://allmarket.armenianbros.com/api/v2/orders/633/clone?city_id=2

        $responce =  $this->client->request('POST', env('API_URL').'/orders/'.$request->id . '/clone', [
            'query' => [
                'city_id' => 6,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ]
        ]);

       return redirect()->back()->with('success', 'Вы успешно повторили заказ');
    }

    public function logout()
    {
        session()->remove('username');
        session()->remove('phone');
        session()->remove('favorited');
        session()->remove('cart');
        return redirect()->route('home');
    }


    public function search(Request $request)
    {

        $client = new Client();

        $url = 'https://allmarket.armenianbros.com/api/v2/products/search';

        try {
            $response = $client->request('GET', $url, [
                'auth' => [
                    'dev@allmarket.kz',
                    'dev'
                ],
                'query' => [
                   'city_id' => 2,
                   'term' => $request->title
                ],
                'headers' => [
                    'Accept' => 'application/json'
                ],
            ]);

        }catch (ClientException $e) {
            $this->errors = json_decode($e->getResponse()->getBody()->getContents())->errors->phone[0];

            if ($this->errors) {
                return redirect()->back()->with('error', $this->errors);
            }
        }

        $response = $response->getBody()->getContents();

        $res = json_decode($response);

        $sections    = $this->getAllSections();

        return view('search-page', [
            'sections' => $sections->sections,
            'products' => $res->products,
            'title' => $request->title,
            'sections' => $sections->sections
        ]);
    }

    public function addToServerCart($token, $product_id, $offerId, $quantity = 1)
    {
        //https://allmarket.armenianbros.com/api/v2/baskets/increase?city_id=2

        return  $this->client->request('POST', env('API_URL').'/baskets/increase', [
            'query' => [
                'city_id' => 6,
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
    }

    public function addToCart($id)
    {
       $product = $this->getProductById($id);
       $token = session()->get('token');

       if (null === $token) {
           return redirect()->back()->with('error', 'Не удалось найти пользователя');
       }

       $offerId = 0;


        if(!$product) {
            $offerId = $id;
        }

        $this->addToServerCart($token, $id, $offerId,  1);


        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "title" => $product->title,
                    "category" => $product->category->title,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Товар успешно добавлен в корзину!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Товар успешно добавлен в корзину!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "title" => $product->title,
            "category" => $product->category->title,
            "quantity" => 1,
            "price" => $product->price_sale,
            "image" => $product->image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Товар успешно добавлен в корзину!');
    }

    public function getProductById($id)
    {
        try {
            $client = new Client();
            $response = $client->request('GET', env('API_URL').'/products/' . $id, [
                'query' => [
                    'city_id' => 6,
                ],
                'auth' => [
                    'dev@allmarket.kz',
                    'dev'
                ]
            ]);

            $response = $response->getBody()->getContents();

            $res = json_decode($response);

            return $res->product;
        }catch (RequestException $e) {
            return redirect()->back();
        }

        return 0;
    }

    public function getUserOrders()
    {
        //https://allmarket.armenianbros.com/api/v2/orders

        $token = session()->get('token');
        $response = $this->client->request('GET', env('API_URL').'/orders', [
            'query' => [
                'city_id' => 6,
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
        $token = session()->get('token');

        if (null == $token) {
            return redirect()->route('home');
        }

        try {
            $responce = $this->client->request('PUT', env('API_URL').'/users',
                [
                    'headers' =>
                        [
                            'Authorization' => 'Bearer ' . $token,
                            'Accept' => 'application/json'
                        ],
                    'query'            => [
                        'name' => $request->name,
                        'phone' => $request->phone,
                        'city_id' => $request->city_id,
                        'email' => $request->email,
                    ],
                ]
            );

            if ($responce) {
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
            return redirect()->back();
        }

        $responce = $this->client->request('DELETE', env('API_URL').'/baskets', [
            'query' => [
                'city_id' => 6,
            ],
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json'
            ]
        ]);

        session()->remove('cart');

        return $responce->getBody()->getContents();
    }

    public function checkout()
    {
        $token = session()->get('token');

        $responce = $this->client->request('POST', env('API_URL').'/checkout', [
            'query' => [
                'city_id' => 6,
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

        $responce = $this->client->request('POST', env('API_URL').'/orders', [
            'query' => [
                'city_id' => 6,
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

        session()->remove('cart');

        return $responce->getBody()->getContents();
    }

    public function createPayment($orderId, $type, $promo_code, $decrease)
    {
        //https://allmarket.armenianbros.com/api/v2/order_payments

        $token = session()->get('token');

        $responce = $this->client->request('POST', env('API_URL').'/order_payments', [
            'query' => [
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
    }

    public function sale()
    {

        $sale = $this->getSaleProducts();

        $sections    = $this->getAllSections();
        return view('sale', [
            'sections' => $sections->sections,
            'sales' => $sale->products
        ]);
    }

}
