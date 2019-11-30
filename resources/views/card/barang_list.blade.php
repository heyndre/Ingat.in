@extends('base')

@section('page_title')
    Semua Barang Saya
@endsection

@section('page_head')
    
@endsection

@section('page_content')
<div class="container">

  <div class="row">
      @if (count($barang) > 0)
      @foreach ($barang as $item)
    <!-- Basic Card Example -->
    <div class="column card shadow">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">
           <a href="{{route('user_barang.show', ['user_barang' => $item->id_barang])}}">
           Nama Barang : {{$item->nama_barang}}</a></h6>
         @if (count($item->image) > 0)
        <img src="{{asset('barang/'.$item->image)}}" class="img-thumbnail">
        @else
        <img src="{{asset('barang/404.jpg')}}" class="img-thumbnail">
        @endif
      </div>
       <div class="card-body">
         {{$item->deskripsi}}, <br>
        Kategori : {{$item->nama}}<br>
        <a href="{{route('user_barang.show', ['user_barang' => $item->id_barang])}}" class="btn btn-primary">Lihat Detail</a>
      </div>
     </div>
     @endforeach
     @else
     <div class="card shadow mb-7">
       <br>
       <h6>Anda Belum Memiliki Barang!</h6>
       <br>
      </div> 
    </div>
    @endif
  </div>

  
@endsection