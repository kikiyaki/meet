@extends('frame')

@section('navbar')
    @component('navbar_guest')
    @endcomponent
@endsection

@section('content')
    <h2>Регистрация</h2>
           <form>
               <div class="form-group">
                   <label for="name">Имя</label>
                   <input type="text" class="form-control" id="name" style="max-width: 300px"/>
               </div>
               <div class="form-group">
                   <label for="email">Почта</label>
                   <input type="email" class="form-control" id="email" style="max-width: 300px"/>
               </div>
               <div class="form-group">
                   <label for="password">Пароль</label>
                   <input type="password" class="form-control" id="password" style="max-width: 300px"/>
               </div>
                   <button type="submit" class="btn btn-outline-primary">Принять</button>
           </form>
@endsection

@section('footer')
    @component('footer')
    @endcomponent
@endsection