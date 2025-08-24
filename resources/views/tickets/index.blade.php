@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
        <h2 class="text-2xl font-bold mb-4 md:mb-0">تذاكري</h2>
        <a href="{{ route('tickets.create') }}"
           class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded shadow">
            إنشاء تذكرة جديدة
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-sm">
            <thead class="bg-gray-100 text-right">
                <tr>
                    <th class="py-2 px-4 border-b text-right">#</th>
                    <th class="py-2 px-4 border-b text-right">العنوان</th>
                    <th class="py-2 px-4 border-b text-right">الوصف</th>
                    <th class="py-2 px-4 border-b text-right">الحالة</th>
                    <th class="py-2 px-4 border-b text-center ">إجراءات</th>
                </tr>
            </thead>
            <tbody class="text-right">
                @forelse($tickets as $ticket)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="py-2 px-4 border-b">{{ $ticket->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $ticket->title }}</td>
                        <td class="py-2 px-4 border-b">{{ Str::limit($ticket->description, 50) }}</td>
                        <td class="py-2 px-4 border-b capitalize">{{ $ticket->status }}</td>
                        <td class="py-2 px-4 border-b flex gap-2 justify-center">
                            @if(auth()->user()->isAdmin())
                                <a href="{{ route('admin.tickets.edit', $ticket->id) }}"
                                   class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-1 px-3 rounded shadow-sm">
                                    تعديل
                                </a>
                            @endif
                            <a href="{{ route('tickets.show', $ticket->id) }}"
                               class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-1 px-3 rounded shadow-sm">
                                عرض
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="py-6 text-center text-gray-500">لا توجد تذاكر</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
