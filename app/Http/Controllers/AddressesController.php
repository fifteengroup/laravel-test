<?php

namespace App\Http\Controllers;

use App\Address;
use App\Contact;
use App\Http\Requests\CreateAddress;
use App\Http\Requests\UpdateAddress;
use Illuminate\Http\Request;


class AddressesController extends Controller
{

    public function index()
    {
        $addresses = Address::with(['contact'])->get();

        return view('addresses.index', compact('addresses'));
    }


    public function create()
    {
        $address = new Address;
        $contacts = Contact::pluck('name', 'id');

        return view('addresses.create', compact('address', 'contacts'));
    }


    public function store(CreateAddress $request)
    {
        Address::create($request->all());

        return redirect('addresses')->with('alert', 'Address created!');
    }


    public function edit(Address $address)
    {
        $contacts = Contact::all()->pluck('name', 'id');

        return view('addresses.edit', compact('address', 'contacts'));
    }


    public function update(UpdateAddress $request, Address $address)
    {
        $address->update($request->all());

        return redirect('addresses')->with('alert', 'Address updated!');
    }

}
