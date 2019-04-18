@extends('home.guest')

@section('navbar')
    @component('navbar_admin')
    @endcomponent
@endsection

@section('content')
    @parent
@endsection

@section('footer')
    @parent
@endsection
