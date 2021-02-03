<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\ContactRole;
use App\Http\Requests\CreateContact;
use App\Http\Requests\UpdateContact;
use Illuminate\Http\Request;

/**
 * Class ContactsController
 * @package App\Http\Controllers
 */
class ContactsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $contacts = Contact::all();

        return view('contacts.index', compact('contacts'));
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $contact = new Contact;
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');

        return view('contacts.create', compact('contact', 'companies', 'contactRoles'));
    }

    /**
     * @param CreateContact $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateContact $request)
    {
//        dd($request->all());
        Contact::create($request->all());

        return redirect('contacts')->with('alert', 'Contact created!');
    }

    /**
     * @param Contact $contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Contact $contact)
    {
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');

        return view('contacts.edit', compact('contact', 'companies', 'contactRoles'));
    }

    /**
     * @param UpdateContact $request
     * @param Contact $contact
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(UpdateContact $request, Contact $contact)
    {
        $contact->update($request->all());

        return redirect('contacts')->with('alert', 'Contact updated!');
    }
}
