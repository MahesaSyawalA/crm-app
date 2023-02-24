<x-app-layout>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Lantai</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Kelola Tempat</a></li>
                        <li class="breadcrumb-item"><a href="">Lantai</a></li>
                        <li class="breadcrumb-item active">Tambah Lantai</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- flash message -->
    <x-alert></x-alert>
    <!-- end flash message -->

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Form Tambah Lantai</h4>

                    <form action="{{ route('floors.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="building_id" class="form-label">Pilih Gedung</label>
                            <select class="form-select select2 @error('building_id') is-invalid @enderror"
                                name="building_id" id="building_id">
                                <option value="" disabled selected>Pilih Gedung</option>
                                @foreach ($buildings as $building)
                                    <option value="{{ $building->id }}"
                                        {{ old('building_id') == $building->id ? 'selected' : null }}>
                                        {{ $building->name }}</option>
                                @endforeach
                            </select>

                            @error('building_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="code" class="form-label">Kode Lantai</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror"
                                        name="code" placeholder="Masukkan kode" id="code"
                                        value="{{ old('code') }}">

                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Lantai</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" placeholder="Masukkan nama" id="name"
                                        value="{{ old('name') }}">

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="monthly_price" class="form-label">Harga per m2/Bulan</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="number" min="0"
                                            class="form-control @error('monthly_price') is-invalid @enderror"
                                            name="monthly_price" placeholder="Masukkan harga" id="monthly_price"
                                            value="{{ old('monthly_price') }}">
                                        <label class="input-group-text">m2/Bulan</label>

                                        @error('monthly_price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="daily_price" class="form-label">Harga per m2/Hari</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="number" min="0"
                                            class="form-control @error('daily_price') is-invalid @enderror"
                                            style="background-color: #eff2f7;" name="daily_price" placeholder="0"
                                            id="daily_price" value="{{ old('daily_price') }}" readonly>
                                        <label class="input-group-text">m2/Hari</label>

                                        @error('daily_price')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="service_charge" class="form-label">Service Charge</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="number" min="0"
                                            class="form-control @error('service_charge') is-invalid @enderror"
                                            name="service_charge" placeholder="Masukkan harga" id="service_charge"
                                            value="{{ old('service_charge') }}">

                                        @error('service_charge')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="own_electricity" class="form-label">Service Charge
                                        Listrik
                                        Sendiri</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="number" min="0"
                                            class="form-control @error('own_electricity') is-invalid @enderror"
                                            name="own_electricity" placeholder="Masukkan harga" id="own_electricity"
                                            value="{{ old('own_electricity') }}">

                                        @error('own_electricity')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-5">
                                    <label for="overtime_up_4" class="form-label">Tarif Dasar Overtime (Diatas 4
                                        Jam)</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="number" min="0"
                                            class="form-control @error('overtime_up_4') is-invalid @enderror"
                                            name="overtime_up_4" placeholder="Masukkan harga" id="overtime_up_4"
                                            value="{{ old('overtime_up_4') }}">

                                        @error('overtime_up_4')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-5">
                                    <label for="overtime_down_4" class="form-label">Tarif Dasar Overtime (Dibawah
                                        4
                                        Jam)</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="number" min="0"
                                            class="form-control @error('overtime_down_4') is-invalid @enderror"
                                            id="overtime_down_4" name="overtime_down_4" placeholder="Masukkan harga"
                                            id="overtime_down_4" value="{{ old('overtime_down_4') }}">

                                        @error('overtime_down_4')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('floors.index') }}" type="button"
                                class="btn btn-danger w-md me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    <script>
        $(document).ready(function() {
            $('#monthly_price').on('input', function() {
                var monthlyPrice = $(this).val();
                var dailyPrice = parseInt(monthlyPrice) / 30;
                $('#daily_price').val(dailyPrice);
            });
        });
    </script>
</x-app-layout>
