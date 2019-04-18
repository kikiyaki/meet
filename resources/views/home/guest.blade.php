@extends('frame')

@section('navbar')
    @component('navbar_guest')
    @endcomponent
@endsection

@section('content')
    <h2>Добро пожаловать!</h2>
    Это тестовый проект, написанный с помощью фреймворка Laravel.
    Идея сайта в создании простой системы учета очков для спортивных встреч с друзьями.
    Чтобы создать встречу, необходимо зарегестрироваться.
    Создатель встречи может добавлять или удалять участников, а также начислять очки.
    Незарегистрированные пользователи могут просматривать все встречи, найти которые они могут либо по ссылке,
    либо через поиск по названию.
@endsection

@section('footer')
    @component('footer')
    @endcomponent
@endsection