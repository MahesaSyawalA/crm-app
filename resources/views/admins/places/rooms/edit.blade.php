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

                    <form method="POST" action="{{ route('rooms.update', 'id') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id_room" value="{{ $room->id_room }}" id="id_room">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_building" class="form-label">Pilih Gedung</label>
                                    <select class="form-select select2 @error('id_building') is-invalid @enderror"
                                        id="id_building" name="id_building">
                                        <option value="" disabled selected>Pilih Gedung</option>
                                        @foreach ($buildings as $building)
                                            @if ($building->floors_count != 0)
                                                <option value="{{ $building->id_building }}"
                                                    {{ old('id_building', $room->id_building) == $building->id_building ? 'selected' : null }}>
                                                    {{ $building->name_building }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('id_building')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id_floor" class="form-label">Pilih Lantai</label>
                                    <select class="form-select select2 @error('id_floor') is-invalid @enderror"
                                        id="id_floor" name="id_floor">
                                        <option value="" disabled>Pilih Ulang Gedung Untuk Munculkan Lantai
                                            Lainnya</option>
                                        <option value="{{ $room->id_floor }}">
                                            {{ $room->floor->name_floor }}</option>
                                    </select>

                                    @error('id_floor')
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
                                    <label for="code_room" class="form-label">Kode Ruang</label>
                                    <input type="text" class="form-control @error('code_room') is-invalid @enderror"
                                        name="code_room" id="code_room" placeholder="Masukkan Kode"
                                        value="{{ old('code_room', $room->code_room) }}">

                                    @error('code_room')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name_room" class="form-label">Nama Ruang</label>
                                    <input type="text" class="form-control @error('name_room') is-invalid @enderror"
                                        id="name_room" name="name_room" placeholder="Masukkan Nama"
                                        value="{{ old('name_room', $room->name_room) }}">

                                    @error('name_room')
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
                                    <label for="status_room" class="form-label">Pilih Status</label>
                                    <select class="form-select select2 @error('status_room') is-invalid @enderror"
                                        name="status_room" id="status_room">
                                        <option value="active">Aktif</option>
                                        <option value="inactive">Tidak Aktif</option>
                                    </select>

                                    @error('status_room')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="wide_room" class="form-label">Luas</label>
                                    <div class="input-group">
                                        <input type="text"
                                            class="form-control @error('wide_room') is-invalid @enderror"
                                            name="wide_room" id="wide_room" placeholder="Masukkan Luas"
                                            value="{{ old('wide_room', $room->wide_room) }}">
                                        <label class="input-group-text">m2</label>

                                        @error('wide_room')
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
                            <label for="image_room" class="form-label">Foto Ruang</label>
                            @if ($room->image_room)
                                <img src="{{ asset('storage/images/rooms/' . $room->image_room) }}"
                                    class="img-thumbnail img-fluid d-block mb-3 p-0" id="imgRoomAdd"
                                    style="max-height: 192px; overflow:hidden;">
                            @else
                                <img src="" class="img-thumbnail img-fluid mb-3 p-0" id="imgRoomAdd"
                                    style="max-height: 192px; overflow:hidden;">
                            @endif
                            <input type="file" multiple accept=".jpg,.jpeg,.png,.gif,.svg"
                                class="form-control @error('image_room') is-invalid @enderror" name="image_room"
                                onchange="previewImgRoomAdd()">

                            @error('image_room')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="desc_room" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('desc_Room') is-invalid @enderror" id="desc_room" name="desc_room"
                                placeholder="Masukkan Deskripsi" rows="5">{{ old('desc_room', $room->desc_room) }}</textarea>

                            @error('desc_room')
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
            $('#id_building').on('change', function() {
                var id_building = $(this).val();
                console.log(id_building);
                if (id_building) {
                    $.ajax({
                        type: "get",
                        url: "/ajax/buildings/" + id_building + "/floors",
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            if (data) {
                                $('#id_floor').empty();
                                $('#id_floor').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $.each(data, function(key, floor) {
                                    $('select[name="id_floor"]').append(
                                        '<option value="' + floor.id_floor +
                                        '">' + floor.name_floor + '</option>'
                                    )
                                });
                            }
                            // $('#id_floor').empty();
                        }
                    });
                }
                // $('#id_floor').empty();
            })

            $('#id_floor').on('change', function() {
                var id_floor = $(this).val();

                // console.log(id_floor);
                if (id_floor) {
                    $.ajax({
                        type: "get",
                        url: "/ajax/floors/" + id_floor + "/getprices",
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(data) {
                            // console.log(data);
                            if (data) {

                                $("#service_charge").text(data.service_charge);
                                $('#own_electricity').text(data.own_electricity);

                                $('#wide_room').on('input', function() {
                                    var wideRoom = $(this).val();
                                    var overtimeUp4Total = data.overtime_up_4 *
                                        parseInt(wideRoom);
                                    var overtimeDown4Total = data
                                        .overtime_down_4 * parseInt(wideRoom);
                                    var serviceChargeTotal = data.service_charge *
                                        parseInt(
                                            wideRoom);
                                    var ownElectricityTotal = data
                                        .own_electricity * parseInt(
                                            wideRoom);

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
