<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name', 'MyApp') }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex flex-col">

    <!-- Navbar -->
    <nav
        class="bg-red-600 shadow-md p-4 text-white flex flex-col md:flex-row justify-between items-start md:items-center">
        <div class="flex items-center justify-between w-full md:w-auto mb-2 md:mb-0">
            <a href="{{ route('home') }}" class="font-bold text-xl hover:text-yellow-200 transition-colors">Ajeer</a>
            <div class="flex items-center space-x-4 md:space-x-0 md:ml-6">
                @auth
                    <span class="font-medium">{{ auth()->user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button
                            class="ml-2 bg-white text-red-600 font-semibold px-4 py-2 rounded hover:bg-gray-100 transition-colors">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}"
                        class="px-4 py-2 bg-white text-red-600 rounded hover:bg-gray-100 transition-colors font-semibold">Login</a>
                    <a href="{{ route('register') }}"
                        class="px-4 py-2 bg-white text-red-600 rounded hover:bg-gray-100 transition-colors font-semibold">Register</a>
                @endauth
            </div>
        </div>

        <!-- Navigation Links -->
        <div class="flex flex-col md:flex-row space-y-2 md:space-y-0 md:space-x-4 mt-2 md:mt-0">
            @if (auth()->check() && auth()->user()->isAdmin())
                <a href="{{ route('admin.users.index') }}"
                    class="hover:text-yellow-200 font-medium transition-colors">المستخدمين</a>

                <a href="{{ route('admin.products.index') }}"
                    class="hover:text-yellow-200 font-medium transition-colors">المنتجات</a>
            @endif

            <a href="{{ route('tickets.index') }}"
                class="hover:text-yellow-200 font-medium transition-colors">التذاكر</a>
        </div>
    </nav>

    <!-- Main content -->
    <main class="flex-1 container mx-auto mt-8 px-4">
        <div class="bg-white rounded-lg shadow-md p-6">
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-red-600 text-white text-center p-4 mt-8">
        &copy; {{ date('Y') }} {{ config('app.name', 'MyApp') }}. All rights reserved.
    </footer>

</body>

</html>
