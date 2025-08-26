@extends('layouts.app')

@section('content')
    <div class="bg-white p-6 rounded shadow text-right">
        <h2 class="text-2xl font-bold">لوحة التحكم</h2>
        <p>مرحباً بعودتك، {{ $user->name }}</p>
    </div>
@endsection