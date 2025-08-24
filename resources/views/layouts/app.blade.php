<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'MyApp') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-50 min-h-screen flex flex-col font-sans">

    <!-- Navbar -->
    <nav class="bg-red-600 shadow-lg">
        <div class="container mx-auto px-4 py-3 flex flex-col md:flex-row items-center justify-between">
            <div class="flex items-center space-x-2 rtl:space-x-reverse">
                <span class="text-xl font-bold tracking-wide text-white">{{ config('app.name', 'Ajeer') }}</span>
            </div>

            <div class="flex items-center space-x-3 rtl:space-x-reverse mt-3 md:mt-0">
                @auth
                    <span class="text-white font-medium">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button
                            class="bg-white text-red-600 font-semibold px-4 py-1.5 rounded-lg shadow hover:bg-gray-100 transition">
                            تسجيل الخروج
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-1.5 bg-white text-red-600 rounded-lg shadow font-semibold hover:bg-gray-100 transition">تسجيل الدخول</a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-1.5 bg-white text-red-600 rounded-lg shadow font-semibold hover:bg-gray-100 transition">إنشاء حساب</a>
                @endauth
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="bg-red-700">
            <div class="container mx-auto px-4 flex space-x-6 rtl:space-x-reverse py-2 text-white">
                @if (auth()->check() && auth()->user()->isAdmin())
                    <a href="{{ route('admin.users.index') }}" class="hover:text-yellow-300 transition">المستخدمين</a>
                    <a href="{{ route('admin.products.index') }}" class="hover:text-yellow-300 transition">المنتجات</a>
                @endif
                <a href="{{ route('tickets.index') }}" class="hover:text-yellow-300 transition">التذاكر</a>
            </div>
        </div>
    </nav>

    <!-- Main content -->
    <main class="flex-1 container mx-auto mt-10 px-4">
        <div class="bg-white rounded-xl shadow-lg p-8 border border-gray-100">

            {{-- ✅ Validation Errors Global Handler --}}
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6 text-right shadow-sm">
                    <strong class="block font-bold mb-1">⚠️ يوجد بعض الأخطاء:</strong>
                    <ul class="list-disc pl-5 space-y-1">
                        @foreach ($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Content from pages --}}
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-red-600 text-white text-center py-4 mt-12">
        &copy; {{ date('Y') }} {{ config('app.name', 'MyApp') }}. جميع الحقوق محفوظة.
    </footer>
</body>
</html>
