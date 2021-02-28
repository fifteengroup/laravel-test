<?php

namespace App\Http\Controllers;

use App\Item;
use App\Http\Requests\CreateItem;
use App\Http\Requests\UpdateItem;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::paginate(15);

        return view('items.index', compact('items'));
    }

    public function create()
    {
        $item = new Item;

        return view('items.create', compact('item'));
    }

    public function store(CreateItem $request)
    {
        Item::create($request->all());

        return redirect('items')->with('alert', 'Item created!');
    }

    public function edit(Item $item)
    {
        return view('items.edit', compact('item'));
    }

    public function update(UpdateItem $request, Item $item)
    {
        $item->update($request->all());

        return redirect('items')->with('alert', 'Item updated!');
    }
}
