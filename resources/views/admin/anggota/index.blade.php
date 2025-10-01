@section('content')
<div class="container-fluid">

    <h1 class="h3 mb-2 text-gray-800">Manajemen Data Anggota</h1>
    <p class="mb-4">Halaman ini menampilkan semua data anggota DPR yang terdaftar.</p>

    <a href="{{ route('admin.anggota.create') }}" class="btn btn-primary btn-icon-split mb-3">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah Data Anggota</span>
    </a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Anggota DPR</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Status Pernikahan</th>
                            <th>Jumlah Anak</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($anggota as $item)
                        <tr>
                            {{-- $loop->iteration akan otomatis membuat nomor urut berdasarkan data yang dipaginasi --}}
                            <td>{{ $anggota->firstItem() + $loop->index }}</td>
                            <td>
                                {{ $item->gelar_depan }} {{ $item->nama_depan }} {{ $item->nama_belakang }} {{ $item->gelar_belakang }}
                            </td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->status_pernikahan }}</td>
                            <td>{{ $item->jumlah_anak }}</td>
                            <td>
                                <a href="{{ route('admin.anggota.edit', $item->id_anggota) }}" class="btn btn-warning btn-sm">Edit</a>
                                
                                <form action="{{ route('admin.anggota.destroy', $item->id_anggota) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Belum ada data anggota.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                {{-- Link Paginasi --}}
                <div class="d-flex justify-content-center">
                    {!! $anggota->links() !!}
                </div>

            </div>
        </div>
    </div>

</div>
@endsection