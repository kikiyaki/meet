@extends('meet.guest')

@section('navbar')
    @component('navbar_admin')
    @endcomponent
@endsection

@section('content')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function addPoint(id) {
            $.ajax({
                type: 'POST',
                url: '/addPoint',
                data: {
                    participant_id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function (new_points) {
                    $("#id_"+id).html(new_points);
                }
            });
        }

        function removePoint(id) {
            $.ajax({
                type: 'POST',
                url: '/removePoint',
                data: {
                    participant_id: id,
                    _token: "{{ csrf_token() }}"
                },
                success: function (new_points) {
                    $("#id_"+id).html(new_points);
                }
            });
        }
    </script>

    <h2>
        # {{ $meet->id }} | {{ $meet->name }}
    </h2>

    <table class="table table-sm table-hover mb-0">
        <thead>
        <tr>
            <th scope="col" style="width: 10%">Позиция</th>
            <th scope="col" style="width: 50%" class="mx-0">Имя</th>
            <th scope="col" style="width: 40%">Очки</th>
        </tr>
        </thead>

        @foreach($participants as $key => $participant)

            <tr>
                <th> {{ $key+1 }} </th>
                <td> {{ $participant->name }} </td>
                <td>
                    <button type="submit" class="btn btn-outline-success" onclick="addPoint({{ $participant->id }})"
                            style="width: 40px">+</button>

                    <div id="id_{{ $participant->id }}" style="display: inline">
                        {{ $participant->points }}
                    </div>

                    <button type="submit" class="btn btn-outline-danger" onclick="removePoint({{ $participant->id }})"
                            style="width: 40px">-</button>

                    <form method="POST" action="/deleteParticipant" style="display: inline">
                            @csrf
                        <input type="text" name="id" value="{{ $participant->id }}" style="display: none"/>
                        <button type="submit" class="btn btn-outline-dark px-2" style="width: 40px">
                            <img src="{{ asset('delete.png') }}" width="20" height="20"
                                 class="d-inline-block align-top" alt="">
                        </button>
                    </form>
                </td>
            </tr>

        @endforeach

    </table>

    <form method="POST" action="/addParticipant">
        @csrf
    <table class="table table-sm table-hover">
        <tr>
            <td style="width: 10%">
                Новый:
            </td>
            <td style="width: 50%">
                <input type="text" name="name" class="form-control" placeholder="Имя"/>
                <input type="text" name="meet_id" style="display: none" value="{{ $meet->id }}"/>
            </td>
            <td style="width: 40%">
                <button type="submit" class="btn btn-outline-info">Добавить</button>
            </td>
        </tr>
    </table>
    </form>
    {{ $participants->links() }}

    <form method="POST" action="/deleteMeet">
            @csrf
        <input type="text" name="meet_id" value="{{ $meet->id }}" style="display: none"/>
        <button type="submit" class="btn btn-outline-danger">Удалить встречу</button>
    </form>

@endsection

@section('footer')
    @component('footer')
    @endcomponent
@endsection