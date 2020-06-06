@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3>Hasil Pertandingan</h3>
            <table class="table table-striped">
                <tbody>
                    @foreach($schedule as $val)
                        @php
                            $score_home = 0;
                            $score_away = 0;
                            foreach ($val->match as $v) {
                                if ($v->team_id == $val->home_team_id) {
                                    $score_home += 1;
                                } else {
                                    $score_away += 1;
                                }
                            }
                        @endphp
                    <tr>
                        <td>{{$val->home_team->name}}</td>
                        <td>{{$score_home ? $score_home : ' - '}} vs {{$score_away ? $score_away : ' - '}}</td>
                        <td>{{$val->away_team->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
                
            </table>
        </div>
    </div>
</div>
@endsection