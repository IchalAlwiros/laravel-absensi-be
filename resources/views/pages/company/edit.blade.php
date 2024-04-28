@extends('layouts.app')

@section('title', 'Edit Profil Perusahaan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/summernote/dist/summernote-bs4.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-social/assets/css/bootstrap.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Profil Perusahaan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('companies.show', $company->id) }}">Profile Company</a></div>
                    <div class="breadcrumb-item">Edit Profil Perusahaan</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Edit Profil Perusahaan</h2>
                <p class="section-lead">
                    Perbarui informasi tentang perusahaan Anda di halaman ini.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-12">
                        <div class="card">
                            <form method="POST" action="{{ route('companies.update', $company->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Nama Perusahaan</label>
                                            <input type="text"
                                                class="form-control @error('name')
                                                is-invalid
                                                @enderror"
                                                name="name" value="{{ $company->name }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Alamat Perusahaan</label>

                                            <input type="text"
                                                class="form-control @error('address')
                                                is-invalid
                                                @enderror"
                                                name="address" value="{{ $company->address }}">
                                                @error('address')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Kontak Perusahaan</label>

                                            <input type="email"
                                                class="form-control @error('email')
                                                is-invalid
                                                @enderror"
                                                    name="email" value="{{ $company->email }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            <br>
                                            <input type="text"
                                                class="form-control @error('phone')
                                                is-invalid
                                                @enderror"
                                                    name="phone" value="{{ $company->phone }}">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>

                                        <div class="form-group col-md-6 col-12">
                                            <label>Radius KM</label>
                                            <input type="number" step="0.01" name="radius_km" class="form-control"
                                                value="{{ $company->radius_km }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Latitude</label>
                                            <input type="text" name="latitude" class="form-control"
                                                value="{{ $company->latitude }}">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Longitude</label>
                                            <input type="text" name="longitude" class="form-control"
                                                value="{{ $company->longitude }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Waktu Masuk</label>
                                            <input type="time" name="time_in" class="form-control"
                                                value="{{ $company->time_in }}">
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Waktu Pulang</label>
                                            <input type="time" name="time_out" class="form-control"
                                                value="{{ $company->time_out }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/summernote/dist/summernote-bs4.js') }}"></script>

    <!-- Page Specific JS File -->
@endpush
