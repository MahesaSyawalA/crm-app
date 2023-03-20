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
    <x-alert></x-alert>
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
                                        <td class="text-body fw-bold">{{ $building->code }}</td>
                                        <td>{{ $building->name }}</td>
                                        <td>{{ $building->address }}</td>
                                        <td>
                                            <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit">
                                                    {{-- <button type="button" value="{{ $building->id }}"
                                                        class="btn editgedungbtn btn-sm btn-info" data-bs-toggle="modal"
                                                        data-bs-target="#editGedungModal">
                                                        <i class="fa fa-edit"></i>
                                                    </button> --}}
                                                    <a href="{{ route('buildings.edit', $building->id) }}"
                                                        type="button" class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                @if ($building->floors_count == 0)
                                                    <form action="{{ route('buildings.destroy', $building->id) }}"
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
    <div class="modal fade" id="addGedungModal" tabindex="-1" aria-labelledby="addGedungModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addGedungModalLabel">Tambah Gedung</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('buildings.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="code" class="form-label">Kode Gedung</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror"
                                name="code" placeholder="Masukkan Kode" value="{{ old('code') }}" autofocus>

                            @error('code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Gedung</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" placeholder="Masukkan Nama" value="{{ old('name') }}">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat Gedung</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Masukkan Alamat"
                                rows="5">{{ old('address') }}</textarea>

                            @error('address')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Foto Gedung</label>
                            <img src="" class="img-thumbnail img-fluid mb-3 p-0" id="imgBuildingAdd"
                                style="max-height: 192px">
                            <input type="file" multiple accept=".jpg,.jpeg,.png,.gif,.svg"
                                class="form-control @error('image') is-invalid @enderror" name="image"
                                onchange="previewImgBuildingAdd()">

                            @error('image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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

    @push('scripts')
        <script>
            //Script Preview Image Building
            function previewImgBuildingAdd() {
                imgBuildingAdd.src = URL.createObjectURL(event.target.files[0]);
                imgBuildingAdd.style.display = 'block';
            }
        </script>
    @endpush
</x-app-layout>
