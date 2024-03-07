@extends('master.app')
@section('navigasi')
    <nav class="mt-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ url('/') }}">
                    <i class="fa fa-home"></i> Home
                </a>
            </li>
            <li class="breadcrumb-item" aria-current="page">
                <a href="{{ route('buku.index') }}">buku</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data</li>
        </ol>
    </nav>
@endsection
@section('konten')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 order-md-1 order-last">
                    <div style="float: right">
                        <a href="{{ route('buku.index') }}">
                            <button class="btn btn-warning mt-2">
                                <i class="fa fa-arrow-circle-left"></i> Kembali
                            </button>
                        </a>
                    </div>
                    <h3>Tambah Data</h3>
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
                                    {{-- enctype="multi platform ngirim data harus ada ini" --}}
                                    <form action="{{ url('buku') }}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="basicInput">Kode</label>
                                                    <input type="text" value="{{ old('judul') }}" name="judul"
                                                        class="form-control mb-2 @error('judul') is-invalid @enderror"
                                                        id="basicInput" placeholder="  ">
                                                    @error('judul')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <label for="basicInput">Kategori</label>
                                                    <input type="text" value="{{ old('penulis') }}" name="penulis"
                                                        class="form-control mb-2 @error('penulis') is-invalid @enderror"
                                                        id="basicInput" placeholder="  ">
                                                    @error('penulis')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="basicInput">Nama Buku</label>
                                                    <input type="text" value="{{ old('penulis') }}" name="penulis"
                                                        class="form-control mb-2 @error('penulis') is-invalid @enderror"
                                                        id="basicInput" placeholder="  ">
                                                    @error('penulis')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                    <div class="mb-3">
                                                        <label for="basicInput">Harga</label>
                                                        <input type="text" value="{{ old('penulis') }}" name="penulis"
                                                            class="form-control mb-2 @error('penulis') is-invalid @enderror"
                                                            id="basicInput" placeholder="  ">
                                                        @error('penulis')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                           <div class="col-md-6">
                                            <label for="basicInput">Stok</label>
                                            <input type="text" value="{{ old('penulis') }}" name="penulis"
                                                class="form-control mb-2 @error('penulis') is-invalid @enderror"
                                                id="basicInput" placeholder="  ">
                                            @error('penulis')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                           </div>
                                           <div class="col-md-6">
                                            <label for="basicInput">Penerbit</label>
                                                    <select name="kategori" id="" class="form-select">
                                                        <option hidden></option>
                                                        @foreach ($penerbit as $item)
                                                            <option value="{{ $item['id'] }}">{{ $item['nama'] }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                      @error('kategori')
                                                            <p class="text-danger">{{ $message }}</p>
                                                        @enderror
                                           </div>
                                        </div>
                                           
                                        </div>
                                        <button class="btn btn-primary mt-3" type="submit">
                                            <i class="fa fa-save"></i> Simpan
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
