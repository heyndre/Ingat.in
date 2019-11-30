@extends('base')

@section('page_title')
    Home
@endsection

@section('page_content')
<div class="row">
                <!-- Pending Requests Card Example -->
                <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                          <div class="card-body">
                            <div class="row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Permintaan Pinjaman</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($data)}}</div>
                              </div>
                              <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                                <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah pinjaman dari anda</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($data2)}}</div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
             <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah peminjaman anda</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($data3)}}</div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                 <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah barang dalam sistem</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($data4)}}</div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                                                  <!-- Earnings (Monthly) Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-success shadow h-100 py-2">
                      <div class="card-body">
                        <div class="row no-gutters align-items-center">
                          <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jumlah barang anda</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($data5)}}</div>
                          </div>
                          <div class="col-auto">
                            <i class="fas fa-archive fa-2x text-gray-300"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  
</div>
@endsection
