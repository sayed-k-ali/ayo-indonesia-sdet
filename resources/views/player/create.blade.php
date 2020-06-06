@extends('layouts.app')

@section('content')

<div class="container">
<form action="{{ route('player.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="playerName">Nama Pemain</label>
    <input type="text" class="form-control" id="playerName" name="name" placeholder="Nama Pemain">
  </div>
  <div class="form-group">
    <label for="teamName">Nama Tim</label>
    <select class="form-control" name="team_id" id="teamName">
        <option readonly="true" selected>---Pilih Tim---</option>
        @foreach($teams as $team)
            <option value="{{ $team->id }}">{{ $team->name }}</option>
        @endforeach
    </select>
  </div>
  <div class="form-group">
    <label for="playerTall">Tinggi Badan</label>
    <input type="text" class="form-control" id="playerTall" name="tall" placeholder="Tinggi Badan">
  </div>
  <div class="form-group">
    <label for="playerWeight">Berat Badan</label>
    <input type="text" class="form-control" id="playerWeight" name="weight" placeholder="Berat Badan">
  </div>
  <div class="form-group">
    <label for="playerRole">Posisi</label>
    <select class="form-control" name="role" id="playerRole">
        <option readonly="true" selected>---Pilih Posisi---</option>
        <option value="penyerang">Penyerang</option>
        <option value="gelandang">Gelandang</option>
        <option value="bertahan">Bertahan</option>
        <option value="penjaga gawang">Penjaga Gawang</option>
    </select>
  </div>
  <div class="form-group">
    <label for="playerBackNumber">Nomor Punggung</label>
    <input type="text" class="form-control" id="playerBackNumber" name="back_num" placeholder="Nomor Punggung">
  </div>
  <button type="submit" class="btn btn-primary-outline">Simpan</button>
</form>
</div>
@endsection