<?php

namespace App\Http\Controllers;

use App\Company;
use App\Contact;
use App\ContactAddress;
use App\ContactRole;
use App\Http\Requests\CreateContact;
use App\Http\Requests\UpdateContact;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(50);

        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $contact = new Contact;
        $address = new ContactAddress;
        $contact->addresses->push($address);
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');

        return view('contacts.create', compact('contact', 'companies', 'contactRoles'));
    }

    public function store(CreateContact $request)
    {
        $requestPayload = $request->all();
        $contactAddresses = $requestPayload['address'] ?? [];
        unset($requestPayload['addresses']);
        $contact = Contact::create($requestPayload);
        foreach ($contactAddresses as &$address) {
            $address = new ContactAddress($address);
        }

        $contact->addresses()->saveMany($contactAddresses);
        return redirect('contacts')->with('alert', 'Contact created!');
    }

    public function edit(Contact $contact)
    {
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');

        return view('contacts.edit', compact('contact', 'companies', 'contactRoles'));
    }

    public function update(UpdateContact $request, Contact $contact)
    {
        $requestPayload = $request->all();
        $contactAddresses = $requestPayload['address'] ?? [];
        unset($requestPayload['addresses']);
        $contact->update($requestPayload);
        foreach ($contactAddresses as &$address) {
            $address = new ContactAddress($address);
        }
        //re-sync relationship based on incoming data;
        $contact->addresses()->delete();
        $contact->addresses()->saveMany($contactAddresses);
        return redirect('contacts')->with('alert', 'Contact updated!');
    }
}
