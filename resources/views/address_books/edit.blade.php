@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Address</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form method="POST" action="{{ route('address-books.update', $addressBook->id) }}">
        @csrf
        @method('PUT')
        @include('address_books._form')
    </form>
</div>
@endsection
