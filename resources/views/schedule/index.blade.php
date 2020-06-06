@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            @if(session()->get('success'))
                <div class="alert alert-success">
                {{ session()->get('success') }}  
                </div>
            @endif
            <a style="margin: 19px;" href="{{ route('schedule.create')}}" class="btn btn-primary">Tambah Jadwal</a>
            <h3>Team</h3>    
            <table class="table table-striped">
                <thead>
                    <tr>
                    <td>Tanggal</td>
                    <td>Jam</td>
                    <td>Tuan Rumah</td>
                    <td>Tamu</td>
                    <td colspan = 2>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($schedules as $schedule)
                    <tr>
                        <td>{{ date('d-m-Y',strtotime($schedule->date))}}</td>
                        <td>{{$schedule->time}}</td>
                        <td>{{$schedule->home_team->name}}</td>
                        <td>{{$schedule->away_team->name}}</td>
                        <td>
                            <a href="{{ route('match.create',$schedule->id)}}" class="btn btn-primary btn-sm" disabled="true">Tambah Skor
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection