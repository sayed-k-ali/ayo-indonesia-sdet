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
            @if(session()->get('error'))
                <div class="alert alert-danger">
                {{ session()->get('error') }}  
                </div>
            @endif
            <a style="margin: 19px;" href="{{ route('player.create')}}" class="btn btn-primary">Tambah Pemain</a>
            <h3>Team</h3>    
            <table class="table table-striped">
                <thead>
                    <tr>
                    <td>Name</td>
                    <td>Tim</td>
                    <td>Tinggi</td>
                    <td>Berat Badan</td>
                    <td>Posisi</td>
                    <td>Nomor Punggung</td>
                    <td colspan = 2>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($players as $player)
                    <tr>
                        <td>{{$player->name}}</td>
                        <td>{{$player->team->name}}</td>
                        <td>{{$player->tall}}</td>
                        <td>{{$player->weight}}</td>
                        <td>{{ucwords($player->role)}}</td>
                        <td>{{$player->back_num}}</td>
                        <td>
                            <a href="{{ route('player.edit',$player->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('player.destroy', $player->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection