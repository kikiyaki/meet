@extends('frame')

@section('navbar')
    @component('navbar_guest')
    @endcomponent
@endsection

@section('content')

    <h2>
        # {{ $meet->id }} | {{ $meet->name }}
    </h2>

    <table class="table table-sm table-hover">
        <thead>
        <tr>
            <th scope="col" style="width: 10%">Позиция</th>
            <th scope="col" style="width: 70%">Имя</th>
            <th scope="col" style="width: 20%">Очки</th>
        </tr>
        </thead>

    @foreach($participants as $key => $participant)

        <tr>
            <th> {{ $key+1 }} </th>
            <td> {{ $participant->name }} </td>
            <td scope="row"> {{ $participant->points }} </td>
        </tr>

    @endforeach

    </table>

    {{ $participants->links() }}

@endsection

@section('footer')
    @component('footer')
    @endcomponent
@endsection