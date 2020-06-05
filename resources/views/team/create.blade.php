@extends('layouts.app')

@section('content')
<!-- <form action="{{ route('team.store') }}" method="post">
    {{ csrf_field() }}
    <Label>Nama Tim: </Label><input name="name" /> <br/>
    <Label>Logo: </Label><input name="logo" /> <br/>
    <Label>Tahun: </Label><input name="year" /> <br/>
    <Label>Alamat: </Label><textarea name="address"></textarea> <br/>
    <Label>Kota: </Label><input name="city" /> <br/>
    <input type="submit" value="Submit" />
</form> -->
<div class="container">
<form action="{{ route('team.store') }}" method="post">
  @csrf
  <div class="form-group">
    <label for="teamName">Nama Tim</label>
    <input type="text" class="form-control" id="teamName" name="name" placeholder="Nama Tim">
  </div>
  <div class="form-group">
    <label for="teamLogo">Logo</label>
    <input type="text" class="form-control" id="teamLogo" name="logo">
  </div>
  <div class="form-group">
    <label for="year">Tahun</label>
    <input type="text" class="form-control" id="year" name="year" />
  </div>
  <div class="form-group">
    <label for="teamAddress">Alamat:</label>
    <textarea class="form-control" id="teamAddress" rows="3" name="address"></textarea>
  </div>
  <div class="form-group">
    <label for="teamCity">Kota</label>
    <input type="text" class="form-control" id="teamCity" name="city" placeholder="Kota">
  </div>
  <button type="submit" class="btn btn-primary-outline">Simpan</button>
</form>
</div>
@endsection