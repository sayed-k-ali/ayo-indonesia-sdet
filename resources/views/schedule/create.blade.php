@extends('layouts.app')

@section('content')
<div class="container">
<form action="{{ route('schedule.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="scheduleDate">Tanggal</label>
    <input type="date" class="form-control" id="scheduleDate" name="date" placeholder="Tanggal">
  </div>
  <div class="form-group">
    <label for="scheduleTime">Waktu</label>
    <input type="time" class="form-control" id="scheduleTime" name="time">
  </div>
  <div class="form-group">
    <label for="homeTeamName">Tuan Rumah</label>
    <select class="form-control" name="home_team_id" id="homeTeamName">
        <option readonly="true" selected>---Pilih Tim---</option>
        @foreach($teams as $team)
            <option value="{{ $team->id }}">{{ $team->name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="awayTeamName">Tamu</label>
    <select class="form-control" name="away_team_id" id="awayTeamName">
        <option readonly="true" selected>---Pilih Tim---</option>
        @foreach($teams as $team)
            <option value="{{ $team->id }}">{{ $team->name }}</option>
        @endforeach
    </select>
  </div>
  <button type="submit" class="btn btn-primary-outline">Simpan</button>
</form>
</div>
@endsection