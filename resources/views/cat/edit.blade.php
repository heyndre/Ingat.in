{{-- {{$data}} --}}

@extends('base')

@section('page_title')
    
@endsection

@section('page_head')
    
@endsection

@section('page_content')
<div class="row">
    <div class="">
        <form action="{{route('admin_category.update', ['admin_category' => $data->id])}}" method="POST">
                @method('PUT')
                @csrf
                    <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="namaKategori" name="namaKategori" placeholder="Nama Kategori" value="{{$data->nama}}">
                    </div>
                    <button type="submit" class="btn btn-primary" style="width:100%">
                            Simpan Perubahan
                        </button>
                </form>
    </div>
    <div>
    <form action="{{route('admin_category.destroy', ['admin_category' => $data->id])}}" method="POST">
    @method('DELETE')
    @csrf
    <button type="submit" class="btn btn-warning" onclick="clicked(event)"> HAPUS </button>
    </form>
    </div>
</div>

<script>
        function clicked(e)
        {
            if(!confirm('KONFIRMASI PENGHAPUSAN DATA'))e.preventDefault();
        }
</script>
@endsection