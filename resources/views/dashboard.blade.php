@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Welcome, {{ Auth::user()->name }}</h2>
    <p>This is your dashboard.</p>
    <a href="{{ route('address-books.index') }}" class="btn btn-primary">Manage Address Book</a>
</div>
@endsection
