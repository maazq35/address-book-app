<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddressBook;
use Illuminate\Support\Facades\Auth;

class AddressBookApiController extends Controller
{
    public function index()
    {
        $addresses = AddressBook::where('user_id', Auth::id())->get();
        return response()->json($addresses);
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

        if ($validated['is_default_from']) {
            AddressBook::where('user_id', Auth::id())->update(['is_default_from' => false]);
        }

        if ($validated['is_default_to']) {
            AddressBook::where('user_id', Auth::id())->update(['is_default_to' => false]);
        }

        $address = AddressBook::create($validated);
        return response()->json($address, 201);
    }

    public function show($id)
    {
        $address = AddressBook::where('user_id', Auth::id())->findOrFail($id);
        return response()->json($address);
    }

    public function update(Request $request, $id)
    {
        $address = AddressBook::where('user_id', Auth::id())->findOrFail($id);

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

        $address->update($validated);

        return response()->json($address);
    }

    public function destroy($id)
    {
        $address = AddressBook::where('user_id', Auth::id())->findOrFail($id);
        $address->delete();

        return response()->json(['message' => 'Address deleted successfully']);
    }
}

