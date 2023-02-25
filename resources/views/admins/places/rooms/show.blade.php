<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Detail Ruang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Kelola Tempat</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('rooms.index') }}">Ruang</a></li>
                        <li class="breadcrumb-item active">Detail Ruang</li>
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
    <div class="row">
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-5">Detail</h4>
                    </div>
                    <div class="row">
                        <div class="col-5 border-end border-secondary border-3">
                            <h5>Gedung</h5>
                            <p class="mb-4">{{ $room->floor->building->name }}</p>
                            <h5>Lantai</h5>
                            <p class="mb-4">{{ $room->floor->name }}</p>
                            <h5>Kode Ruang</h5>
                            <p class="mb-4">{{ $room->code }}</p>
                            <h5>Luas</h5>
                            <p class="mb-4">{{ $room->wide }} m<sup>2</sup></p>
                            <h5>Deskripsi</h5>
                            <p class="mb-4">{{ $room->description }}</p>
                        </div>
                        <div class="col-7 ps-4">
                            <h5>Harga Sewa Bulanan</h5>
                            <p class="mb-4">Rp {{ number_format($room->floor->monthly_price, 0, ',') }} / m2/Bulan</p>
                            <h5>Harga Overtime (Dibawah 4 Jam)</h5>
                            <p class="mb-4">Rp {{ number_format($room->floor->overtime_down_4, 0, ',') }} / m2/Bulan
                            </p>
                            <h5>Total Harga Overtime (Dibawah 4 Jam)</h5>
                            <p class="mb-4">Rp {{ number_format($room->overtime_down_4_total, 0, ',') }} / m2/Bulan
                            </p>
                            <h5>Harga Overtime (Diatas 4 Jam)</h5>
                            <p class="mb-4">Rp {{ number_format($room->floor->overtime_up_4, 0, ',') }} / m2/Bulan</p>
                            <h5>Total Harga Overtime (Diatas 4 Jam)</h5>
                            <p class="mb-4">Rp {{ number_format($room->overtime_up_4_total, 0, ',') }} / m2/Bulan</p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('rooms.index') }}" type="button"
                                class="btn btn-info w-md me-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-4">Foto</h4>
                    </div>
                    @if ($room->image)
                        <img src="{{ asset('storage/images/rooms/' . $room->image) }}"
                            class="img-thumbnail img-fluid d-block mb-3 p-0" id="imgRoomShow"
                            style="max-height:640px; overflow:hidden;" alt="Foto Ruang">
                    @else
                        <img src="https://via.placeholder.com/640x360?text=Tidak+Ada+Foto+Ruang"
                            class="img-thumbnail img-fluid mb-3 p-0" id="imgRoomShow" alt="Foto Ruang">
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

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
                                    $('select[name="qfloor"]').append(
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
        });
    </script>
</x-app-layout>
