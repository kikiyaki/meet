@extends('frame')

@section('navbar')
    @component('navbar_guest')
    @endcomponent
@endsection

@section('content')
    <h2>Вход</h2>
           <form>
               <div class="form-group">
                   <label for="name">Имя или почта</label>
                   <input type="text" class="form-control" id="name" style="max-width: 300px"/>
               </div>
               <div class="form-group">
                   <label for="password">Пароль</label>
                   <input type="password" class="form-control" id="password" style="max-width: 300px"/>
               </div>
                   <button type="submit" class="btn btn-outline-primary">Войти</button>
           </form>
@endsection

@section('footer')
    @component('footer')
    @endcomponent
@endsection