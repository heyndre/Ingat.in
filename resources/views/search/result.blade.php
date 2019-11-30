@extends('base')

@section('page_title')
    
@endsection

@section('page_head')
    
@endsection

@section('page_content')
    <div class="row">
            <table class="table-bordered table-responsive">
                <?php $number=1?>
                    <tr>
                        <th>Nomor</th>
                        <th>Nama Barang</th>
                        <th>Gambar</th>
                        <th>Pemilik</th>
                    </tr>
                    @foreach($data as $p)
                    <tr>
                        <td>{{$number++}}</td>
                        <td> <a class="btn btn-primary" href="{{route('user_barang.show', ['user_barang' => $p->id_barang])}}"> {{ $p->nama_barang }} </a></td>
                        <td>
                            @if (count($p->image) > 0)
                            <img src="{{asset('barang/'.$p->image)}}" class="img-thumbnail">
                            @else
                          <img src="{{asset('barang/404.jpg')}}" class="img-thumbnail">
                          @endif
                        </td>
                        <td>{{ $p->name }}</td>
                    </tr>
                    @endforeach
                </table>
             
                <br/>
                Halaman : {{ $data->currentPage() }} <br/>
                Jumlah Data : {{ $data->total() }} <br/>
                Data Per Halaman : {{ $data->perPage() }} <br/>
             
             
                {{ $data->links() }}
    </div>
@endsection