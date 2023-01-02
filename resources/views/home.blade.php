@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <?php
                        $user_id = Auth::user()->id;
                        $role_id = Auth::user()->role_id;

                        $data = DB::table('users')
                            ->leftJoin('katalog_role', 'users.role_id', 'katalog_role.id')
                            ->select('katalog_role.deskripsi as role_user')
                            ->where('users.id', $user_id)
                            ->first();
                    ?>
                    {{ __('Anda berhasil login sebagai ') }} {{ $data->role_user }}
                    <!-- MENU ROLE PENJUAL -->
                    @if($role_id == 1)
                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="card p-2">
                                <div class="card-header text-white bg-primary">Menu Input Produk</div>

                                <div class="card-body">
                                    <span>Input Produk Anda Di Sini</span>
                                </div>
                                <a href="{{url('input_produk')}}" class="btn btn-sm text-white btn-info ">Input</a>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card p-2">
                                <div class="card-header text-white bg-primary">Menu Laporan Produk</div>

                                <div class="card-body">
                                    <span>Lihat Produk Anda Di Sini</span>
                                </div>
                                <a href="{{url('report_produk')}}" class="btn btn-sm text-white btn-warning">View
                                    Report</a>
                            </div>
                        </div>
                    </div>

                    @elseif($role_id == 2)
                    <!-- MENU ROLE PEMBELI -->
                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="card p-2">
                                <div class="card-header text-white bg-primary">Pesanan Pembelian</div>

                                <div class="card-body">
                                    <span>Pilih Produk Di sini</span>
                                </div>
                                <a href="{{url('input_produk')}}" class="btn btn-sm text-white btn-info">Input</a>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card p-2">
                                <div class="card-header text-white bg-primary">Dafter Pembelian</div>

                                <div class="card-body">
                                    <span>Lihat Produk Anda Di Sini</span>
                                </div>
                                <a href="{{url('report_produk')}}" class="btn btn-sm text-white btn-warning">View
                                    Report</a>
                            </div>
                        </div>
                    </div>

                    @elseif($role_id == 3)
                    <!-- MENU ROLE ADMIN -->
                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="card p-2">
                                <div class="card-header text-white bg-primary">Cek Status User</div>

                                <div class="card-body">
                                    <span>Pilih Data User</span>
                                </div>
                                <a href="{{url('input_produk')}}" class="btn btn-sm text-white btn-info">Edit</a>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card p-2">
                                <div class="card-header text-white bg-primary">Vertifikasi User</div>

                                <div class="card-body">
                                    <span>Pilih Data User</span>
                                </div>
                                <a href="{{url('report_produk')}}" class="btn btn-sm text-white btn-warning">Verifiy</a>
                            </div>
                        </div>
                    </div>

                    @elseif($role_id == 4)
                    <!-- MENU ROLE PENGIRIM -->
                    <div class="row mt-2">
                        <div class="col-6">
                            <div class="card p-2">
                                <div class="card-header text-white bg-primary">Alamat Pengiriman</div>

                                <div class="card-body"></div>
                                <a href="{{url('input_produk')}}" class="btn btn-sm text-white btn-info">Lihat</a>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card p-2">
                                <div class="card-header text-white bg-primary">Status Pengiriman</div>

                                <div class="card-body"></div>
                                <a href="{{url('report_produk')}}" class="btn btn-sm text-white btn-warning">Lihat</a>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection