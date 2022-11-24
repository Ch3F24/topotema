@extends('layouts.app')
@section('assets')
    @vite('resources/js/object.js')
@endsection

@section('main')
    <div class="hidden lg:block lg:w-3/12">
        <div class="text-white mt-24">
            <p>{{ $object->category->first()->title }}</p>
            <p>
                {{ $object->category->first()->content }}
            </p>
        </div>
    </div>
    <div class="px-4 md:px-0 w-full lg:w-7/12 ml-auto order-first lg:order-none flex flex-wrap">
        <h1 class="w-full text-white order-first lg:order-none text-2xl lg:text-4xl mb-4">{{ $object->alias }}</h1>
        <div class="w-full lg:w-7/12">
            <div class="slider">
                <slider :photos="{{ json_encode($photos) }}"></slider>
            </div>
            <div class="text-white mt-6">
{{--                <img src="data:image/png;base64,{{ chunk_split(base64_encode($address->objects()->first()->photos->first()->file->file_content)) }}" alt="">--}}
                {!! $object->content !!}
            </div>
        </div>
        <div class="order-first lg:order-none w-full flex flex-wrap items-start lg:block lg:w-3/12 ml-auto my-4 lg:my-0">
            <div class="w-1/2 lg:w-full bg-black relative overflow-hidden transition-all">
                <div class="relative cursor-pointer" id="pdf-folder">
                    <img src="{{ asset('assets/svg/folder.svg') }}" alt="Fodler icon" class="hidden lg:inline-block">
                    <p>
                        Dosszié
                        <span class="hidden lg:block">pdf dokumentumok</span>
                    </p>
                </div>
{{--                <div class="space-y-2 max-h-0 transition-all border-t border-b lg:border-0" id="folder-files">--}}
{{--                    <p class="text-white"><a href="">Anyját verte.pdf</a></p>--}}
{{--                    <p class="text-white"><a href="">Anyját verte.pdf</a></p>--}}
{{--                    <p class="text-white"><a href="">Anyját verte.pdf</a></p>--}}
{{--                </div>--}}
            </div>
            <div class="w-full space-y-2 max-h-0 transition-all overflow-hidden order-last lg:order-none mt-4" id="folder-files">
                <p class="text-white"><a href="">Test1.pdf</a></p>
                <p class="text-white"><a href="">Test2.pdf</a></p>
                <p class="text-white"><a href="">Test3.pdf</a></p>
            </div>
            <div class="w-1/2 lg:w-full input-filter lg:mt-4">
                <p class="text-white px-4">Videó</p>
            </div>
        </div>
    </div>
@endsection
