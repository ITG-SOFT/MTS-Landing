<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Feedback;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::getCategories();
        $feedbacks = Feedback::getFeedbacks();
        $companies = Company::getCompanies();
        $products = Product::getProducts();

        return view('front.home', compact(
            'categories',
            'feedbacks',
            'companies',
            'products',
        ));
    }
}
