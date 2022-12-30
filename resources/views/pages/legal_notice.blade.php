@extends('layouts.app')

@section('meta')
    <title>{{ __('Legal notice') . ' - ' . __('Site Title') }}</title>
@endsection

@section('main')
    <div class="ml-auto px-4 md:px-0 lg:w-7/12">

        <h1 class="w-full text-2xl text-white lg:text-4xl">{{ __('Legal notice') }}</h1>

    </div>
@endsection
