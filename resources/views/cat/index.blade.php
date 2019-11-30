@extends('base')

@section('page_title')
    Daftar Kategori
@endsection

@section('page_head')
    
@endsection

@section('page_content')
    <div class="row">
        <?php $number=1?>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Kategori</th>
                    <th>Ubah</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Nomor</th>
                    <th>Nama Kategori</th>
                    <th>Ubah</th>
                </tr>
            </tfoot>
            <tbody>
                @if (count($data) > 0)
                    @foreach ($data as $value)   
                    <tr>         
                    <th>{{$number++}}</th>
                    <th>{{$value->nama}}</th>
                    <th><a href="{{route('admin_category.edit', ['cat' => $value->id])}}">Ubah Kategori</a></th>
                    </tr>
                    @endforeach
                @else
                <th>----</th>
                <th>Tidak ada kategori</th>
                @endif
            </tbody>
        </table>
    </div>
@endsection