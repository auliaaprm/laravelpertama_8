@extends('layouts.app')

@section('title', 'Cobaaaaa')

@section('content')
<div class="card">
    <div class="card-body">
         <h3>Nama teman : {{ $friend['nama'] }}</h3>
         <h3>Nomor Tlp : {{ $friend['no_tlp'] }}</h3>
         <h3>Alamat : {{ $friend['alamat'] }}</h3>
         <h3>Jenis Kelamin : {{ $friend['jenis_kelamin'] }}</h3>
         <h3>Instagram : {{ $friend['instagram'] }}</h3>
    </div>
</div>
@endsection
    
