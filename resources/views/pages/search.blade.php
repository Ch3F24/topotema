@extends('layouts.app')

@section('main')
    <div class="px-4 md:px-0 lg:ml-auto lg:w-7/12 ml-auto order-first lg:order-none mb-4 grid gap-y-5">
        @foreach($results as $result)
            <div>
                <h3 class="text-white text-xl">
                    <a href="{{ route('object.view',$result->id) }}" class="text-red-500 hover:text-red-400">{{ $result->name }}</a>
                </h3>
                <div class="ml-3">
                    <p class="text-white">{{ $result->alias }}</p>
                    <p class="text-white">{{ $result->description }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection
