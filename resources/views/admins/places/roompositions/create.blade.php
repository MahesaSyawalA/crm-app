<x-app-layout>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Posisi Ruang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Kelola Tempat</a></li>
                        <li class="breadcrumb-item"><a href="">Posisi Ruang</a></li>
                        <li class="breadcrumb-item active">Tambah Posisi Ruang</li>
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
                    <h4 class="card-title mb-5">Form Tambah Posisi Ruang</h4>

                    <form action="{{ route('roompositions.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Pilih Gedung</label>
                            <select class="form-select select2" name="building" id="building">
                                <option value="" disabled selected>Pilih Gedung</option>
                                @foreach ($buildings as $building)
                                    @if ($building->floors_count != 0)
                                        <option value="{{ $building->id }}"
                                            {{ old('id') == $building->id ? 'selected' : null }}>
                                            {{ $building->name }} - {{ $building->code }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Pilih Lantai</label>
                                    <select class="form-select select2" name="floor" id="floor">
                                        <option value="" disabled>Pilih Gedung Terlebih Dahulu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Pilih Ruang</label>
                                    <select class="form-select select2" name="room_id" id="parent_room">
                                        <option value="" disabled>Pilih Lantai Terlebih Dahulu</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Depan</label>
                                    <select class="form-select select2" name="front" id="front_room">
                                        <option value="" disabled>Pilih Lantai Terlebih Dahulu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Belakang</label>
                                    <select class="form-select select2" name="back" id="back_room">
                                        <option value="" disabled>Pilih Lantai Terlebih Dahulu</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="formrow-firstname-input" class="form-label">Kiri</label>
                                    <select class="form-select select2" name="left" id="left_room">
                                        <option value="" disabled>Pilih Lantai Terlebih Dahulu</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="formrow-firstname-input" class="form-label">Kanan</label>
                                    <select class="form-select select2" name="right" id="right_room">
                                        <option value="" disabled>Pilih Lantai Terlebih Dahulu</option>
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
            $('#building').on('change', function() {
                var building_id = $(this).val();
                // console.log(building_id);
                if (building_id) {
                    $.ajax({
                        type: "get",
                        url: "/ajax/buildings/" + building_id + "/floors",
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(data) {
                            // console.log(data);
                            if (data) {
                                $('#floor').empty();
                                $('#floor').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $.each(data, function(key, floor) {
                                    $('select[name="floor"]').append(
                                        '<option value="' + floor.id +
                                        '">' + floor.name + ' - Rp ' +
                                        floor
                                        .code + ' / m2/Bulan </option>'
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
                console.log(floor_id);
                if (floor_id) {
                    $.ajax({
                        type: "get",
                        url: "/ajax/floors/" + floor_id + "/rooms",
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            if (data) {
                                $('#parent_room').empty();
                                $('#front_room').empty();
                                $('#back_room').empty();
                                $('#left_room').empty();
                                $('#right_room').empty();
                                $('#parent_room').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $('#front_room').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $('#back_room').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $('#left_room').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $('#right_room').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $.each(data, function(key, room) {
                                    $('select[name="room_id"]').append(
                                        '<option value="' + room.id +
                                        '">' + room.name + ' - ' +
                                        room.code + '</option>'
                                    );
                                    $('select[name="front"]').append(
                                        '<option value="' + room.id +
                                        '">' + room.name + '</option>'
                                    );
                                    $('select[name="back"]').append(
                                        '<option value="' + room.id +
                                        '">' + room.name + '</option>'
                                    );
                                    $('select[name="left"]').append(
                                        '<option value="' + room.id +
                                        '">' + room.name + '</option>'
                                    );
                                    $('select[name="right"]').append(
                                        '<option value="' + room.id +
                                        '">' + room.name + '</option>'
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
