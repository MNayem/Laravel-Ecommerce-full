<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Slider;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', '0')->get();
        $trendingProducts = Product::where('trending', '1')->latest()->take(15)->get();
        return view('frontend.index', compact('sliders','trendingProducts'));
    }

    public function newArraivals()
    {
        $newArraivalProducts = Product::latest()->take(16)->get();
        return view('frontend.pages.newArraivals', compact('newArraivalProducts'));
    }

    public function featuredProducts()
    {
        $featuredProducts = Product::where('featured', '1')->get();
        return view('frontend.pages.featuredProducts', compact('featuredProducts'));
    }

    public function categories()
    {
        $categories = Category::where('status', '0')->get();
        return view('frontend.collections.category.index', compact('categories'));
    }

    public function products($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if($category){

            return view('frontend.collections.products.index', compact('category'));
        }else{
            return redirect()->back();
        }
    }

    public function productView(string $category_slug, string $product_slug)
    {
        $category = Category::where('slug', $category_slug)->first();

        if($category){

            $product = $category->products()->where('slug', $product_slug)->where('status', '0')->first();

            if($product){
                return view('frontend.collections.products.view', compact('product','category'));
            }else{
                return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }

    public function thankYou()
    {
        return view('frontend.thankYou');
    }
}
