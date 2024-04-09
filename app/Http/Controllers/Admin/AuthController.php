<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Company;
use App\Models\Feedback;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

// Class work with authentication and Admin main page
class AuthController extends Controller
{
    // Admin Main Page
    public function index()
    {
        $title = __('messages.main_page');

        $company_count = Company::query()->count();

        $category_count = Category::query()->count();

        $feedback_count = Feedback::query()->count();

        $product_count = Product::query()->count();

        $article_count = Article::query()->count();

        $user_count = User::query()->count();

        $token_count = auth()->user()->tokens()->count();

        return view('admin.index', compact(
                'title',

                'company_count',

                'category_count',

                'feedback_count',

                'product_count',

                'article_count',

                'user_count',

                'token_count',
            )
        );
    }

    // Enter into an account page (ONLY VIEW)
    public function login()
    {
        $title = __('messages.auth.login');

        return view('admin.auth.login', compact('title'));
    }

    // Store information in session
    public function auth(LoginRequest $request)
    {
        $is_accepted = Auth::attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->remember);

        if ($is_accepted) {
            session()->flash('success', __('messages.auth.success'));
            return redirect()->route('admin.home');
        }

        return redirect()->back()->with('error', __('messages.auth.error'));
    }

    // Logout from the account
    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login.show');
    }
}
