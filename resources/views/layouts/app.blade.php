@extends('frame')

@section('navbar')
    @guest
        @component('navbar_guest')
        @endcomponent
    @else
        @component('navbar_admin')
        @endcomponent
    @endguest

@section('footer')
    @component('footer')
    @endcomponent
@endsection