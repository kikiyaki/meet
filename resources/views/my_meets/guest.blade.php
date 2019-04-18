@extends('frame')

@section('navbar')
    @component('navbar_guest')
    @endcomponent
@endsection

@section('content')
    <div class="alert alert-danger">
        Войдите, чтобы просматривать свои встречи
    </div>
@endsection

@section('footer')
    @component('footer')
    @endcomponent
@endsection