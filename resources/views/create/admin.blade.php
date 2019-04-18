@extends('create.guest')

@section('navbar')

    @component('navbar_admin')
    @endcomponent

@endsection

@section('content')

    <form method="POST" action="/createMeet">

        @csrf

        <div class="form-group d-flex justify-content-start m-0">
            <h2>Создание встречи</h2>
        </div>
        <div class="form-group d-flex justify-content-start m-0">
            <label for="name">Название</label>
        </div>
        <div class="form-group d-flex justify-content-start mt-0">
            <input type="text" id="name" name="name" class="form-control" style="width: 300px">
        </div>

        <div class="form-group d-flex justify-content-start">
            <button type="submit" class="btn btn-outline-primary">Создать</button>
        </div>
    </form>

@endsection

@section('footer')

    @component('footer')
    @endcomponent

@endsection