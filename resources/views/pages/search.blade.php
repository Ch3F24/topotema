@extends('layouts.app')

@section('meta')

    <title>{{ __('Site Title') }}</title>

@endsection

@section('main')

    <div class="order-first mb-4 ml-auto grid gap-y-5 px-4 md:px-0 lg:order-none lg:w-7/12">

        <h1 class="w-full text-2xl text-white lg:text-4xl mb-8 lg:mb-16">{{ $query }}</h1>

        @foreach($results as $result)

            <div>

                <h3 class="text-xl text-white">

                    <a href="{{ route('object',$result->id) }}"
                       class="text-red-500 hover:text-red-400">{{ $result->name }}
                    </a>

                </h3>

                <div class="ml-3">

                    <p class="text-white">{{ $result->alias }}</p>

                    <p class="text-white">{{ $result->description }}</p>

                </div>

            </div>

        @endforeach

    </div>
@endsection
