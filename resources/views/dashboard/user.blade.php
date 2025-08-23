@extends('layouts.app')

@section('content')
<div class="bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold">User Dashboard</h2>
    <p>Welcome back, {{ $user->name }}</p>
</div>
@endsection
