<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Lantai</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Kelola Tempat</a></li>
                        <li class="breadcrumb-item active">Lantai</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- flash message -->
    <x-alert></x-alert>
    <!-- end flash message -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="me-2 d-inline-block mb-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" name="qglobal" id="qglobal"
                                            placeholder="Search...">
                                    </div>
                                </div>
                                <div class="me-2 mb-2">
                                    <select type="text" class="form-control select2" name="qbuilding" id="qbuilding"
                                        style="width: 192px;">
                                        <option value="" disabled selected>Pilih Gedung</option>
                                        @foreach ($buildings as $building)
                                            <option value="{{ $building->id }}"
                                                {{ old('building_id') == $building->id ? 'selected' : null }}>
                                                {{ $building->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <button class="btn btn-info" type="submit" id="refresh" name="refresh">
                                        <i class="fa fa-refresh"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-4">
                            <div class="text-sm-end">
                                <a href="{{ route('floors.create') }}"
                                    class="btn btn-success waves-effect waves-light mb-2"><i
                                        class="mdi mdi-plus me-1"></i>
                                    Tambah Lantai</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-floors">
                        <table class="table-bordered table align-middle" id="table_floors">
                            <thead>
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Nama Gedung</th>
                                    <th class="align-middle">Kode Lantai</th>
                                    <th class="align-middle">Nama Lantai</th>
                                    <th class="align-middle">Harga Sewa Bulanan</th>
                                    <th class="align-middle">Service Charge (Termasuk Listrik)</th>
                                    <th class="align-middle">Service Charge Listrik Sendiri</th>
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
            //datatables
            $(document).ready(function() {
                $("#table_floors").DataTable({
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
                        'url': "/admin/floors/table",
                        'data': function(d) {
                            d.qglobal = $('#qglobal').val();
                            d.qbuilding = $('#qbuilding').val();
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
                            data: "building.name",
                            name: "building.name"
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
                            data: "monthly_price",
                            name: "monthly_price"
                        },
                        {
                            data: "service_charge",
                            name: "service_charge"
                        },
                        {
                            data: "own_electricity",
                            name: "own_electricity"
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
                    reloadTable('#table_floors')
                });

                $('#qbuilding').change(function() {
                    reloadTable('#table_floors')
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
