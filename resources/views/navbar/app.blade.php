<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <nav class="fixed w-full top-0 bg-neutral-primary shadow-md z-20 bg-white">
        <div class="max-w-screen-xl mx-auto flex items-center justify-between px-1 py-4">



            <div class="flex items-center flex-1">
                <a href="/" class="flex items-center space-x-3">

                    <span class="text-2xl font-semibold text-heading">NaafiulArticle</span>
                </a>
            </div>


            @if (!($user = Session::get('user')))
                <div class="flex justify-end flex-1 items-center">
                    <a href="{{ route('loginPage') }}"
                        class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:opacity-90">
                        Login
                    </a>
                </div>
            @endif

            @if ($user = Session::get('user'))
                <form action="{{ route('logoutAction') }}" method="POST">
                    @csrf
                    <div class="flex justify-end flex-1 items-center">
                        <button onclick="return confirm('Are you sure Logout?')"
                            class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:opacity-90">
                            Logout
                        </button>
                    </div>
                </form>
            @endif


        </div>
    </nav>



    @yield('content')
    @yield('js')

</body>

</html>
