<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Gedung</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Kelola Tempat</a></li>
                        <li class="breadcrumb-item active">Gedung</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- flash message -->
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong>
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Ada beberapa masalah dengan masukkan Anda.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- end flash message -->

    <!-- card content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <form action="{{ route('buildings.index') }}">
                                <div class="d-flex align-items-center flex-wrap">
                                    <div class="me-2 d-inline-block mb-2">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="search" id="search"
                                                placeholder="Search...">
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <button class="btn btn-info" type="submit">
                                            <i class="fa fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-success waves-effect waves-light mb-2"
                                    data-bs-toggle="modal" data-bs-target="#addGedungModal">
                                    <i class="mdi mdi-plus me-1"></i> Tambah Gedung
                                </button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table-nowrap table-bordered table align-middle">
                            <thead>
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Kode Gedung</th>
                                    <th class="align-middle">Nama Gedung</th>
                                    <th class="align-middle">Alamat Gedung</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buildings as $key => $building)
                                    <tr>
                                        <th scope="row">{{ $buildings->firstItem() + $key }}</th>
                                        <td class="text-body fw-bold">{{ $building->code_building }}</td>
                                        <td>{{ $building->name_building }}</td>
                                        <td>{{ $building->address_building }}</td>
                                        <td>
                                            <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit">
                                                    {{-- <button type="button" value="{{ $building->id_building }}"
                                                        class="btn editgedungbtn btn-sm btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#editGedungModal">
                                                        <i class="fa fa-edit"></i>
                                                    </button> --}}
                                                    <a href="{{ route('buildings.edit', $building->id_building) }}"
                                                        type="button" class="btn btn-sm btn-info"><i
                                                            class="fa fa-edit"></i></a>
                                                </li>
                                                @if ($building->floors_count == 0)
                                                    <form
                                                        action="{{ route('buildings.destroy', $building->id_building) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Delete">
                                                            <button type="submit" class="btn btn-sm btn-danger"
                                                                onclick="return confirm('Yakin ingin menghapus data gedung ini?')">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </li>
                                                    </form>
                                                @endif
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col text-muted">
                            Showing
                            {{ $buildings->firstItem() }}
                            to
                            {{ $buildings->lastItem() }}
                            of
                            {{ $buildings->total() }}
                            entries
                        </div>
                        <div class="col">
                            <div class="pagination justify-content-end">
                                {{ $buildings->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end card -->

    <!-- Modal -->
    <!-- Tambah Gedung -->
    <x-modals.add-building></x-modals.add-building>

    <!-- Edit Gedung -->
    {{-- <x-modals.edit-building></x-modals.edit-building> --}}
    <!-- End Modal -->

    <script>
        //Ambil dan tampilkan data gedung untuk edit
        // $(document).ready(function() {
        //     $(document).on('click', '.editgedungbtn', function() {
        //         var id_building = $(this).val();
        //         // alert(id_building);

        //         $.ajax({
        //             type: "GET",
        //             url: "/admin/buildings/" + id_building + "/edit",
        //             success: function(response) {
        //                 console.log(response);
        //                 $('#id_building').val(response.building.id_building);
        //                 $('#code_building').val(response.building.code_building);
        //                 $('#name_building').val(response.building.name_building);
        //                 $('#address_building').val(response.building.address_building);
        //                 $('#picture_building').val(response.building.picture_building);
        //             }
        //         });
        //     });
        // });

        //Script Preview Image Building
        function previewImgBuildingAdd() {
            imgBuildingAdd.src = URL.createObjectURL(event.target.files[0]);
            imgBuildingAdd.style.display = 'block';
        }
    </script>
</x-app-layout>
