@extends('frame')

@section('navbar')
    @component('navbar_guest')
    @endcomponent
@endsection

@section('content')

    <div class="form-group">
        <table>
            <form action="/meetList" method="get">
                <tr>
                    <th>
                        <select id="sort" name="sort" class="form-control" style="width:200px">
                            <option value="">--Сортировать--</option>
                            <option value="asc" {{ Request::input('sort')=='asc'? 'selected' : '' }}>По имени а-я</option>
                            <option value="desc" {{ Request::input('sort')=='desc'? 'selected' : '' }}>По имени я-а</option>
                        </select>
                    </th>
                    <th>
                        <input class="form-control" type="text" id="search" name="search" style="width:200px;"
                        value="{{ Request::input('search') }}"/>
                    </th>
                    <th>
                        <input class="btn" type="submit" value="Поиск"/>
                    </th>
                </tr>
            </form>
        </table>

    </div>

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

    {{ $meets->appends(['sort' => Request::input('sort'),
                        'search' => Request::input('search')])
                        ->links() }}

@endsection

@section('footer')
    @component('footer')
    @endcomponent
@endsection