@extends('layouts.app')

@section('meta')
    <title>{{ __('Site Title') }}</title>
@endsection

@section('assets')
    <script type="text/javascript" src="{{ asset('build/assets/leaflet.js') }}"></script>
{{--    <script type="text/javascript" src="{{ asset('build/assets/Control.Geocoder.min.js') }}"></script>--}}
    <script type="text/javascript" src="{{ asset('assets/js/stamen.js') }}"></script>
    @vite('resources/js/app.js')
@endsection

@section('main')

    <div class="w-full lg:w-3/12">

        <categories></categories>

    </div>

    <div class="w-full lg:w-7/12 ml-auto order-first lg:order-none mb-4">

        <maps
            :objects-prop="{{ json_encode($objects) }}"
            :organizations="{{ json_encode($organizations) }}"
            :categories="{{ json_encode($categories) }}"
            :subject_words="{{ json_encode($subject_words) }}"
            object_route="{{ route('object') }}">
        </maps>

    </div>
@endsection
