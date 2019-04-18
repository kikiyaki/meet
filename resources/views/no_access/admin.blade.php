@extends('no_access.guest')

@section('navbar')

    @component('navbar_admin')
    @endcomponent

@endsection

@section('content')

    @parent

@endsection

@section('footer')

    @component('footer')
    @endcomponent

@endsection