@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow text-right">
    <h2 class="text-2xl font-bold mb-4">تسجيل الدخول</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label>البريد الإلكتروني</label>
            <input type="email" name="email" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-3">
            <label>كلمة المرور</label>
            <input type="password" name="password" class="w-full border rounded px-3 py-2">
        </div>
        <div class="mb-3">
            <input type="checkbox" name="remember"> تذكرني
        </div>
        <button class="bg-red-600 text-white px-4 py-2 rounded">دخول</button>
    </form>
</div>
@endsection
