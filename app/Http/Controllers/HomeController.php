<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    protected $client;

    public function index()
    {
        $this->client = new Client();

        $popular     = $this->getPopularProduct();
        $recommended = $this->getRecommendedProducts();

        $sale        = $this->getSaleProducts();

       // dd($sale);

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
        $response = $client->request('POST', 'https://allmarket.armenianbros.com/api/v2/auth/register', [
            'auth' => [
                'dev@allmarket.kz',
                'dev'
            ],
            'form_params' =>
                [
                    'name'    => "ede",
                    'phone'   => "+7(771)7469953",
                    'city_id' => 6,
                ]

        ]);


        $response = $response->getBody()->getContents();
    }

}
