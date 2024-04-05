<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Article;
use App\Models\Country;
use App\Models\Event;
use App\Models\Excursion\Excursion;
use App\Models\Excursion\ExcursionCategory;
use App\Models\Exhibition;
use App\Models\Place;
use App\Models\SocialNetwork;
use App\Models\User;
use App\Models\WeddingCeremony;
use Illuminate\Support\Facades\Auth;

// Class work with authentication and Admin main page
class AuthController extends Controller
{
    // Admin Main Page
    public function index()
    {
        $title = __('messages.main_page');

        $article_count = Article::query()->count();

        $user_count = User::query()->count();

        $token_count = auth()->user()->tokens()->count();

        return view('admin.index', compact(
                'title',

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