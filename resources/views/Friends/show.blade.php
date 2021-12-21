@extends('layouts.app')

@section('title', 'Friends Detail')

@section('content')
<div class="col-sm-5">
<div class="card border-success mt-4">
<div class="card-header text-white bg-success">
    Friend Detail
</div>
    <div class="card-body border-success text-dark bg-opacity-10">
         <h5>Nama teman : {{ $friend['nama'] }}</h5>
         <h5>Nomor Tlp : {{ $friend['no_tlp'] }}</h5>
         <h5>Alamat : {{ $friend['alamat'] }}</h5>
         <h5>Jenis Kelamin : {{ $friend['jenis_kelamin'] }}</h5>
         <h5>Instagram : {{ $friend['instagram'] }}</h5>
    </div>
</div>
</div>
@endsection
    
