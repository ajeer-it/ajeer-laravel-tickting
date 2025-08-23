@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <h2 class="text-2xl font-bold mb-6 text-right">إنشاء تذكرة جديدة</h2>

    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6 text-right">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tickets.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4 text-right">
        @csrf

        <div>
            <label class="block mb-1 font-medium">العنوان</label>
            <input type="text" name="title" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right" required>
        </div>

        <div>
            <label class="block mb-1 font-medium">الوصف</label>
            <textarea name="description" rows="4" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right" required></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">المنتج</label>
            <select name="product_id" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">الأولوية</label>
            <select name="priority" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right" required>
                <option value="low">منخفضة</option>
                <option value="medium">متوسطة</option>
                <option value="high">عالية</option>
                <option value="critical">حرجة</option>
            </select>
        </div>
        <div>
            <label class="block mb-1 font-medium">تاريخ بداية المشكلة</label>
            <input type="text" name="problem_start" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right">
        </div>

        <div>
            <label class="block mb-1 font-medium">تفاصيل المشكلة</label>
            <textarea name="problem_details" rows="3" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">هل هناك رسالة خطأ؟</label>
            <select name="error_message_exists" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right">
                <option value="">اختر</option>
                <option value="1">نعم</option>
                <option value="0">لا</option>
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">نص رسالة الخطأ</label>
            <textarea name="error_message_text" rows="2" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">الخطوات التي تمت تجربتها</label>
            <textarea name="tried_steps" rows="2" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">نطاق التأثير</label>
            <select name="affect_scope" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right">
                <option value="">اختر</option>
                <option value="only_me">فقط لي</option>
                <option value="multiple_users">عدة مستخدمين</option>
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">المستخدمين المتأثرين</label>
            <textarea name="affected_users" rows="2" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">تكرار المشكلة</label>
            <select name="frequency" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right">
                <option value="">اختر</option>
                <option value="always">دائماً</option>
                <option value="sometimes">أحياناً</option>
            </select>
        </div>

        <div>
            <label class="block mb-1 font-medium">تفاصيل التكرار</label>
            <input type="text" name="frequency_details" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right">
        </div>

        <div>
            <label class="block mb-1 font-medium">رابط الصفحة</label>
            <input type="text" name="page_url" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right">
        </div>

        <div>
            <label class="block mb-1 font-medium">ملاحظات إضافية</label>
            <textarea name="notes" rows="2" class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-red-500 text-right"></textarea>
        </div>

        <div>
            <label class="block mb-1 font-medium">إرفاق ملف (اختياري)</label>
            <input type="file" name="file_path" class="w-full border rounded px-3 py-2">
        </div>

        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded mt-4">
            إنشاء
        </button>
    </form>
</div>
@endsection
