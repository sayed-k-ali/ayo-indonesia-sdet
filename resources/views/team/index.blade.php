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
            <a style="margin: 19px;" href="{{ route('team.create')}}" class="btn btn-primary">Tambah Tim</a>
            <h3>Team</h3>    
            <table class="table table-striped">
                <thead>
                    <tr>
                    <td>ID</td>
                    <td>Name</td>
                    <td>Logo</td>
                    <td>Year</td>
                    <td>Address</td>
                    <td>City</td>
                    <td colspan = 2>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach($teams as $team)
                    <tr>
                        <td>{{$team->id}}</td>
                        <td>{{$team->name}}</td>
                        <td>{{$team->logo}}</td>
                        <td>{{$team->year}}</td>
                        <td>{{$team->address}}</td>
                        <td>{{$team->city}}</td>
                        <td>
                            <a href="{{ route('team.edit',$team->id)}}" class="btn btn-primary">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('team.destroy', $team->id)}}" method="post">
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