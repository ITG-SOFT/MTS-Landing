<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Models\User;
use App\Rules\Auth\MatchOldPassword;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $title = __('messages.user.plural');

        $users = User::query()->orderBy('created_at', 'DESC')->get();

        return view('admin.user.index', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $title = __('messages.user.create');

        return view('admin.user.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $user = User::createUser($request);

        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', __('messages.user.error.store'));
        }

        return redirect()->route('admin.users.index')->with('success', __('messages.user.success.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function edit(User $user)
    {
        $title = __('messages.user.edit', ['user' => $user->name]);

        return view('admin.user.edit', compact('title', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param User $user
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user = User::updateUser($request, $user);

        if (!$user) {
            return redirect()->route('admin.users.index')->with('error', __('messages.user.error.update'));
        }

        return redirect()->route('admin.users.index')->with('success', __('messages.user.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param User $user
     * @return RedirectResponse
     */
    public function destroy(User $user)
    {
        if (!auth()->user()->is_superadmin) {
            return redirect()->back()->with('error', __('messages.user.error.restricted'));
        }

        $is_destroyed = User::deleteUser($user);

        if ($is_destroyed === null) {
            return redirect()->back()->with('error', __('messages.user.error.my-self'));
        }

        return redirect()->back()->with('success', __('messages.user.success.destroy'));
    }

    public function changePassword()
    {
        $title = __('messages.user.change-password');

        return view('admin.user.change-password', compact('title'));
    }

    public function passwordStore(Request $request)
    {
        $user = User::query()->findOrFail(Auth::user()->id);
        $request->validate([
            'current_password' => ['required', new MatchOldPassword()],
            'new_password' => ['required', 'confirmed'],
        ]);
        $user->password = Hash::make($request->new_password);
        $user->update();
        return redirect()->route('admin.home')->with('success', 'Пароль изменён');
    }

    public function changeRights(Request $request, User $user)
    {
        if ($user->id == Auth::user()->id) {
            return redirect()->back()->with('error', 'Нельзя понизить самого себя');
        }

        $user->is_superadmin = !$user->is_superadmin;
        $user->update();
        return redirect()->back()->with('success', __($user->is_superadmin ?
            'messages.gave_super_admin' : 'messages.take_super_admin', ['user_name' => $user->name]));
    }
}
