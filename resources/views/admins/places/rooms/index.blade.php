<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Ruang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Kelola Tempat</a></li>
                        <li class="breadcrumb-item active">Ruang</li>
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
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-10">
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="me-2 d-inline-block mb-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="qglobal" id="qglobal"
                                            placeholder="Search...">
                                    </div>
                                </div>
                                <div class="me-2 mb-2">
                                    <select class="form-control select2" name="qbuilding" id="qbuilding"
                                        style="width: 192px;">
                                        <option value="" selected>Pilih Gedung</option>
                                        @foreach ($buildings as $building)
                                            @if ($building->floors_count != 0)
                                                <option value="{{ $building->id }}"
                                                    {{ old('id') == $building->id ? 'selected' : null }}>
                                                    {{ $building->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="me-2 mb-2">
                                    <select class="form-control select2" name="qfloor" id="qfloor"
                                        style="width: 192px;">
                                        <option value="" disabled>Pilih Gedung Terlebih Dahulu</option>
                                    </select>
                                </div>
                                <div class="me-2 mb-2">
                                    <select type="text" class="form-control select2 nosearch" name="qstatus"
                                        id="qstatus" style="width: 192px;">
                                        <option value="" selected>Pilih Status</option>
                                        <option value="active">Aktif</option>
                                        <option value="inactive">Tidak Aktif</option>
                                        <option value="rented">Disewa</option>
                                        <option value="booked">Dibooking</option>
                                        <option value="sealed">Disegel</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <button class="btn btn-info" type="submit" id="refresh" name="refresh">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="text-sm-end">
                                <a href="{{ route('rooms.create') }}" type="button"
                                    class="btn btn-success waves-effect waves-light mb-2"><i
                                        class="mdi mdi-plus me-1"></i> Tambah Ruang</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table_rooms">
                        <table class="table-nowrap table-bordered table align-middle" id="table_rooms">
                            <thead>
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Nama Gedung</th>
                                    <th class="align-middle">Nama Lantai</th>
                                    <th class="align-middle">Kode Ruang</th>
                                    <th class="align-middle">Nama Ruang</th>
                                    <th class="align-middle">Luas (m2)</th>
                                    <th class="align-middle">Status Ruang</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#qbuilding').on('change', function() {
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
                                    $('#qfloor').empty();
                                    $('#qfloor').append(
                                        '<option value="" selected disabled>Pilih Lantai</option>'
                                    );
                                    $.each(data, function(key, floor) {
                                        $('select[name="qfloor"]').append(
                                            '<option value="' + floor.id +
                                            '">' + floor.name + '</option>'
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

            $(document).ready(function() {
                $("#table_rooms").DataTable({
                    lengthChange: false,
                    searching: false,
                    ordering: false,
                    serverSide: true,
                    processing: true,
                    language: {
                        paginate: {
                            previous: "<",
                            next: ">",
                        }
                    },
                    oLanguage: {
                        sProcessing: "Loading<br><i class='bx bx-sm bx-sync bx-spin'></i>"
                    },
                    ajax: {
                        'url': "/admin/rooms/table",
                        'data': function(d) {
                            d.qglobal = $('#qglobal').val();
                            d.qbuilding = $('#qbuilding').val();
                            d.qfloor = $('#qfloor').val();
                            d.qstatus = $('#qstatus').val();
                        }
                    },
                    columns: [{
                            data: "DT_RowIndex",
                            name: "DT_RowIndex",
                            width: "10px",
                            orderable: false,
                            searchable: false,
                        },
                        {
                            data: "floor.building.name",
                            name: "floor.building.name"
                        },
                        {
                            data: "floor.name",
                            name: "floor.name"
                        },
                        {
                            data: "code",
                            name: "code"
                        },
                        {
                            data: "name",
                            name: "name"
                        },
                        {
                            data: "wide",
                            name: "wide"
                        },
                        {
                            data: "status",
                            name: "status"
                        },
                        {
                            data: "action",
                            name: "action",
                            orderable: false,
                            searchable: false,
                        },
                    ],
                    columnDefs: [],
                });

                $('#qglobal').on('input', function() {
                    reloadTable('#table_rooms')
                });

                $('#qbuilding').change(function() {
                    reloadTable('#table_rooms')
                });

                $('#qfloor').change(function() {
                    reloadTable('#table_rooms')
                });

                $('#qstatus').change(function() {
                    reloadTable('#table_rooms')
                });

                $('#refresh').click(function() {
                    window.location.reload(true)
                });
            });

            function reloadTable(id) {
                var table = $(id).DataTable();
                table.cleanData;
                table.ajax.reload();
            }
        </script>
    @endpush
</x-app-layout>
