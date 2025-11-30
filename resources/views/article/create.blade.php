@extends('navbar.app')

@section('content')
    <div class="min-h-screen flex items-center justify-center">
        <div class="w-full max-w-lg border p-8 rounded-2xl shadow-xl bg-white">
            <div class="flex justify-between">
                <div></div>
                <h1 class="text-2xl font-semibold text-center text-heading mb-6">
                    Create Article
                </h1>
                <div><a href="{{ route('articlePage') }}"
                        class="
                        text-white hover:bg-gray-200
                        rounded-full shadow-md transition duration-150 ease-in-out
                        w-8 h-8 flex items-center justify-center text-xl leading-none font-bold
                    ">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" class="w-full h-full" viewBox="0,0,256,256">
                            <g fill="#f50e0e" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt"
                                stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0"
                                font-family="none" font-weight="none" font-size="none" text-anchor="none"
                                style="mix-blend-mode: normal">
                                <g transform="scale(5.12,5.12)">
                                    <path
                                        d="M25,2c-12.69047,0 -23,10.30953 -23,23c0,12.69047 10.30953,23 23,23c12.69047,0 23,-10.30953 23,-23c0,-12.69047 -10.30953,-23 -23,-23zM25,4c11.60953,0 21,9.39047 21,21c0,11.60953 -9.39047,21 -21,21c-11.60953,0 -21,-9.39047 -21,-21c0,-11.60953 9.39047,-21 21,-21zM32.99023,15.98633c-0.26377,0.00624 -0.51439,0.11645 -0.69727,0.30664l-7.29297,7.29297l-7.29297,-7.29297c-0.18827,-0.19353 -0.4468,-0.30272 -0.7168,-0.30274c-0.40692,0.00011 -0.77321,0.24676 -0.92633,0.62377c-0.15312,0.37701 -0.06255,0.80921 0.22907,1.09303l7.29297,7.29297l-7.29297,7.29297c-0.26124,0.25082 -0.36648,0.62327 -0.27512,0.97371c0.09136,0.35044 0.36503,0.62411 0.71547,0.71547c0.35044,0.09136 0.72289,-0.01388 0.97371,-0.27512l7.29297,-7.29297l7.29297,7.29297c0.25082,0.26124 0.62327,0.36648 0.97371,0.27512c0.35044,-0.09136 0.62411,-0.36503 0.71547,-0.71547c0.09136,-0.35044 -0.01388,-0.72289 -0.27512,-0.97371l-7.29297,-7.29297l7.29297,-7.29297c0.29724,-0.28583 0.38857,-0.7248 0.23,-1.10546c-0.15857,-0.38066 -0.53454,-0.62497 -0.94679,-0.61524z">
                                    </path>
                                </g>
                            </g>
                        </svg>
                    </a></div>
            </div>

            @if ($message = Session::get('success'))
                <div x-transition
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
            <form action="{{ route('createArticleAction') }}" method="POST" id="articleForm" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label class="block mb-1 font-medium text-heading">Title</label>
                    <input type="text"
                        class="w-full p-3 border border-default rounded-lg focus:outline-none focus:ring-2 focus:ring-fg-brand"
                        placeholder="Enter Title Article" name="title" />
                </div>
                <div class="mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Upload file</h3>

                    <div class="mt-2 flex items-center border border-gray-300 rounded-md overflow-hidden bg-gray-50">
                        <label for="file_input"
                            class="cursor-pointer bg-gray-200 text-gray-700 hover:bg-gray-300 font-medium py-2 px-4 transition duration-150 ease-in-out border-r border-gray-300">
                            Choose File
                        </label>

                        <input type="file" id="file_input" name="image" class="hidden"
                            onchange="document.getElementById('file-name-display').textContent = this.files.length > 0 ? this.files[0].name : 'No file chosen'">

                        <span id="file-name-display" class="text-sm text-gray-500 py-2 px-4 truncate">
                            No file chosen
                        </span>
                    </div>

                    <p class="text-xs text-gray-500 mt-1">
                        PNG, JPG.
                    </p>
                </div>
                <div class="mb-6">
                    <div class="max-w-xl mx-auto border border-gray-300 rounded-lg bg-white shadow-md">

                        <div class="flex items-center space-x-2 p-2 border-b border-gray-200 bg-gray-50">

                            <button type="button"
                                class="text-gray-600 hover:text-gray-900 hover:bg-gray-200 p-1 rounded transition duration-150 ease-in-out"
                                title="Bold" onclick="document.execCommand('bold', false, null);">
                                <span class="font-bold text-lg">B</span>
                            </button>

                            <button type="button"
                                class="text-gray-600 hover:text-gray-900 hover:bg-gray-200 p-1 rounded transition duration-150 ease-in-out"
                                title="Italic" onclick="document.execCommand('italic', false, null);">
                                <span class="italic text-lg">I</span>
                            </button>
                        </div>

                        <div id="editor" name="article_content" contenteditable="true"
                            class="min-h-[200px] max-h-[200px] w-full p-4 text-gray-700 focus:outline-none overflow-auto"
                            style="resize: none;">
                            Write a description...
                        </div>

                    </div>
                </div>
                <input type="hidden" name="description" id="finalDescriptionInput">
                <button class="w-full p-3 rounded-lg bg-blue-500 text-white font-semibold hover:opacity-90">
                    Create Article
                </button>
            </form>
        </div>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const articleForm = document.getElementById('articleForm');
            const descriptionDiv = document.getElementById('editor');
            const finalDescriptionInput = document.getElementById('finalDescriptionInput');

            if (articleForm) {
                articleForm.addEventListener('submit', function(event) {
                    const htmlContent = descriptionDiv.innerHTML;

                    finalDescriptionInput.value = htmlContent;
                })
            }
        });
    </script>
@endsection
