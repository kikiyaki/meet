@extends('frame')

@section('navbar')

    @component('navbar_guest')
    @endcomponent

@endsection

@section('content')

    <div class="alert alert-danger">
        Чтобы создать событие, нужно войти или зарегестрироваться
    </div>

@endsection

@section('footer')

    @component('footer')
    @endcomponent

@endsection