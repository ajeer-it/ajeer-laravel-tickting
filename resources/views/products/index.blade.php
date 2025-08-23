@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold mb-6">قائمة المنتجات</h2>

        @if (session('success'))
            <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('admin.products.create') }}"
            class="mb-4 inline-block bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
            إضافة منتج جديد
        </a>

        <table class="w-full border border-gray-300 rounded">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border px-4 py-2">#</th>
                    <th class="border px-4 py-2">اسم المنتج</th>
                    <th class="border px-4 py-2">الإجراءات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td class="border px-4 py-2">{{ $product->id }}</td>
                        <td class="border px-4 py-2">{{ $product->name }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('admin.products.show', $product->id) }}"
                                class="text-blue-500 hover:underline">عرض</a>
                            <a href="{{ route('admin.products.edit', $product->id) }}"
                                class="text-green-500 hover:underline">تعديل</a>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                class="inline-block" onsubmit="return confirm('هل أنت متأكد من حذف المنتج؟');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:underline">حذف</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
