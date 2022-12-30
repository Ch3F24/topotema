@extends('layouts.app')

@section('meta')
    <title>{{ $object->alias . ' - ' . __('Site Title') }}</title>
@endsection

@section('assets')
    @vite('resources/js/object.js')
@endsection

@section('main')

    <div class="hidden lg:block lg:w-3/12">

        <div class="text-white mt-24 lg:fixed">

            <category :category="{{ json_encode($object->category->first()) }}"></category>

        </div>

    </div>

    <div class="px-4 md:px-0 w-full lg:w-7/12 ml-auto order-first lg:order-none flex flex-wrap">

        <h1 class="w-full text-white order-first lg:order-none text-[26px] mt-4">{{ $object->name }}</h1>

        <h3 class="w-full text-white order-first lg:order-none text-xl -mt-1">{{ $object->alias }}</h3>

        <div class="w-full lg:w-7/12 mt-8 lg:mt-16">

            @if(count($photos))
                <div class="slider mb-6">
                    <slider :photos="{{ json_encode($photos) }}"></slider>
                </div>
            @endif

            <div class="text-white">
                {!! $object->content !!}
            </div>

        </div>

        <div class="order-first lg:order-none w-full flex flex-wrap items-start lg:block lg:w-3/12 ml-auto my-4 lg:my-0">

            @if(count($object->documents))

                <documents
                    :documents="{{ json_encode($object->documents) }}"
                    :memoirs="{{ json_encode($object->memoirs) }}">
                </documents>

            @endif

            <div class="w-1/2 lg:w-full input-filter lg:mt-4 py-2">

                <p class="text-white px-4">{{ __('Videos') }}</p>

            </div>

        </div>
    </div>
@endsection
