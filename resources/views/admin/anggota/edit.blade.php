@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Ubah Data Anggota</h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Formulir Ubah Data: {{ $anggotum->nama_depan }}</h6>
        </div>
        <div class="card-body">
            {{-- Arahkan action ke route update dengan method PUT --}}
            <form action="{{ route('admin.anggota.update', $anggotum->id_anggota) }}" method="POST">
                @csrf
                @method('PUT') {{-- Ini penting untuk memberitahu Laravel bahwa ini adalah proses UPDATE --}}

                <div class="row">
                    {{-- Setiap input memiliki 'value' yang diisi dari data lama --}}
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="gelar_depan" class="form-label">Gelar Depan</label>
                            <input type="text" class="form-control" id="gelar_depan" name="gelar_depan" value="{{ old('gelar_depan', $anggotum->gelar_depan) }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="gelar_belakang" class="form-label">Gelar Belakang</label>
                            <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" value="{{ old('gelar_belakang', $anggotum->gelar_belakang) }}">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_depan" class="form-label">Nama Depan (Wajib)</label>
                            <input type="text" class="form-control" id="nama_depan" name="nama_depan" value="{{ old('nama_depan', $anggotum->nama_depan) }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_belakang" class="form-label">Nama Belakang (Wajib)</label>
                            <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="{{ old('nama_belakang', $anggotum->nama_belakang) }}" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan (Wajib)</label>
                            <select class="form-select" id="jabatan" name="jabatan" required>
                                {{-- Opsi terpilih otomatis sesuai data lama --}}
                                <option value="Ketua" @if($anggotum->jabatan == 'Ketua') selected @endif>Ketua</option>
                                <option value="Wakil Ketua" @if($anggotum->jabatan == 'Wakil Ketua') selected @endif>Wakil Ketua</option>
                                <option value="Anggota" @if($anggotum->jabatan == 'Anggota') selected @endif>Anggota</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label for="status_pernikahan" class="form-label">Status Pernikahan (Wajib)</label>
                            <select class="form-select" id="status_pernikahan" name="status_pernikahan" required>
                                <option value="Kawin" @if($anggotum->status_pernikahan == 'Kawin') selected @endif>Kawin</option>
                                <option value="Belum Kawin" @if($anggotum->status_pernikahan == 'Belum Kawin') selected @endif>Belum Kawin</option>
                                <option value="Cerai Hidup" @if($anggotum->status_pernikahan == 'Cerai Hidup') selected @endif>Cerai Hidup</option>
                                <option value="Cerai Mati" @if($anggotum->status_pernikahan == 'Cerai Mati') selected @endif>Cerai Mati</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                         <div class="mb-3">
                            <label for="jumlah_anak" class="form-label">Jumlah Anak (Wajib)</label>
                            <input type="number" class="form-control" id="jumlah_anak" name="jumlah_anak" value="{{ old('jumlah_anak', $anggotum->jumlah_anak) }}" min="0" required>
                        </div>
                    </div>
                </div>

                <hr>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.anggota.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection