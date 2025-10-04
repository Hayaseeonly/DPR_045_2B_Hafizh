@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Tambah Data Anggota Baru</h1>

    {{-- Menampilkan error validasi jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Tambah Anggota</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.anggota.store') }}" method="POST">
                @csrf <div class="row">
                    <div class="col-md-6">
                          <!-- <div class="mb-3">
                            <label for="gelar_depan" class="form-label">ID Anggota</label>
                            <input type="text" class="form-control" id="id_anggota" name="Id Anggota" value="{{ old('id_anggota') }}">
                        </div>         -->
                        <div class="mb-3">
                            <label for="gelar_depan" class="form-label">Gelar Depan</label>
                            <input type="text" class="form-control" id="gelar_depan" name="gelar_depan" value="{{ old('gelar_depan') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
                            <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" value="{{ old('gelar_belakang') }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_depan" class="form-label">Nama Depan (Wajib)</label>
                            <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ old('nama_depan') }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_belakang" class="form-label">Nama Belakang (Wajib)</label>
                            <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang') }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan (Wajib)</label>
                            <select class="form-select" id="jabatan" name="jabatan" required>
                                <option value="" disabled selected>-- Pilih Jabatan --</option>
                                <option value="Ketua" {{ old('jabatan') == 'Ketua' ? 'selected' : '' }}>Ketua</option>
                                <option value="Wakil Ketua" {{ old('jabatan') == 'Wakil Ketua' ? 'selected' : '' }}>Wakil Ketua</option>
                                <option value="Anggota" {{ old('jabatan') == 'Anggota' ? 'selected' : '' }}>Anggota</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="status_pernikahan" class="form-label">Status Pernikahan (Wajib)</label>
                            <select class="form-select" id="status_pernikahan" name="status_pernikahan" required>
                                <option value="" disabled selected>-- Pilih Status --</option>
                                <option value="Kawin" {{ old('status_pernikahan') == 'Kawin' ? 'selected' : '' }}>Kawin</option>
                                <option value="Belum Kawin" {{ old('status_pernikahan') == 'Belum Kawin' ? 'selected' : '' }}>Belum Kawin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="mb-3">
                            <label for="jumlah_anak" class="form-label">Jumlah Anak (Wajib)</label>
                            <input type="number" class="form-control" id="jumlah_anak" name="jumlah_anak" value="{{ old('jumlah_anak', 0) }}" min="0" required>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary me-2">Kembali</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection