@extends('navbar.app')

@section('content')
    <div class="max-w-screen-xl mx-auto pt-28">
        <div class="flex items-center">
            <div class="w-1/3"></div>
            <h1 class="w-1/3 flex justify-center text-3xl font-extrabold">List Articles</h1>
            @if (Session::get('user'))
                <div class="w-1/3 flex justify-end">
                    <a href="{{ route('createArticlePage') }}"
                        class="px-4 py-2 rounded-lg bg-blue-600 text-white font-semibold hover:opacity-90">
                        Create Article
                    </a>
                </div>
            @endif
        </div>
        @if (Session::get('user'))
            <div class="grid grid-cols-4 gap-6 mt-16">
                @forelse ($data as $item)
                    <div class=" bg-white rounded-lg shadow-md overflow-hidden">
                        @if ($item->image)
                            {{-- Tampilkan gambar jika path-nya ada --}}
                            <img src="{{ Storage::url($item->image) }}" alt="{{ $item->title }}"
                                class="w-full h-40 object-cover">
                        @else
                            {{-- Jika $item->image kosong, tampilkan placeholder default --}}
                            <div class="bg-gray-200 h-40 flex items-center justify-center">
                                <span class="text-gray-500 text-sm">No Image Available</span>
                            </div>
                        @endif

                        <div class="p-4 flex flex-col">
                            <h2 class="text-2xl font-semibold text-gray-900 mb-2">
                                {{ $item->title }}
                            </h2>

                            <p class="text-gray-700 text-sm mb-4">
                                {!! Str::words(strip_tags($item->description), 20, '...') !!}
                            </p>

                            <div class="flex space-x-3">
                                <a href="{{ route('fullArticlePage', $item->slug) }}"
                                    class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full transition duration-300">
                                    Full Article
                                </a>
                                @if (Session::get('user'))
                                    <a href="{{ route('editArticlePage', $item->slug) }}"
                                        class="bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded-full transition duration-300">
                                        Edit
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full mt-12 text-center mx-auto">
                        <svg class="mx-auto h-20 w-20 text-gray-400" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                d="M9 12h6m-6 4h6m2-10H7a4 4 0 00-4 4v10a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2z" />
                        </svg>
                        <h3 class="mt-4 text-3xl font-extrabold text-gray-900">No Articles Created Yet</h3>
                        <p class="mt-2 text-lg text-gray-500">
                            The application is ready! Time to start writing and filling up the content.
                        </p>
                        <div class="mt-6">
                            <a href="{{ route('createArticlePage') }}"
                                class="inline-flex items-center px-6 py-3 border border-transparent shadow-lg text-base font-medium rounded-full text-white bg-blue-600 hover:bg-blue-700 transition duration-300">
                                <svg class="-ml-1 mr-3 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                        clip-rule="evenodd" />
                                </svg>
                                Create Your First Article
                            </a>
                        </div>
                    </div>
                @endforelse
            </div>
            <div class="my-8 flex justify-center w-full mx-auto">
                {{ $data->links() }}
            </div>
        @else
            <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-6 rounded-lg shadow-md flex items-center justify-between mt-14"
                role="alert">
                <div class="flex items-center space-x-4">
                    <svg class="h-6 w-6 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.332 16c-.77 1.333.192 3 1.732 3z" />
                    </svg>
                    <p class="font-bold text-xl">Access Denied!</p>
                    <p>You must Login to see List Article! </p>
                </div>
                <a href="{{ route('loginPage') }}"
                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded-full transition duration-300 shadow-lg">
                    Login Now!
                </a>
            </div>
        @endif


    </div>
@endsection
