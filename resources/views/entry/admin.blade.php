@extends('entry.guest')

@section('navbar')
    @component('navbar_admin')
    @endcomponent
@endsection

@section('content')
    <div class="alert alert-danger">
        Вы уже вошли.
    </div>
@endsection

@section('footer')
    @component('footer')
    @endcomponent
@endsection