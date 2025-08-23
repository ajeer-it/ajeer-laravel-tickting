@extends('layouts.app')
@section('title','Dashboard')

@section('content')
<div class="text-center mt-8">
    <h2 class="text-3xl font-bold mb-4">Welcome, {{ auth()->user()->name }}</h2>
    <p class="text-lg mb-6">
        You are logged in as <strong>{{ auth()->user()->role }}</strong>.
    </p>

    @if(auth()->user()->isAdmin())
        <a href="/admin" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
            Go to Admin Dashboard
        </a>
    @else
        <a href="/tickets" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
            View My Tickets
        </a>
    @endif
</div>
@endsection
