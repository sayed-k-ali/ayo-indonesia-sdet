@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    <div class="col-lg-3">
    </div>
    <div class="col-lg-6">
        <form action="{{ route('player.update', $player->id) }}" method="post">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="playerName">Nama Pemain</label>
                <input type="text" class="form-control" id="playerName" name="name" value="{{ $player->name }}">
            </div>
            <div class="form-group">
                <label for="teamName">Nama Tim</label>
                <select class="form-control" name="team_id" id="teamName">
                    @foreach($teams as $team)
                        <option value="{{ $team->id }}" @if($team->id == $player->team_id) selected @endif>{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="playerTall">Tinggi Badan</label>
                <input type="text" class="form-control" id="playerTall" name="tall" value="{{ $player->tall}}">
            </div>
            <div class="form-group">
                <label for="playerWeight">Berat Badan</label>
                <input type="text" class="form-control" id="playerWeight" name="weight" value="{{ $player->weight }}">
            </div>
            <div class="form-group">
                <label for="playerRole">Posisi</label>
                @php 
                    $arr_role = ['penyerang', 'gelandang', 'bertahan', 'penjaga gawang']
                @endphp
                <select class="form-control" name="role" id="playerRole">
                    @foreach($arr_role as $role)
                        <option value="{{ $role }}" @if ($role === $player->role) selected @endif > {{ ucwords($role) }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="playerBackNumber">Nomor Punggung</label>
                <input type="text" class="form-control" id="playerBackNumber" name="back_num" value="{{ $player->back_num }}">
            </div>
            <button type="submit" class="btn btn-primary-outline">Simpan</button>
        </form>
    </div>
    </div>
</div>
@endsection