@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <h2 class="text-2xl font-bold mb-6">تفاصيل المستخدم #{{ $user->id }}</h2>

    <table class="min-w-full bg-white border border-gray-200 rounded-lg">
        <tbody>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100 text-left">الاسم</th>
                <td class="py-2 px-4">{{ $user->name }}</td>
            </tr>
            <tr class="border-b">
                <th class="py-2 px-4 bg-gray-100 text-left">البريد الإلكتروني</th>
                <td class="py-2 px-4">{{ $user->email }}</td>
            </tr>
            <tr>
                <th class="py-2 px-4 bg-gray-100 text-left">تاريخ الإنشاء</th>
                <td class="py-2 px-4">{{ $user->created_at }}</td>
            </tr>
        </tbody>
    </table>

    <a href="{{ route('admin.users.index') }}" class="inline-block mt-6 bg-gray-500 hover:bg-gray-600 text-white py-2 px-4 rounded">
        رجوع
    </a>
</div>
@endsection
