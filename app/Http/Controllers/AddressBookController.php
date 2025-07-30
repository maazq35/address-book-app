<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddressBook;
use Illuminate\Support\Facades\Auth;

class AddressBookController extends Controller
{
    public function index()
    {
        $addresses = AddressBook::where('user_id', Auth::id())->get();
        return view('address_books.index', compact('addresses'));
    }

    public function create()
    {
        return view('address_books.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string',
        'contact_name' => 'required|string',
        'contact_number' => 'required|string',
        'address_line1' => 'nullable|string',
        'address_line2' => 'nullable|string',
        'address_line3' => 'nullable|string',
        'pincode' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'country' => 'required|string',
    ]);

    $validated['user_id'] = Auth::id();
    $validated['is_default_from'] = $request->has('is_default_from');
    $validated['is_default_to'] = $request->has('is_default_to');

    // Reset other defaults if checked
    if ($validated['is_default_from']) {
        AddressBook::where('user_id', Auth::id())->update(['is_default_from' => false]);
    }
    if ($validated['is_default_to']) {
        AddressBook::where('user_id', Auth::id())->update(['is_default_to' => false]);
    }

    AddressBook::create($validated);

    return redirect()->route('address-books.index')->with('success', 'Address saved.');
}


    public function edit(AddressBook $addressBook)
    {
        // $this->authorize('update', $addressBook); // Optional if using policies
        return view('address_books.edit', compact('addressBook'));
    }

    public function update(Request $request, AddressBook $addressBook)
{
    // $this->authorize('update', $addressBook);

    $validated = $request->validate([
        'title' => 'required|string',
        'contact_name' => 'required|string',
        'contact_number' => 'required|string',
        'address_line1' => 'nullable|string',
        'address_line2' => 'nullable|string',
        'address_line3' => 'nullable|string',
        'pincode' => 'required|string',
        'city' => 'required|string',
        'state' => 'required|string',
        'country' => 'required|string',
    ]);

    $validated['is_default_from'] = $request->has('is_default_from');
    $validated['is_default_to'] = $request->has('is_default_to');

    if ($validated['is_default_from']) {
        AddressBook::where('user_id', Auth::id())->update(['is_default_from' => false]);
    }

    if ($validated['is_default_to']) {
        AddressBook::where('user_id', Auth::id())->update(['is_default_to' => false]);
    }

    $addressBook->update($validated);

    return redirect()->route('address-books.index')->with('success', 'Address updated.');
}


    public function destroy(AddressBook $addressBook)
    {
        // $this->authorize('delete', $addressBook); // Optional
        $addressBook->delete();
        return redirect()->route('address-books.index')->with('success', 'Address deleted.');
    }
}
