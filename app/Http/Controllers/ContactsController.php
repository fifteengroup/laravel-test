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
    public function index()
    {
        $contacts = Contact::with(['company', 'contactRole', 'company.companyStatus', 'company.companyType'])->get();

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $contact = new Contact;
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');

        return view('contacts.create', compact('contact', 'companies', 'contactRoles'));
    }

    public function store(CreateContact $request)
    {
        Contact::create($request->all());

        return redirect('contacts')->with('alert', 'Contact created!');
    }

    public function edit(Contact $contact)
    {
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');

        return view('contacts.edit', compact('contact', 'companies', 'contactRoles'));
    }

    public function show(Contact $contact)
    {
        $addresses = $contact->addresses()->get();

        return view('contacts.show', compact('contact', 'addresses'));
    }

    public function update(UpdateContact $request, Contact $contact)
    {
        $contact->update($request->all());

        return redirect('contacts')->with('alert', 'Contact updated!');
    }
}
