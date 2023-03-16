<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Posisi Ruang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Kelola Tempat</a></li>
                        <li class="breadcrumb-item active">Posisi Ruang</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <x-alert></x-alert>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <form action="{{ route('roompositions.index') }}">
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
                                <a href="{{ route('roompositions.create') }}" type="button"
                                    class="btn btn-success waves-effect waves-light mb-2"><i
                                        class="mdi mdi-plus me-1"></i> Tambah Posisi</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table-nowrap table-bordered table align-middle">
                            <thead>
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Gedung</th>
                                    <th class="align-middle">Lantai</th>
                                    <th class="align-middle">Ruang</th>
                                    <th class="align-middle">Depan</th>
                                    <th class="align-middle">Belakang</th>
                                    <th class="align-middle">Kiri</th>
                                    <th class="align-middle">Kanan</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($room_positions as $key => $room_position)
                                    <tr>
                                        <td scope="row">{{ $room_positions->firstItem() + $key }}</td>
                                        <td>{{ $room_position->parentRoom->floor->building->name }}</td>
                                        <td>{{ $room_position->parentRoom->floor->name }}</td>
                                        <td>{{ $room_position->parentRoom->name }}</td>
                                        <td>{{ $room_position->frontRoom->name }}</td>
                                        <td>{{ $room_position->backRoom->name }}</td>
                                        <td>{{ $room_position->leftRoom->name }}</td>
                                        <td>{{ $room_position->rightRoom->name }}</td>
                                        <td>
                                            <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit">
                                                    <a href="{{ route('roompositions.edit', $room_position->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                <form action="{{ route('roompositions.destroy', $room_position->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Delete">
                                                        <button type="submit" class="btn btn-sm btn-danger">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </li>
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
                            {{ $room_positions->firstItem() }}
                            to
                            {{ $room_positions->lastItem() }}
                            of
                            {{ $room_positions->total() }}
                            entries
                        </div>
                        <div class="col">
                            <div class="pagination justify-content-end">
                                {{ $room_positions->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    {{-- <!-- Modal Tambah Posisi Ruang -->
    <div class="modal fade" id="addPosisiRuangModal" tabindex="-1" aria-labelledby="addPosisiRuangModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="posisiRuangModalLabel">Tambah Posisi Ruang</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Pilih Gedung</label>
                            <select class="form-select">
                                <option value="" disabled selected>Pilih Gedung</option>
                                <option value="">Gedung A</option>
                                <option value="">Gedung B</option>
                                <option value="">Gedung C</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Pilih Lantai</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Lantai</option>
                                        <option value="">Lantai 1</option>
                                        <option value="">Lantai 2</option>
                                        <option value="">Lantai 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Pilih Ruang</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Ruang</option>
                                        <option value="">Ruang 1</option>
                                        <option value="">Ruang 2</option>
                                        <option value="">Ruang 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Depan</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Ruang</option>
                                        <option value="">Ruang 1</option>
                                        <option value="">Ruang 2</option>
                                        <option value="">Ruang 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Belakang</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Ruang</option>
                                        <option value="">Ruang 1</option>
                                        <option value="">Ruang 2</option>
                                        <option value="">Ruang 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Kiri</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Ruang</option>
                                        <option value="">Ruang 1</option>
                                        <option value="">Ruang 2</option>
                                        <option value="">Ruang 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Kanan</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Ruang</option>
                                        <option value="">Ruang 1</option>
                                        <option value="">Ruang 2</option>
                                        <option value="">Ruang 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal --> --}}
</x-app-layout>
