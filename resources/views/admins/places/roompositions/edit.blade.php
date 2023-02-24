<x-app-layout>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Posisi Ruang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Kelola Tempat</a></li>
                        <li class="breadcrumb-item"><a href="">Posisi Ruang</a></li>
                        <li class="breadcrumb-item active">Edit Posisi Ruang</li>
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
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Form Edit Posisi Ruang</h4>

                    <form action="{{ route('roompositions.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Pilih Gedung</label>
                            <select class="form-select select2 @error('id_building') is-invalid @enderror"
                                name="id_building" id="id_building">
                                <option value="" disabled selected>Pilih Gedung</option>
                                @foreach ($buildings as $building)
                                    @if ($building->floors_count != 0)
                                        <option value="{{ $building->id_building }}"
                                            {{ old('id_building', $room_position->id_building) == $building->id_building ? 'selected' : null }}>
                                            {{ $building->name_building }} - {{ $building->code_building }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Pilih Lantai</label>
                                    <select class="form-select select2" name="id_floor" id="id_floor">
                                        <option value="" disabled>Pilih Ulang Gedung Untuk Munculkan Lantai
                                            Lainnya</option>
                                        <option value="{{ $room_position->id_floor }}">
                                            {{ $room_position->floor->name_floor }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Pilih Ruang</label>
                                    <select class="form-select select2" name="id_room" id="id_room">
                                        <option value="" disabled>Pilih Ulang Lantai Untuk Munculkan Ruang
                                            Lainnya</option>
                                        <option value="{{ $room_position->id_room }}">
                                            {{ $room_position->parentRoom->name_room }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Depan</label>
                                    <select class="form-select select2" name="front" id="front">
                                        <option value="" disabled>Pilih Ulang Lantai Untuk Munculkan Ruang
                                            Lainnya</option>
                                        <option value="{{ $room_position->id_floor }}">
                                            {{ $room_position->frontRoom->name_room }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Belakang</label>
                                    <select class="form-select select2" name="back" id="back">
                                        <option value="" disabled>Pilih Ulang Lantai Untuk Munculkan Ruang
                                            Lainnya</option>
                                        <option value="{{ $room_position->id_floor }}">
                                            {{ $room_position->backRoom->name_room }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="formrow-firstname-input" class="form-label">Kiri</label>
                                    <select class="form-select select2" name="left" id="left">
                                        <option value="" disabled>Pilih Ulang Lantai Untuk Munculkan Ruang
                                            Lainnya</option>
                                        <option value="{{ $room_position->id_floor }}">
                                            {{ $room_position->leftRoom->name_room }}</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="formrow-firstname-input" class="form-label">Kanan</label>
                                    <select class="form-select select2" name="right" id="right">
                                        <option value="" disabled>Pilih Ulang Lantai Untuk Munculkan Ruang
                                            Lainnya</option>
                                        <option value="{{ $room_position->id_floor }}">
                                            {{ $room_position->rightRoom->name_room }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('roompositions.index') }}" type="button"
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
                // console.log(id_building);
                if (id_building) {
                    $.ajax({
                        type: "get",
                        url: "/ajax/buildings/" + id_building + "/floors",
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(data) {
                            // console.log(data);
                            if (data) {
                                $('#id_floor').empty();
                                $('#id_floor').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $.each(data, function(key, floor) {
                                    $('select[name="id_floor"]').append(
                                        '<option value="' + floor.id_floor +
                                        '">' + floor.name_floor + ' - Rp ' +
                                        floor
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

            $('#id_floor').on('change', function() {
                var id_floor = $(this).val();
                console.log(id_floor);
                if (id_floor) {
                    $.ajax({
                        type: "get",
                        url: "/ajax/floors/" + id_floor + "/rooms",
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            if (data) {
                                $('#id_room').empty();
                                $('#front').empty();
                                $('#back').empty();
                                $('#left').empty();
                                $('#right').empty();
                                $('#id_room').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $('#front').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $('#back').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $('#left').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $('#right').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $.each(data, function(key, room) {
                                    $('select[name="id_room"]').append(
                                        '<option value="' + room.id_room +
                                        '">' + room.name_room + '</option>'
                                    );
                                    $('select[name="front"]').append(
                                        '<option value="' + room.id_room +
                                        '">' + room.name_room + '</option>'
                                    );
                                    $('select[name="back"]').append(
                                        '<option value="' + room.id_room +
                                        '">' + room.name_room + '</option>'
                                    );
                                    $('select[name="left"]').append(
                                        '<option value="' + room.id_room +
                                        '">' + room.name_room + '</option>'
                                    );
                                    $('select[name="right"]').append(
                                        '<option value="' + room.id_room +
                                        '">' + room.name_room + '</option>'
                                    );
                                });
                            }
                            // $('#id_floor').empty();
                        }
                    });
                }
                // $('#id_floor').empty();
            })
        });
    </script>
</x-app-layout>
