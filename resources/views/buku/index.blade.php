@extends('master.app')
@section('navigasi')
    <nav class="mt-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Buku</li>
        </ol>
    </nav>
@endsection
@section('konten')
    <div class="page-heading">
        <div class="page-title">
            <h3>Data buku</h3>
            <div class="d-flex justify-around">
                <div class="col-6">
                    <a href="{{ route('buku.create') }}">
                        <button class="btn btn-primary mt-2">
                            <i class="fa fa-plus-circle"></i> Tambah Data
                        </button>
                    </a>
                </div>
                <div class="col-6 ">
                    <div class="float-end">
                        <form class="d-flex " role="search">
                            <input class="form-control me-1 h-1" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-success " style="width:100px" type="submit"><i
                                    class="fa-solid fa-magnifying-glass me-2"></i>Cari</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
        <div class="page-content mt-4">
            <section class="section">
                <div class="row" id="basic-table">
                    <div class="col-12 col-md-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-lg table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Kode</th>
                                                    <th>Kategori</th>
                                                    <th>Nama Buku</th>
                                                    <th>Harga</th>
                                                    <th>Stok</th>
                                                    <th>Penerbit</th>
                                                    <th style="width: 20%"></th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($data as $buku)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>

                                                        <td>{{ $buku->kode }}</td>
                                                        <td>{{ $buku->kategori }}</td>
                                                        <td>{{ $buku->nama_buku }}</td>
                                                        <td>{{ $buku->harga }}</td>
                                                        <td>{{ $buku->stok}}</td>
                                                        <td>{{ $buku->penerbit_id }}</td>
                                                        <td>
                                                            <div class="buttons d-flex">
                                                                <a href="#" class="btn icon btn-primary">
                                                                    <i class="fa fa-info-circle"></i>
                                                                </a>
                                                                <a href="#" class="btn icon btn-warning">
                                                                    <i class="fa fa-pencil"></i>
                                                                </a>
                                                                <form action="{{ route('buku.destroy', $buku->id) }}" method="POST">
                                                                    @method('DELETE')
                                                                    @csrf
                                                                    <button class="btn icon btn-danger" type="submit"
                                                                        onclick="return confirm('Yakin ingin menghapus?')">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
