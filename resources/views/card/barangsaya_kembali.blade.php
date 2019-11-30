@extends('base')

@section('page_title')
    Barang saya yang tersedia
@endsection

@section('page_head')
    
@endsection

@section('page_content')
<div class="row">
  <div class="col-md-8">
    @if (count($barang) > 0)
    @foreach ($barang as $item)
    <!-- Basic Card Example -->
     <div class="card shadow mb-4">
       <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Basic Card Example</h6>
       </div>
       <div class="card-body">
         The styling for this basic card example is created by using default Bootstrap utility classes. By using utility classes, the style of the card component can be easily modified with no need for any custom CSS!
       </div>
     </div>
     @endforeach
     @else
     <div class="card shadow mb-12">
       <br>
       <h6>Anda tidak memiliki barang yang tersedia!</h6>
       <br>
      </div> 
    </div>
    @endif
  <div class="col-md-4">
      <a href="{{route('user_barang.create')}}" class="btn btn-primary btn-icon-split">
          <span class="">
            <i class="fas fa-plus"></i>
            Tambah Barang
          </span>
      </a>
  </div>
  </div>
    
@endsection