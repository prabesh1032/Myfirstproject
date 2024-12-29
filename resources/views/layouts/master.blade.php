<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - ChillShop</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">
    @include('Layouts.alert')
    <div class="flex justify-between px-20 bg-green-500 text-white py-2">
        <div>
            <a href="" class="text-lg font-semibold"><i class="ri-phone-fill"></i> 9812965119</a>
        </div>
        <div>
            @auth
                <a href="" class="text-lg font-semibold"><i class="ri-user-fill"></i> HI, {{ auth()->user()->name }}</a>
                <a href="{{ route('mycarts') }}" class="p-3 text-lg font-semibold hover:text-blue-500"><i class="ri-shopping-cart-2-line"></i> My Cart</a>
                <form action="{{ route('logout') }}" method="post" class="inline">
                    @csrf
                    <button type="submit" class="p-3 text-lg font-semibold hover:text-blue-500"><i class="ri-logout-box-line"></i> Logout</button>
                </form>
            @else
                <a href="/login" class="p-3 text-lg font-semibold hover:text-blue-500"><i class="ri-login-box-line"></i> Login</a>
            @endauth
        </div>
    </div>

    <!-- Navbar -->
    <nav class="flex justify-between items-center px-20 py-6 bg-cyan-300 shadow-lg sticky top-0 z-10">
        <div>
            <a href="{{ route('home') }}">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-30 h-24 object-cover rounded-full  transform transition duration-300 ease-in-out hover:scale-125" />
            </a>
        </div>
        <div class="flex space-x-1">
            <a href="{{ route('home') }}" class="text-2xl font-semibold hover:text-blue-500 flex items-center space-x-2 p-3">
                <i class="ri-home-2-line"></i> <span>Home</span>
            </a>
            @php
                $categories = App\Models\Category::orderBy('priority')->get();
            @endphp
            @foreach($categories as $category)
                <a href="{{ route('categoryproduct', $category->id) }}" class="text-2xl font-semibold hover:text-blue-500 flex items-center space-x-2 p-3">
                    <i class="ri-shopping-bag-3-line"></i> <span>{{ $category->name }}</span>
                </a>
            @endforeach
        </div>
    </nav>

    @yield('content')

   <!-- Footer -->
<!-- Footer -->
<!-- Footer -->
<footer class="bg-cyan-300 py-6 shadow-lg">
    <div class="container mx-auto flex flex-wrap justify-between items-center px-10">
        <!-- Contact Us -->
        <div class="text-center md:text-left mb-4 md:mb-0">
            <h2 class="text-2xl font-bold mb-2">Contact Us</h2>
            <p class="text-xl font-semibold hover:text-blue-500 flex items-center space-x-2 p-2">
                <i class="ri-mail-line mr-2"></i>
                <a href="mailto:test@gmail.com" class="hover:text-blue-500">chillshop@gmail.com</a>
            </p>
            <p class="text-xl font-semibold hover:text-blue-500 flex items-center space-x-2 p-2">
                <i class="ri-phone-fill mr-2"></i>
                <a href="tel:+9742538007" class="hover:text-blue-500">9812965110</a>
            </p>
        </div>

        <!-- Social Links -->
        <div class="flex space-x-4 justify-center md:justify-end">
            <a href="#" class="text-2xl hover:text-blue-500"><i class="ri-facebook-fill"></i></a>
            <a href="#" class="text-2xl hover:text-blue-500"><i class="ri-twitter-fill"></i></a>
            <a href="#" class="text-2xl hover:text-blue-500"><i class="ri-instagram-fill"></i></a>
            <a href="#" class="text-2xl hover:text-blue-500"><i class="ri-linkedin-box-fill"></i></a>
        </div>
    </div>
    <div class="bg-cyan-400 text-center py-3 mt-4">
        <p class="text-lg font-semibold">&copy; 2024 ChillShop. All rights reserved.</p>
    </div>
</footer>

</body>

</html>
