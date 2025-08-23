@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold mb-6">تعديل المستخدم #{{ $user->id }}</h2>

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block mb-1 font-medium">الاسم</label>
                <input type="text" name="name" value="{{ old('name', $user->name) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block mb-1 font-medium">البريد الإلكتروني</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block mb-1 font-medium">كلمة المرور (اختياري)</label>
                <input type="password" name="password" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-1 font-medium">تأكيد كلمة المرور</label>
                <input type="password" name="password_confirmation" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div>
                <label class="block mb-1 font-medium">الدور</label>
                <select name="role" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>مستخدم</option>
                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>مسؤول</option>
                </select>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                تحديث
            </button>
        </form>
    </div>
@endsection
