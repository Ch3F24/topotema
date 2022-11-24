@extends('layouts.app')

@section('assets')
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
            integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
            crossorigin=""></script>
{{--    <script type="text/javascript" src="http://maps.stamen.com/js/tile.stamen.js?v1.3.0"></script>--}}
    <script type="text/javascript" src="{{ asset('assets/js/stamen.js') }}"></script>
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    {{--    <script type="text/javascript" src="@/resources/js/stamen.js"></script>--}}
    {{--    @vite('resources/js/stamen.js')--}}
    @vite('resources/js/app.js')
@endsection

@section('main')
    <div class="w-full lg:w-3/12">
        <categories></categories>
    </div>
    <div class="w-full lg:w-7/12 ml-auto order-first lg:order-none mb-4">
        <maps
            :objects="{{ json_encode($objects) }}"
            :organizations="{{ json_encode($organizations) }}"
            :categories="{{ json_encode($categories) }}"
            :subject_words="{{ json_encode($subject_words) }}"
            object_route="{{ route('object.view') }}">
        </maps>
    </div>
@endsection
