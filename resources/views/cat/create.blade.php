@extends('base')

@section('page_title')
    Tambah Kategori
@endsection

@section('page_head')
    
@endsection

@section('page_content')
    <div class="row">
    <form action="{{route('admin_category.store')}}" method="POST">
    @csrf
        <div class="form-group">
            <input type="text" class="form-control form-control-user" id="namaKategori" name="namaKategori" placeholder="Nama Kategori">
        </div>
        <button type="submit" class="btn btn-primary" style="width:100%">
                Simpan Kategori
        </button>
    </form>
    </div>
@endsection