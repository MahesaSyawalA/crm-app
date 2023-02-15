<x-app-layout>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Lantai</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Kelola Tempat</a></li>
                        <li class="breadcrumb-item"><a href="">Lantai</a></li>
                        <li class="breadcrumb-item active">Edit Lantai</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- flash message -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Ada beberapa masalah dengan masukkan Anda.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- end flash message -->

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Form Edit Lantai</h4>

                    <form action="{{ route('floors.update', 'id') }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id_floor" value="{{ $floor->id_floor }}" id="id_floor">

                        <div class="mb-3">
                            <label for="id_building" class="form-label">Pilih Gedung</label>
                            <select class="form-select select2 @error('id_building') is-invalid @enderror"
                                name="id_building" id="id_building">
                                <option value="" disabled selected>Pilih Gedung</option>
                                @foreach ($buildings as $building)
                                    <option value="{{ $building->id_building }}"
                                        {{ old('id_building', $floor->id_building) == $building->id_building ? 'selected' : null }}>
                                        {{ $building->name_building }}</option>
                                @endforeach
                            </select>

                            @error('id_building')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="code_floor" class="form-label">Kode Lantai</label>
                                    <input type="text" class="form-control @error('code_floor') is-invalid @enderror"
                                        name="code_floor" placeholder="Masukkan kode" id="code_floor"
                                        value="{{ old('code_floor', $floor->code_floor) }}">

                                    @error('code_floor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name_floor" class="form-label">Nama Lantai</label>
                                    <input type="text" class="form-control @error('name_floor') is-invalid @enderror"
                                        name="name_floor" placeholder="Masukkan nama" id="name_floor"
                                        value="{{ old('name_floor', $floor->name_floor) }}">

                                    @error('name_floor')
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
                                            name="monthly_price" placeholder="Masukkan harga"
                                            value="{{ old('monthly_price', $floor->monthly_price) }}"
                                            id="monthly_price">
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
                                            style="background-color: #eff2f7;" name="daily_price" id="daily_price"
                                            placeholder="0" value="{{ old('daily_price', $floor->daily_price) }}"
                                            readonly>
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
                                    <label for="service_charge_floor" class="form-label">Service Charge</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="number" min="0"
                                            class="form-control @error('service_charge_floor') is-invalid @enderror"
                                            name="service_charge_floor" placeholder="Masukkan harga"
                                            id="service_charge_floor"
                                            value="{{ old('service_charge_floor', $floor->service_charge_floor) }}">

                                        @error('service_charge_floor')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-4">
                                    <label for="service_charge_own_electricity" class="form-label">Service Charge
                                        Listrik
                                        Sendiri</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="number" min="0"
                                            class="form-control @error('service_charge_own_electricity') is-invalid @enderror"
                                            name="service_charge_own_electricity" placeholder="Masukkan harga"
                                            id="service_charge_own_electricity"
                                            value="{{ old('service_charge_own_electricity', $floor->service_charge_own_electricity) }}">

                                        @error('service_charge_own_electricity')
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
                                            value="{{ old('overtime_up_4', $floor->overtime_up_4) }}">

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
                                            value="{{ old('overtime_down_4', $floor->overtime_down_4) }}">

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
            $('#monthly_price').on('change', function() {
                var monthlyPrice = $(this).val();
                var dailyPrice = parseInt(monthlyPrice) / 30;
                $('#daily_price').val(dailyPrice);
            });
        });
    </script>
</x-app-layout>
