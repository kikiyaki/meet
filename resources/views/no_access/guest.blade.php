@extends('frame')

@section('navbar')

    @component('navbar_guest')
    @endcomponent

@endsection

@section('content')

    <div class="alert alert-danger">
        Вы не можете выполнить это действие
    </div>

@endsection

@section('footer')

    @component('footer')
    @endcomponent

@endsection