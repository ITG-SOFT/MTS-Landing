<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Company;
use App\Models\Feedback;
use App\Models\MailingEmail;
use App\Models\Product;
use App\Models\User;
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

    public function submitMail(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email', 'max:255', 'unique:mailing_emails,email'],
        ]);

        $result = MailingEmail::query()->create([
            'email' => $request->email,
        ]);

        return response()->json([
            'success' => true,
        ]);
    }

    public function cancelMail(Request $request)
    {
        $email = $request->query('email');

        $mail = MailingEmail::query()->where('email', $email)->firstOrFail();

        $mail->delete();

        return to_route('front.mail.successes-canceled');
    }

    public function successesCanceledMail(Request $request)
    {
        $user_id = $request->query('user_id');

        return redirect()->back();
    }
}
