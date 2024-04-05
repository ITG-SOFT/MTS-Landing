<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\CreateRequest;
use App\Http\Requests\Article\UpdateRequest;
use App\Models\Article;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $title = __('messages.article.plural');

        $articles = Article::query();

        $articles->with('photos');
        $articles->orderBy('created_at', 'DESC');

        $articles = $articles->get();

        return view('admin.article.index', compact('title', 'articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $title = __('messages.article.create');

        return view('admin.article.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CreateRequest $request
     * @return RedirectResponse
     */
    public function store(CreateRequest $request)
    {
        $article = Article::createArticle($request);

        $redirect = redirect()->route('admin.articles.index');

        if (!$article) {
            return $redirect->with('error', __('messages.article.error.store'));
        }

        return $redirect->with('success', __('messages.article.success.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param Article $article
     * @return Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Article $article
     * @return Application|Factory|View
     */
    public function edit(Article $article)
    {
        $title = __('messages.article.edit', ['article' => $article->title]);

        return view('admin.article.edit', compact('title', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param Article $article
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, Article $article)
    {
        $result = Article::updateArticle($request, $article);

        $redirect = redirect()->route('admin.articles.index');

        if (!$result) {
            return $redirect->with('error', __('messages.article.error.update'));
        }

        return $redirect->with('success', __('messages.article.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Article $article
     * @return RedirectResponse
     */
    public function destroy(Article $article)
    {
        $result = Article::deleteArticle($article);

        $redirect = redirect()->back();

        if (!$result) {
            return $redirect->with('error', __('messages.article.error.destroy'));
        }

        return $redirect->with('success', __('messages.article.success.destroy'));
    }

    /**
     * @param Article $article
     * @return RedirectResponse
     */
    public function changePublish(Article $article)
    {
        $article->published = !$article->published;
        $article->save();

        return redirect()->back()->with('success', __('messages.'.($article->published ? 'published' : 'unpublished')));
    }
}
