@extends('frame')

@section('navbar')
    @component('navbar_admin')
    @endcomponent
@endsection

@section('content')

    <h2>Мои встречи</h2>

    <table class="table table-sm table-hover">
        <thead>
        <tr>
            <th scope="col" style="width: 10%">ID</th>
            <th scope="col" style="width: 90%">Name</th>
        </tr>
        </thead>
        <tbody>

        @foreach($meets as $meet)

            <tr onclick="window.location='meet/{{ $meet->id }}';">
                <th scope="row">{{ $meet->id }}</th>
                <td>{{ $meet->name }}</td>
            </tr>

        @endforeach

        </tbody>
    </table>

    {{ $meets->links() }}

@endsection

@section('footer')
    @component('footer')
    @endcomponent
@endsection