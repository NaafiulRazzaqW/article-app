@extends('navbar.app')

@section('content')
    <div  class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-neutral-primary p-8 rounded-2xl shadow-xl border-1 bg-white">
            <h1 class="text-2xl font-semibold text-center text-heading mb-6">
                Login
            </h1>
            @if ($message = Session::get('success'))
                <div  x-transition
                    class="flex items-center justify-between bg-green-50 border border-green-400 rounded-xl px-4 py-3 mb-4">
                    <div class="flex items-center gap-3 text-sm">
                        <span class="bg-green-500 text-white rounded-full px-2 py-0.5 text-xs">✔</span>
                        <span>
                            <strong class="block mb-0.5">Congratulations</strong>
                            {{ $message }}
                        </span>
                    </div>

                    <button onclick="this.parentElement.style.display = 'none'" class="text-black text-xl leading-none">
                        ×
                    </button>
                </div>
            @endif
            @if ($errors->any())
                @foreach ($errors->all() as $messageError)
                    <div class="w-full bg-yellow-200 border border-yellow-400 rounded-lg p-3 flex items-start gap-3 my-3">
                        <div class="text-yellow-700 text-lg">
                            ⚠️
                        </div>
                        <div class="flex flex-col">
                            <p class="font-semibold text-yellow-800">
                                Warning
                            </p>
                            <p class="text-sm text-yellow-800">
                                {{ $messageError }}
                            </p>
                        </div>
                        <button class="ml-auto text-yellow-800" onclick="this.parentElement.style.display='none'">
                            ×
                        </button>
                    </div>
                @endforeach
            @endif
            <form action="{{ route('loginAction') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-heading">Email</label>
                    <input type="email"
                        class="w-full p-3 border border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-fg-brand"
                        placeholder="Enter email"
                        name="email" />
                </div>

                <div class="mb-6">
                    <label class="block mb-1 font-medium text-heading">Password</label>
                    <input type="password"
                        class="w-full p-3 border border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-fg-brand"
                        placeholder="Enter password"
                        name="password" />
                </div>

                <button class="w-full p-3 rounded-lg bg-blue-500 text-white font-semibold hover:opacity-90">
                    Sign in
                </button>
            </form>

            <p class="text-center mt-4 text-body">
                Do not have an account?
                <a class="text-fg-brand font-medium hover:underline hover:text-blue-500" href="{{ route('registerPage') }}">
                    Register
                </a>
            </p>
        </div>
    </div>
@endsection
