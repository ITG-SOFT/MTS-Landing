<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeedbackRequest;
use App\Models\Feedback;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $title = __('messages.feedback.plural');

        $feedbacks = Feedback::query();

        $feedbacks->orderBy('created_at', 'DESC');

        $feedbacks = $feedbacks->get();

        return view('admin.feedback.index', compact('title', 'feedbacks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $title = __('messages.feedback.create');

        $products = Product::getProducts();

        return view('admin.feedback.create', compact('title', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param FeedbackRequest $request
     * @return RedirectResponse
     */
    public function store(FeedbackRequest $request)
    {
        $feedback = Feedback::createFeedback($request);

        $redirect = redirect()->route('admin.feedbacks.index');

        if (!$feedback) {
            return $redirect->with('error', __('messages.feedback.error.store'));
        }

        return $redirect->with('success', __('messages.feedback.success.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param Feedback $feedback
     * @return Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Feedback $feedback
     * @return Application|Factory|View
     */
    public function edit(Feedback $feedback)
    {
        $title = __('messages.feedback.edit', ['feedback' => $feedback->name]);

        $products = Product::getProducts();

        return view('admin.feedback.edit', compact('title', 'feedback', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param FeedbackRequest $request
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function update(FeedbackRequest $request, Feedback $feedback)
    {
        $result = Feedback::updateFeedback($request, $feedback);

        $redirect = redirect()->route('admin.feedbacks.index');

        if (!$result) {
            return $redirect->with('error', __('messages.feedback.error.update'));
        }

        return $redirect->with('success', __('messages.feedback.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Feedback $feedback
     * @return RedirectResponse
     */
    public function destroy(Feedback $feedback)
    {
        $result = Feedback::deleteFeedback($feedback);

        $redirect = redirect()->back();

        if (!$result) {
            return $redirect->with('error', __('messages.feedback.error.destroy'));
        }

        return $redirect->with('success', __('messages.feedback.success.destroy'));
    }
}
