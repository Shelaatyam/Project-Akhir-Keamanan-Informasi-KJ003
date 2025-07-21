@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Karyawan Baru</h1>
        <form action="{{ route('karyawan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="mb-3">
                <label for="no_ktp" class="form-label">No KTP</label>
                <input type="text" class="form-control" id="no_ktp" name="no_ktp" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
