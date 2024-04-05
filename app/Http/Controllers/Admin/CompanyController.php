<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Company;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $title = __('messages.company.plural');

        $companies = Company::query();

        $companies->with('photos');
        $companies->orderBy('created_at', 'DESC');

        $companies = $companies->get();

        return view('admin.company.index', compact('title', 'companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $title = __('messages.company.create');

        return view('admin.company.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CompanyRequest $request
     * @return RedirectResponse
     */
    public function store(CompanyRequest $request)
    {
        $company = Company::createCompany($request);

        $redirect = redirect()->route('admin.companies.index');

        if (!$company) {
            return $redirect->with('error', __('messages.company.error.store'));
        }

        return $redirect->with('success', __('messages.company.success.store'));
    }

    /**
     * Display the specified resource.
     *
     * @param Company $company
     * @return Response
     */
    public function show(Company $company)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Company $company
     * @return Application|Factory|View
     */
    public function edit(Company $company)
    {
        $title = __('messages.company.edit', ['company' => $company->title]);

        return view('admin.company.edit', compact('title', 'company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CompanyRequest $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $result = Company::updateCompany($request, $company);

        $redirect = redirect()->route('admin.companies.index');

        if (!$result) {
            return $redirect->with('error', __('messages.company.error.update'));
        }

        return $redirect->with('success', __('messages.company.success.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Company $company
     * @return RedirectResponse
     */
    public function destroy(Company $company)
    {
        $result = Company::deleteCompany($company);

        $redirect = redirect()->back();

        if (!$result) {
            return $redirect->with('error', __('messages.company.error.destroy'));
        }

        return $redirect->with('success', __('messages.company.success.destroy'));
    }
}
