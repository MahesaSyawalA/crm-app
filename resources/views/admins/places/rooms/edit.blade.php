<x-app-layout>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Ruang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Kelola Tempat</a></li>
                        <li class="breadcrumb-item"><a href="">Ruang</a></li>
                        <li class="breadcrumb-item active">Edit Ruang</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- flash message -->
    <x-alert></x-alert>
    <!-- end flash message -->

    <!-- Content -->
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Form Tambah Ruang</h4>

                    <form method="POST" action="{{ route('rooms.update', $room->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="building" class="form-label">Pilih Gedung</label>
                                    <select class="form-select select2" id="building" name="building">
                                        <option value="" disabled selected>Pilih Gedung</option>
                                        @foreach ($buildings as $building)
                                            @if ($building->floors_count != 0)
                                                <option value="{{ $building->id }}"
                                                    {{ old('id_building', $room->floor->building_id) == $building->id ? 'selected' : null }}>
                                                    {{ $building->name }} - {{ $building->code }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="floor" class="form-label">Pilih Lantai</label>
                                    <select class="form-select select2 @error('floor_id') is-invalid @enderror"
                                        id="floor" name="floor_id">
                                        <option value="" disabled>Pilih Ulang Gedung Untuk Munculkan Lantai
                                            Lainnya</option>
                                        <option value="{{ $room->floor_id }}">
                                            {{ $room->floor->name }} - Rp {{ $room->floor->monthly_price }} / m2/bulan
                                        </option>
                                    </select>

                                    @error('floor_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="code" class="form-label">Kode Ruang</label>
                                    <input type="text" class="form-control @error('code') is-invalid @enderror"
                                        name="code" id="code" placeholder="Masukkan Kode"
                                        value="{{ old('code', $room->code) }}">

                                    @error('code')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Ruang</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" placeholder="Masukkan Nama"
                                        value="{{ old('name', $room->name) }}">

                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Pilih Status</label>
                                    <select class="form-select select2 nosearch @error('status') is-invalid @enderror"
                                        name="status" id="status_room">
                                        <option value="active">Aktif</option>
                                        <option value="inactive">Tidak Aktif</option>
                                    </select>

                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="wide" class="form-label">Luas</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control @error('wide') is-invalid @enderror"
                                            name="wide" id="wide" placeholder="Masukkan Luas"
                                            value="{{ old('wide', $room->wide) }}">
                                        <label class="input-group-text">m2</label>

                                        @error('wide')
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
                                <div class="mb-3">
                                    <label for="overtime_up_4_total" class="form-label">Total Tarif Overtime (Diatas 4
                                        Jam)</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text"
                                            class="form-control @error('overtime_up_4_total') is-invalid @enderror"
                                            id="overtime_up_4_total" style="background-color: #eff2f7;"
                                            name="overtime_up_4_total"
                                            value="{{ old('overtime_up_4_total', $room->overtime_up_4_total) }}"
                                            readonly>
                                        <label class="input-group-text">Jam/m2</label>

                                        @error('overtime_up_4_total')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="overtime_down_4_total" class="form-label">Total Tarif Overtime
                                        (Dibawah
                                        4
                                        Jam)</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text"
                                            class="form-control @error('overtime_down_4_total') is-invalid @enderror"
                                            id="overtime_down_4_total" style="background-color: #eff2f7;"
                                            name="overtime_down_4_total"
                                            value="{{ old('overtime_down_4_total', $room->overtime_down_4_total) }}"
                                            readonly>
                                        <label class="input-group-text">Jam/m2</label>

                                        @error('overtime_down_4_total')
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
                                <div class="mb-3">
                                    <label for="service_charge_total" class="form-label">Tarif Service Charge (Rp
                                        <span id="service_charge">{{ $room->floor->service_charge }}</span>)</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text"
                                            class="form-control @error('service_charge_total') is-invalid @enderror"
                                            id="service_charge_total" style="background-color: #eff2f7;"
                                            name="service_charge_total"
                                            value="{{ old('service_charge_total', $room->service_charge_total) }}"
                                            readonly>

                                        @error('service_charge_total')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="own_electricity_total" class="form-label">Tarif Service
                                        Charge Listrik
                                        Sendiri (Rp <span
                                            id="own_electricity">{{ $room->floor->own_electricity }}</span>)</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text"
                                            class="form-control @error('own_electricity_total') is-invalid @enderror"
                                            id="own_electricity_total" style="background-color: #eff2f7;"
                                            name="own_electricity_total"
                                            value="{{ old('own_electricity_total', $room->own_electricity_total) }}"
                                            readonly>

                                        @error('own_electricity_total')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Foto Ruang</label>
                            <input type="hidden" name="old_image" value="{{ $room->image }}">
                            @if ($room->image)
                                <img src="{{ asset('storage/images/rooms/' . $room->image) }}"
                                    class="img-thumbnail img-fluid d-block mb-3 p-0" id="imgRoomAdd"
                                    style="max-height: 192px; overflow:hidden;">
                            @else
                                <img src="https://via.placeholder.com/640x360?text=Tidak+Ada+Foto+Ruang"
                                    class="img-thumbnail img-fluid d-block mb-3 p-0" id="imgRoomAdd"
                                    style="max-height: 192px; overflow:hidden;">
                            @endif
                            <input type="file" multiple accept=".jpg,.jpeg,.png,.gif,.svg"
                                class="form-control @error('image') is-invalid @enderror" name="image"
                                onchange="previewImgRoomAdd()">

                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                placeholder="Masukkan Deskripsi" rows="5">{{ old('description', $room->description) }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('rooms.index') }}" type="button"
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
            $('#building').on('change', function() {
                var building_id = $(this).val();
                console.log(building_id);
                if (building_id) {
                    $.ajax({
                        type: "get",
                        url: "/ajax/buildings/" + building_id + "/floors",
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            if (data) {
                                $('#floor').empty();
                                $('#floor').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $.each(data, function(key, floor) {
                                    $('select[name="floor_id"]').append(
                                        '<option value="' + floor.id +
                                        '">' + floor.name + ' - Rp ' + floor
                                        .monthly_price + ' / m2/Bulan </option>'
                                    )
                                });
                            }
                            // $('#id_floor').empty();
                        }
                    });
                }
                // $('#id_floor').empty();
            })

            $('#floor').on('change', function() {
                var floor_id = $(this).val();

                // console.log(floor_id);
                if (floor_id) {
                    $.ajax({
                        type: "get",
                        url: "/ajax/floors/" + floor_id + "/getprices",
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(data) {
                            // console.log(data);
                            if (data) {

                                $("#service_charge").text(data.service_charge);
                                $('#own_electricity').text(data.own_electricity);

                                $('#wide').on('input', function() {
                                    var wide = $(this).val();
                                    var overtimeUp4Total = data.overtime_up_4 *
                                        parseInt(wide);
                                    var overtimeDown4Total = data
                                        .overtime_down_4 * parseInt(wide);
                                    var serviceChargeTotal = data.service_charge *
                                        parseInt(
                                            wide);
                                    var ownElectricityTotal = data
                                        .own_electricity * parseInt(
                                            wide);

                                    $('#overtime_up_4_total').val(overtimeUp4Total);
                                    $('#overtime_down_4_total').val(overtimeDown4Total);
                                    $('#service_charge_total').val(serviceChargeTotal);
                                    $('#own_electricity_total').val(
                                        ownElectricityTotal);
                                });
                            }
                        }
                    });
                }
            })
        });

        function previewImgRoomAdd() {
            imgRoomAdd.src = URL.createObjectURL(event.target.files[0]);
            imgRoomAdd.style.display = 'block';
        }
    </script>
</x-app-layout>
