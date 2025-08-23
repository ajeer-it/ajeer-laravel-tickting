@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <h2 class="text-2xl font-bold mb-6 text-center">تفاصيل التذكرة #{{ $ticket->id }}</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg text-center">
            <tbody>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">العنوان</th>
                    <td class="py-2 px-4">{{ $ticket->title }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">الوصف</th>
                    <td class="py-2 px-4">{{ $ticket->description }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">الحالة</th>
                    <td class="py-2 px-4">{{ $ticket->status }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">الأولوية</th>
                    <td class="py-2 px-4">{{ $ticket->priority }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">المنتج</th>
                    <td class="py-2 px-4">{{ $ticket->product->name ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">الموظف</th>
                    <td class="py-2 px-4">{{ $ticket->employee->name ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">مُسند إلى</th>
                    <td class="py-2 px-4">{{ $ticket->assignedTo->name ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">مُصعد إلى</th>
                    <td class="py-2 px-4">{{ $ticket->escalatedTo->name ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">تاريخ بداية المشكلة</th>
                    <td class="py-2 px-4">{{ $ticket->problem_start ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">تفاصيل المشكلة</th>
                    <td class="py-2 px-4">{{ $ticket->problem_details ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">هل هناك رسالة خطأ؟</th>
                    <td class="py-2 px-4">{{ $ticket->error_message_exists ? 'نعم' : 'لا' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">نص رسالة الخطأ</th>
                    <td class="py-2 px-4">{{ $ticket->error_message_text ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">الخطوات التي تمت تجربتها</th>
                    <td class="py-2 px-4">{{ $ticket->tried_steps ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">نطاق التأثير</th>
                    <td class="py-2 px-4">{{ $ticket->affect_scope ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">المستخدمين المتأثرين</th>
                    <td class="py-2 px-4">{{ $ticket->affected_users ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">تكرار المشكلة</th>
                    <td class="py-2 px-4">{{ $ticket->frequency ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">تفاصيل التكرار</th>
                    <td class="py-2 px-4">{{ $ticket->frequency_details ?? '-' }}</td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">رابط الصفحة</th>
                    <td class="py-2 px-4">
                        @if($ticket->page_url)
                            <a href="{{ $ticket->page_url }}" target="_blank" class="text-blue-500 hover:underline">{{ $ticket->page_url }}</a>
                        @else
                            -
                        @endif
                    </td>
                </tr>
                <tr class="border-b">
                    <th class="py-2 px-4 bg-gray-100">ملاحظات إضافية</th>
                    <td class="py-2 px-4">{{ $ticket->notes ?? '-' }}</td>
                </tr>
                <tr>
                    <th class="py-2 px-4 bg-gray-100">الملف المرفق</th>
                    <td class="py-2 px-4">
                        @if($ticket->file_path)
                            <a href="{{ asset('storage/'.$ticket->file_path) }}" target="_blank" class="text-red-500 hover:underline">
                                تحميل الملف
                            </a>
                        @else
                            لا يوجد ملف
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <a href="{{ route('tickets.index') }}" class="inline-block mt-6 bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
        رجوع
    </a>
</div>
@endsection
