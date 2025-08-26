@extends('layouts.app')
@section('title','لوحة التحكم')

@section('content')
<div class="text-center mt-8">
    <h2 class="text-3xl font-bold mb-4">مرحباً، {{ auth()->user()->name }}</h2>
    <p class="text-lg mb-6">
        لقد قمت بتسجيل الدخول كـ <strong>{{ auth()->user()->role }}</strong>.
    </p>

    @if(auth()->user()->isAdmin())
        <a href="/admin" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded">
            الذهاب إلى لوحة تحكم المدير
        </a>
    @else
        <a href="/tickets" class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
            عرض التذاكر الخاصة بي
        </a>
    @endif
</div>
@endsection
