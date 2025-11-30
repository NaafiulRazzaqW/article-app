@extends('navbar.app')
@section('content')
    <div class="max-w-screen-xl mx-auto px-4 pt-28 sm:px-6 pb-16">

        @if ($data->image)
            <div class="mb-4 w-full flex justify-center">
                <div class="**inline-flex** max-w-full h-96 relative bg-gray-100 rounded-lg shadow-xl overflow-hidden">
                    <img src="{{ Storage::url($data->image) }}" alt="{{ $data->title }}" class="w-full h-full object-contain">
                </div>
            </div>
        @endif

        <div class="bg-white p-6 sm:p-10 rounded-lg shadow-2xl">

            <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 mb-2 leading-tight">
                {{ $data->title }}
            </h1>

            <p class="text-lg text-blue-600 mb-6 font-medium">
                Ditulis oleh: Admin | Tanggal: {{ $data->created_at->format('d M Y') }}
            </p>
            <hr class="mb-8 border-gray-300">
            <div class="text-gray-800 leading-relaxed text-base sm:text-lg article-content">

                {!! $data->description !!}
            </div>

            <div class="mt-10 pt-6 border-t border-gray-200 flex space-x-4">
                @if (Session::get('user'))
                    <a href="{{ route('editArticlePage', $data->slug) }}"
                        class="bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                        Edit Article
                    </a>
                @endif
                <a href="{{ route('articlePage') }}"
                    class="bg-gray-400 hover:bg-gray-500 text-white font-semibold py-2 px-6 rounded-full transition duration-300">
                    Kembali ke Daftar
                </a>
            </div>
        </div>
    </div>
@endsection
