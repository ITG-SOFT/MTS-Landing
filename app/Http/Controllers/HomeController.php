<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Feedback;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $feedbacks = Feedback::query()->get();
        $companies = Company::query()->get();

        return view('front.home', compact(
            'categories',
            'feedbacks',
            'companies',
        ));
    }
}
