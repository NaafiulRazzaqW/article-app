@extends('navbar.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-md bg-neutral-primary p-8 rounded-2xl shadow-xl border-1 bg-white">
            <h1 class="text-2xl font-semibold text-center text-heading mb-6">
                Register Account
            </h1>
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
            <form action="{{ route('registerAction') }}", method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-heading">Full Name</label>
                    <input type="text"
                        class="w-full p-3 border border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-fg-brand"
                        placeholder="Enter Your Full Name" name="name" />
                </div>
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-heading">Email</label>
                    <input type="email"
                        class="w-full p-3 border border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-fg-brand"
                        placeholder="Enter email" name="email" />
                </div>

                <div class="mb-6">
                    <label class="block mb-1 font-medium text-heading">Password</label>
                    <input type="password"
                        class="w-full p-3 border border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-fg-brand"
                        placeholder="Enter password" name="password" />
                </div>

                <button class="w-full p-3 rounded-lg bg-blue-500 text-white font-semibold hover:opacity-90">
                    Register
                </button>
            </form>

            <p class="text-center mt-4 text-body">
                Already Have Account?
                <a class="text-fg-brand font-medium hover:underline hover:text-blue-500" href="{{ route('loginPage') }}">
                    Login
                </a>
            </p>
        </div>
    </div>
@endsection
