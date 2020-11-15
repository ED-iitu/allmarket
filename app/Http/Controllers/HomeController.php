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

    public function index()
    {
        $this->client = new Client();

        $popular     = $this->getPopularProduct();
        $recommended = $this->getRecommendedProducts();

        $sale        = $this->getSaleProducts();


        return view('home', [
            'popular_products' => $popular->products,
            'recommended_products' => $recommended->products,
            'sale_products' => $sale->products
        ]);
    }

    public function getPopularProduct()
    {

        $response = $this->client->request('GET', 'https://allmarket.armenianbros.com/api/v2/products/popular', [
            'query' => [
                'city_id' => 6,
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

        $response = $this->client->request('GET', 'https://allmarket.armenianbros.com/api/v2/products/recommended', [
            'query' => [
                'city_id' => 6,
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

        $response = $this->client->request('GET', 'https://allmarket.armenianbros.com/api/v2/products/sale', [
            'query' => [
                'city_id' => 6,
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
        $response = $client->request('GET', 'https://allmarket.armenianbros.com/api/v2/product_sections', [
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
        return view('about');
    }

    public function faq()
    {
        return view('faq');
    }

    public function sections()
    {
        $sections = $this->getAllSections();

        return view('sections', [
            'sections' => $sections->sections
        ]);
    }

    public function getSectionById($sectionId)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://allmarket.armenianbros.com/api/v2/product_sections/'.$sectionId, [
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



        $res = json_decode($response);


        return view('section', [
            'section' => $res->section,
            'products' => $products->products,
            'links'    => $products->links
        ]);
    }

    public function getSections($id)
    {
        $client = new Client();
        $response = $client->request('GET', 'https://allmarket.armenianbros.com/api/v2/product_sections/'.$id.'/categories', [
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
        $response = $client->request('GET', 'https://allmarket.armenianbros.com/api/v2/product_sections/'.$sectionId.'/products', [
            'query' => [
                'city_id' => 6,
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
        $response = $client->request('GET', 'https://allmarket.armenianbros.com/api/v2/products/'.$id, [
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


        return view('product', [
            'product' => $res->product,
            'categories' => $categories,
        ]);

    }

    public function getProductsByCategoryId($section_id, $category_id )
    {
        $client = new Client();
        $response = $client->request('GET', 'https://allmarket.armenianbros.com/api/v2/product_categories/'.$category_id.'/products', [
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


        return view('category-products', [
            'category' => $category,
            'sections' => $categories,
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

            $request = $client->request('POST', 'https://allmarket.armenianbros.com/api/v2/auth/register', [
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

    public function account()
    {
        return view('personal-account');
    }

    public function logout()
    {
        session()->remove('username');
        session()->remove('phone');
        return redirect()->back();
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

        return view('search-page', [
            'products' => $res->products,
            'title' => $request->title
        ]);
    }

    public function addToCart($id)
    {
       $product = $this->getProductById($id);


        if(!$product) {
            abort(404);
        }


        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {
            $cart = [
                $id => [
                    "title" => $product->title,
                    "category" => $product->category->title,
                    "quantity" => 1,
                    "price" => $product->price_sale,
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
        $client = new Client();
        $response = $client->request('GET', 'https://allmarket.armenianbros.com/api/v2/products/'.$id, [
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
    }

}
