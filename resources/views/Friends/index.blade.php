@extends('layouts.app')

@section('title', 'Friends')

@section('content')
<h2>MY FRIENDS LIST</h2>
<a href="/friends/create" class="card-link btn-primary">Tambah teman</a>
<div class="mb-3"></div>
<div class="row">
@foreach ($friends as $friend)
<div class="col-sm-4">
<div class="card text-white bg-success mb-3" style="width: 18rem;">
<div class="card-header">
    Friend Profile
  </div>
  <div class="card-body text-dark bg-light border-success">
    <a href="/friends/{{$friend['id']}}" class="card-title">{{ $friend['nama'] }}</a>
    <h6 class="card-subtitle mb-2 text-muted">{{ $friend['no_tlp'] }}</h6>
    <p class="card-text">{{ $friend['alamat'] }}</p>
    <p class="card-text">{{ $friend['jenis_kelamin'] }}</p>
    <p class="card-text">{{ $friend['instagram'] }}</p>

    <a href="/friends/{{$friend['id']}}/edit" class="card-link btn-warning">Edit Teman</a>
    <form action="/friends/{{ $friend['id'] }}" method="POST">
    @csrf
    @method('DELETE')
    <button class="card-link btn-danger">Delete Teman</button>
    </form>
  </div>
</div>
</div>


@endforeach
<div>
    {{ $friends->links() }}
</div>
<div class="mb-3"></div>
@endsection
</div>

    