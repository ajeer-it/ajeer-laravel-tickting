@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold mb-6">إضافة منتج جديد</h2>

        @if ($errors->any())
            <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block mb-1 font-medium">اسم المنتج</label>
                <input type="text" name="name" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                إنشاء
            </button>
        </form>
    </div>
@endsection
