<?php

namespace App\Http\Controllers;

use App\{Company, Contact, ContactRole, ContactAddress};
use App\Http\Requests\CreateContact;
use App\Http\Requests\UpdateContact;
use App\Services\Contact\{StoreService, UpdateService};
use App\Interfaces\{ContactRepositoryInterface};

class ContactsController extends Controller
{
    private $contactRepository;

    public function __construct(ContactRepositoryInterface $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }

    public function index()
    {
        $contacts = $this->contactRepository->all();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $contact = new Contact;
        $companies = Company::pluck('name', 'id');
        $contacts = Contact::pluck('name', 'id');
        return view('contacts.create', compact('contacts', 'companies', 'contact'));
    }

    public function store(CreateContact $request)
    {
        (new StoreService($request->all()))->run();
        return redirect('contacts')->with('alert', 'Contact created!');
    }

    public function edit(Contact $contact)
    {
        $companies = Company::pluck('name', 'id');
        $contactRoles = ContactRole::pluck('name', 'id');

        return view('contacts.edit', compact('contact', 'companies', 'contactRoles'));
    }

    public function update(UpdateContact $request, Contact $contact, ContactAddress $contact_address)
    {
        (new UpdateService($contact, $request->all(), $contact_address))->run();
        return redirect('contacts')->with('alert', 'Contact updated!');
    }
}
