@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Your Address Book</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('address-books.create') }}" class="btn btn-success mb-3">Add New Address</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Title</th>
                <th>Contact Name</th>
                <th>Contact Number</th>
                <th>City</th>
                <th>State</th>
                <th>Default</th> <!-- NEW column -->
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($addresses as $address)
                <tr>
                    <td>{{ $address->title }}</td>
                    <td>{{ $address->contact_name }}</td>
                    <td>{{ $address->contact_number }}</td>
                    <td>{{ $address->city }}</td>
                    <td>{{ $address->state }}</td>
                    <td>
                        @if ($address->is_default_from)
                            <span class="badge bg-success">Default From</span>
                        @endif
                        @if ($address->is_default_to)
                            <span class="badge bg-info">Default To</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('address-books.edit', $address->id) }}" class="btn btn-primary btn-sm">Edit</a>
                        <form action="{{ route('address-books.destroy', $address->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete this address?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="7">No addresses found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
