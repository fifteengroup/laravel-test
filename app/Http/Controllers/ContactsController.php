<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\ContactRole;
use App\Http\Requests\CreateContact;
use App\Http\Requests\UpdateContact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::with(['company', 'contactRole'])->get();
     
        return view('contacts.index', compact(['contacts']));
    }

    /**
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contact      = new Contact;
        $companies    = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');

        return view('contacts.create', compact(['contact', 'companies', 'contactRoles']));
    }

    /**
     *
     * @param CreateContact $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateContact $request)
    {
        $contact = Contact::create($request->all());
        $contact->contactAddresses()->create($request->all());

        return redirect('contacts')->with('alert', 'Contact created!');
    }

    /**
     *
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $companies    = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');

        return view('contacts.edit', compact(['contact', 'companies', 'contactRoles']));
    }

    /**
     *
     * @param UpdateContact $request
     * @param Contact $contact
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContact $request, Contact $contact)
    {
        $contact->update($request->all());
        $contact->contactAddresses()->create($request->all());
        
        return redirect('contacts')->with('alert', 'Contact updated!');
    }
}
