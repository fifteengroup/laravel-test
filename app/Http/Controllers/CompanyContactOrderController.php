<?php

namespace App\Http\Controllers;

use App\Company;
use App\CompanyContactOrder;
use App\Contact;
use App\ContactRole;
use App\Http\Requests\CreateCompanyContactOrder;
use App\Http\Requests\CreateContact;
use App\Http\Requests\UpdateCompanyContactOrder;
use App\Http\Requests\UpdateContact;
use App\Notifications\NewOrderCreated;
use Illuminate\Http\Request;

/**
 * Class ContactsController
 * @package App\Http\Controllers
 */
class CompanyContactOrderController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $companyContactOrders = CompanyContactOrder::paginate(10);
        $contacts = Contact::all()->pluck('full_name', 'id');

        return view('orders.index', compact('companyContactOrders', 'contacts'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $companyContactOrders = new CompanyContactOrder;
        $contacts = Contact::all()->pluck('full_name', 'id');

        return view('orders.create', compact('contacts', 'companyContactOrders'));
    }

    /**
     * @param CreateCompanyContactOrder $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateCompanyContactOrder $request)
    {
//        dd($request->all());
        $companyContactOrder = CompanyContactOrder::create($request->all());
        $companyContactOrder->notify(new NewOrderCreated);

        return redirect('orders')->with('alert', 'Order created!');
    }

    /**
     * @param CompanyContactOrder $companyContactOrders
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(CompanyContactOrder $companyContactOrders)
    {
        $contacts = Contact::all()->pluck('full_name', 'id');
        $companies = Company::pluck('name', 'id');

        return view('orders.edit', compact('contacts', 'companies', 'companyContactOrders'));
    }

    /**
     * @param UpdateCompanyContactOrder $request
     * @param CompanyContactOrder $companyContactOrders
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateCompanyContactOrder $request, CompanyContactOrder $companyContactOrders)
    {
        $companyContactOrders->update($request->all());

        return redirect('orders')->with('alert', 'Contact updated!');
    }
}
