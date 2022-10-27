@extends('layouts.main')
@section('content')
<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-primary">Update Status Kendaraan</h6>
	</div>
	<div class="card-body">
		<form action="{{ route('master_kendaraan.updatestatus',$kendaraan->id) }}" method="POST" enctype="multipart/form-data" class="col-lg-6">
			@csrf
			@method('put')
			<label for="mk_perlengkapan" class="form-label">Status</label>
			<select name="mk_status" class="form-control @error('mk_status') is-invalid @enderror" required>
				<option value="{{ $kendaraan->mk_status }}">{{ $kendaraan->mk_status }}</option>
				<option value="tersedia">Tersedia</option>
				<option value="sedang dipakai">Sedang DiPakai</option>
				<option value="akan dipakai">Akan DiPakai</option>
			</select>
			@error('mk_status')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
			<label for="mk_Bahan_bakar" class="form-label">Bahan Bakar Tersedia</label>
			<input type="text" class="form-control @error('bahanbakar') is-invalid @enderror" name="mk_Bahan_bakar" required  value="{{ $kendaraan->mk_Bahan_bakar }}">
			@error('bahanbakar')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
			<label for="mk_ban" class="form-label">Kondisi Ban</label>
			<input type="text" class="form-control @error('ban') is-invalid @enderror" name="mk_ban" required  value="{{ $kendaraan->mk_ban }}">
			@error('ban')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
			<label for="mk_kebersihan" class="form-label">Kebersihan</label>
			<input type="text" class="form-control @error('kebersihan') is-invalid @enderror" name="mk_kebersihan" required  value="{{ $kendaraan->mk_kebersihan }}">
			@error('kebersihan')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
			<label for="mk_kondisi_lain" class="form-label">Kondisi Lain</label>
			<input type="text" class="form-control @error('kondisi') is-invalid @enderror" name="mk_kondisi_lain" required  value="{{ $kendaraan->mk_kondisi_lain }}">
			@error('kondisi')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
			<label for="mk_perlengkapan" class="form-label">Perlegkapan</label>
			<select name="mk_perlengkapan" class="form-control @error('mk_perlengkapan') is-invalid @enderror" required>
				<option value="{{ $kendaraan->mk_perlengkapan }}">{{ $kendaraan->mk_perlengkapan }}</option>
				<option value="STNK-BPKB">STNK-BPKB</option>
				<option value="STNK">STNK</option>
				<option value="BPKB">BPKB</option>
				<option value="TIDAK-ADA">TIDAK-ADA</option>
			</select>
			@error('mk_perlengkapan')
			<div class="invalid-feedback">{{ $message }}</div>
			@enderror
			<button type="submit" class="btn btn-primary my-3">Edit</button>
			<button class="btn btn-primary my-3">
				<a href="{{ route('master_kendaraan.index') }}" class="text-white text-decoration-none">Kembali</a>
			</button>
		</form>
	</div>
</div>
@endsection

