@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">المستخدمين</h2>
            <a href="{{ route('admin.users.create') }}"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                إنشاء مستخدم جديد
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-2 px-4 border-b">#</th>
                        <th class="py-2 px-4 border-b">الاسم</th>
                        <th class="py-2 px-4 border-b">البريد الإلكتروني</th>
                        <th class="py-2 px-4 border-b text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="hover:bg-gray-50">
                            <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                            <td class="py-2 px-4 border-b">{{ $user->email }}</td>

                            <td class="py-2 px-4 border-b flex gap-2 justify-center">
                                @if (auth()->user()->isAdmin())
                                    <a href="{{ route('admin.users.edit', $user->id) }}"
                                        class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded shadow-sm">
                                        تعديل
                                    </a>
                                @endif
                                <a href="{{ route('admin.users.show', $user->id) }}"
                                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-1 px-3 rounded shadow-sm">
                                    عرض
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="py-4 text-center text-gray-500">لا يوجد مستخدمين</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
