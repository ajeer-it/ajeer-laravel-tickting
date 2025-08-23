@extends('layouts.app')

@section('content')
    <div class="container mx-auto mt-8 px-4">
        <h2 class="text-2xl font-bold mb-6 text-right">تعديل التذكرة #{{ $ticket->id }}</h2>

        <form action="{{ route('admin.tickets.update', $ticket->id) }}" method="POST" class="space-y-4 text-right">
            @csrf
            @method('PUT')

            <!-- Readonly fields -->
            <div>
                <label class="block mb-1 font-medium ">العنوان</label>
                <input type="text" value="{{ $ticket->title }}" disabled
                    class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100 text-right">
            </div>

            <div>
                <label class="block mb-1 font-medium">الوصف</label>
                <textarea disabled rows="4" class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100 text-right">{{ $ticket->description }}</textarea>
            </div>

            <div>
                <label class="block mb-1 font-medium">تفاصيل المشكلة</label>
                <textarea disabled rows="3" class="w-full border border-gray-300 rounded px-3 py-2 bg-gray-100 text-right">{{ $ticket->problem_details }}</textarea>
            </div>

            <!-- Editable fields -->
            <div>
                <label class="block mb-1 font-medium">الحالة</label>
                <select name="status"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-right"
                    required>
                    @foreach (['open', 'in_progress', 'closed', 'escalated'] as $status)
                        <option value="{{ $status }}" @selected($ticket->status == $status)>{{ ucfirst($status) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">الأولوية</label>
                <select name="priority"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-right"
                    required>
                    @foreach (['low', 'medium', 'high', 'critical'] as $priority)
                        <option value="{{ $priority }}" @selected($ticket->priority == $priority)>{{ ucfirst($priority) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">مُسند إلى</label>
                <select name="assigned_to"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-right">
                    <option value="">-- لا أحد --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @selected($ticket->assigned_to == $user->id)>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block mb-1 font-medium">مُصعد إلى</label>
                <select name="escalated_to"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 text-right">
                    <option value="">-- لا أحد --</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" @selected($ticket->escalated_to == $user->id)>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex space-x-2 justify-start">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    تحديث التذكرة
                </button>
                <a href="{{ route('tickets.index') }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded">
                    إلغاء
                </a>
            </div>
        </form>
    </div>
@endsection
