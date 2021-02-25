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
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');

        return view('contacts.create', compact('contact', 'companies', 'contactRoles'));
    }

    public function store(CreateContact $request)
    {
        $contact = Contact::create($request->all());
        $this->createContactAddresses($request->addresses, $contact->id);

        return redirect('contacts')->with('alert', 'Contact created!');
    }

    public function edit(Contact $contact)
    {
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');
        $contact->load('contactAddresses');

        return view('contacts.edit', compact('contact', 'companies', 'contactRoles'));
    }

    public function update(UpdateContact $request, Contact $contact)
    {
        $contact->update($request->all());
        $contactId = $contact->id;

        ContactAddress::contactId($contactId)->delete();
        $this->createContactAddresses($request->addresses, $contactId);

        return redirect('contacts')->with('alert', 'Contact updated!');
    }

    private function createContactAddresses($addresses, $contactId) {
        foreach ($addresses as $address) {
            $this->createContactAddress($address, $contactId);
        }
    }

    private function createContactAddress($address, $contactId) {
        if (empty($address)) {
            return;
        }

        $contactAddress = new ContactAddress([
            'address' => $address
        ]);
        $contactAddress->contact_id = $contactId;
        $contactAddress->save();
    }
}
