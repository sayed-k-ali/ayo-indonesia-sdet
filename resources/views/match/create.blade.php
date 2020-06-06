@extends('layouts.app')

@section('content')
<div class="container">
<div class="row">
    <div class="col-md-6">
        <h2>{{ $schedule->home_team->name }}</h2>
        <form action="{{route('match.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="hidden" name="team_id" value="{{ $schedule->home_team_id }}" />
                <input type="hidden" name="schedule_id" value="{{ $schedule->id }}" />
                <label for="playerName">Nama Pemain</label>
                <select name="player_id" id="playerName" class="form-control selectpicker">
                    @foreach ($home_player as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="goalTime">Waktu Goal</label>
                <input type="number" name="goal_time" id="goalTime" min="0" max="99" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary-outline">Simpan</button>
        </form>
    </div>
    <div class="col-md-6">
        <h2>{{ $schedule->away_team->name }}</h2>
        <form action="{{route('match.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <input type="hidden" name="team_id" value="{{ $schedule->away_team_id }}" />
                <input type="hidden" name="schedule_id" value="{{ $schedule->id }}" />
                <label for="playerName">Nama Pemain</label>
                <select name="player_id" id="playerName" class="form-control selectpicker">
                    @foreach ($away_player as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="goalTime">Waktu Goal</label>
                <input type="number" name="goal_time" id="goalTime" min="0" max="99" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary-outline">Simpan</button>
        </form>
    </div>
</div>

<br/>

<div class="row">
    <div class="col-md-12">
        <h1>Hasil Sementara</h1>
        @php
            $home_score = 0;
            $away_score = 0;

            $home_player = [];
            $away_player = [];

            
            foreach ($schedule->match as $key => $val) {
                if ($val->team_id == $schedule->home_team_id) {
                    $home_score += 1;
                    $home_player[$key]['name'] = $val->player->name;
                    $home_player[$key]['goal_time'] = $val->goal_time;
                } else {
                    $away_score += 1;
                    $away_player[$key]['name'] = $val->player->name;
                    $away_player[$key]['goal_time'] = $val->goal_time;
                }
            }

        @endphp
        <table class="table table-bordered">
            <thead>
                <th>{{$home_score}}</th>
                <th>{{$away_score}}</th>
            </thead>
            <tbody>
                <tr>
                    <td> 
                        <ul>
                            @foreach($home_player as $val)
                                <li>{{$val['name']}} '{{ $val['goal_time'] }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td> 
                        <ul>
                            @foreach($away_player as $val)
                                <li>{{$val['name']}} '{{ $val['goal_time'] }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection