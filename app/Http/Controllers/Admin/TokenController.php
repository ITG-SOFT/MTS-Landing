<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TokenRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $title = __('messages.token.plural');

        $tokens = auth()->user()->tokens()->paginate(env('PAGINATE'));

        return view('admin.token.index', compact('title', 'tokens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $title = __('messages.token.create');

        return view('admin.token.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param TokenRequest $request
     * @return RedirectResponse
     */
    public function store(TokenRequest $request)
    {
        $name = $request->name;

        $user = auth()->user()->createToken($name);

        if (!$user) {
            return redirect()->route('admin.tokens.index')->with('error', __('messages.token.error.store'));
        }

        return redirect()->route('admin.tokens.index')->with('success', __('messages.token.success.store'))->with('token', $user->plainTextToken);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $token = auth()->user()->tokens()->findOrFail($id);

        $title = __('messages.token.edit', ['token' => $token->name]);

        return view('admin.token.edit', compact('title', 'token'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param TokenRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(TokenRequest $request, $id)
    {
        $token = auth()->user()->tokens()->findOrFail($id);
        $result = $token->update($request->validated());

        if (!$result) {
            return redirect()->route('admin.tokens.index')->with('error', __('messages.token.error.update'));
        }

        return redirect()->route('admin.tokens.index')->with('success', __('messages.token.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $result = auth()->user()->tokens()->findOrFail($id)->delete();

        $redirect = redirect()->back();

        if (!$result) {
            return $redirect->with('error', __('messages.token.error.destroy'));
        }

        return $redirect->with('success', __('messages.token.success.destroy'));
    }
}
