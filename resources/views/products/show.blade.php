@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold mb-6">تفاصيل المنتج #{{ $product->id }}</h2>

        <div class="bg-white p-4 border border-gray-300 rounded">
            <p><strong>الاسم:</strong> {{ $product->name }}</p>
            <p><strong>تاريخ الإنشاء:</strong> {{ $product->created_at }}</p>
        </div>

        <div class="mt-4 space-x-2">
            <a href="{{ route('admin.products.edit', $product->id) }}"
                class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">تعديل</a>
            <a href="{{ route('admin.products.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">رجوع</a>
        </div>
    </div>
@endsection
