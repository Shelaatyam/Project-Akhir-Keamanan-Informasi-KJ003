@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tambah Gaji Karyawan</h1>
        <form action="{{ route('gaji.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="karyawan_id" class="form-label">Pilih Karyawan</label>
                <select class="form-select" id="karyawan_id" name="karyawan_id" required>
                    @foreach ($karyawans as $karyawan)
                        <option value="{{ $karyawan->id }}">{{ $karyawan->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="gaji_pokok" class="form-label">Gaji Pokok</label>
                <input type="number" class="form-control" id="gaji_pokok" name="gaji_pokok" required>
            </div>
            <div class="mb-3">
                <label for="tunjangan" class="form-label">Tunjangan</label>
                <input type="number" class="form-control" id="tunjangan" name="tunjangan" required>
            </div>
            <div class="mb-3">
                <label for="total_gaji" class="form-label">Total Gaji</label>
                <input type="number" class="form-control" id="total_gaji" name="total_gaji" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
