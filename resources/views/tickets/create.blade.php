@extends('layouts.app')

@section('content')
<div>
    <h2 class="text-3xl font-bold mb-6 text-gray-800 text-right border-b pb-2">إنشاء تذكرة جديدة</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 text-right shadow-sm">
            <ul class="list-disc pl-5 space-y-1">
                @foreach ($errors->all() as $error)
                    <li class="text-sm">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6 text-right">
        @csrf

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block mb-1 font-medium text-gray-700">العنوان</label>
                <input type="text" name="title"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500"
                    required>
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">المنتج</label>
                <select name="product_id"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500"
                    required>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <label class="block mb-1 font-medium text-gray-700">الوصف</label>
            <textarea name="description" rows="4"
                class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500"
                required></textarea>
        </div>

        <div class="grid md:grid-cols-2 gap-6">
            <div>
                <label class="block mb-1 font-medium text-gray-700">الأولوية</label>
                <select name="priority"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500"
                    required>
                    <option value="low">منخفضة</option>
                    <option value="medium">متوسطة</option>
                    <option value="high">عالية</option>
                    <option value="critical">حرجة</option>
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium text-gray-700">تاريخ بداية المشكلة</label>
                <input type="date" name="problem_start"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500 focus:border-red-500">
            </div>
        </div>

        <!-- Collapsible advanced fields -->
        <details class="bg-gray-50 rounded-lg p-4 shadow-sm">
            <summary class="cursor-pointer font-semibold text-red-600">تفاصيل إضافية</summary>
            <div class="mt-4 space-y-4">
                <div>
                    <label class="block mb-1 font-medium text-gray-700">تفاصيل المشكلة</label>
                    <textarea name="problem_details" rows="3"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500"></textarea>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">هل هناك رسالة خطأ؟</label>
                    <select name="error_message_exists"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500">
                        <option value="">اختر</option>
                        <option value="1">نعم</option>
                        <option value="0">لا</option>
                    </select>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">نص رسالة الخطأ</label>
                    <textarea name="error_message_text" rows="2"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500"></textarea>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">الخطوات التي تمت تجربتها</label>
                    <textarea name="tried_steps" rows="2"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500"></textarea>
                </div>

                <div>
                    <label class="block mb-1 font-medium text-gray-700">إرفاق ملف (اختياري)</label>
                    <input type="file" name="file_path"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-red-500">
                </div>
            </div>
        </details>

        <button type="submit"
            class="bg-red-600 hover:bg-red-700 text-white font-semibold py-2 px-6 rounded-lg shadow-md transition">
            🚀 إنشاء التذكرة
        </button>
    </form>
</div>
@endsection
