<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Additional Service</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Kelola Additional Service</li>
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
                            <form action="{{ route('services.index') }}">
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
                                    data-bs-toggle="modal" data-bs-target="#addServiceModal"><i
                                        class="mdi mdi-plus me-1"></i> Tambah Service</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table-nowrap table-bordered table align-middle">
                            <thead>
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Satuan</th>
                                    <th class="align-middle">Harga</th>
                                    <th class="align-middle">Deskripsi</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($services as $key => $service)
                                    <tr>
                                        <td scope="row">{{ $services->firstItem() + $key }}</td>
                                        <td>{{ $service->name }}</td>
                                        <td>{{ $service->unit }}</td>
                                        <td>Rp {{ number_format($service->price) }}</td>
                                        <td>{{ $service->description }}</td>
                                        <td>
                                            <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit">
                                                    <button type="button" class="btn btn-sm btn-info btneditservice"
                                                        value="{{ $service->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#editServiceModal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </li>
                                                <form action="{{ route('services.destroy', $service->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Delete">
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus data servis ini?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </li>
                                                </form>
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
                            {{ $services->firstItem() }}
                            to
                            {{ $services->lastItem() }}
                            of
                            {{ $services->total() }}
                            entries
                        </div>
                        <div class="col">
                            <div class="pagination justify-content-end">
                                {{ $services->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- Modal Tambah Additional Service -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addServiceModalLabel">Tambah Additional Service</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('services.store') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Service</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" id="name" placeholder="Masukkan Nama" value="{{ old('name') }}">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Pilih PIC</label>
                            <select class="form-select @error('user_id') is-invalid @enderror" name="user_id"
                                id="user_id">
                                <option value="" disabled selected>Pilih PIC</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('user_id') == $user->id ? 'selected' : null }}>
                                        {{ $user->name }}</option>
                                @endforeach
                            </select>

                            @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('unit') is-invalid @enderror"
                                    name="unit" id="unit" placeholder="Masukkan Satuan Service"
                                    value="{{ old('unit') }}">

                                @error('unit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="input-group-text">Rp</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" id="price" placeholder="Masukkan Harga"
                                    value="{{ old('price') }}">

                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                placeholder="Masukkan Deskripsi" value="{{ old('description') }}" rows="5"></textarea>

                            @error('description')
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

    <!-- Modal Edit Grade -->
    <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editServiceModalLabel">Edit Additional Service</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('services.update', 'id') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="text" name="id" id="idEdit">

                        <div class="mb-3">
                            <label for="nameEdit" class="form-label">Nama Service</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" id="nameEdit" placeholder="Masukkan Nama"
                                value="{{ old('name') }}">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="user_idEdit" class="form-label">Pilih PIC</label>
                            <select class="form-select @error('user_id') is-invalid @enderror" name="user_id"
                                id="user_idEdit">
                                <option value="" disabled selected>Pilih PIC</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('user_id') == $user->id ? 'selected' : null }}>
                                        {{ $user->name }}</option>
                                @endforeach
                            </select>

                            @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="priceEdit" class="form-label">Harga</label>
                            <div class="input-group">
                                <input type="text" class="form-control @error('unit') is-invalid @enderror"
                                    name="unit" id="unitEdit" placeholder="Masukkan Satuan Service"
                                    value="{{ old('unit') }}">

                                @error('unit')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <label class="input-group-text">Rp</label>
                                <input type="text" class="form-control @error('price') is-invalid @enderror"
                                    name="price" id="priceEdit" placeholder="Masukkan Harga"
                                    value="{{ old('price') }}">

                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="descriptionEdit"
                                placeholder="Masukkan Deskripsi" value="{{ old('description') }}" rows="5"></textarea>

                            @error('description')
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
    <!-- End Modal -->

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('.btneditservice').on('click', function() {
                    var service_id = $(this).val();

                    // console.log(service_id);
                    if (service_id) {
                        $.ajax({
                            type: "get",
                            url: "/ajax/services/" + service_id,
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: "json",
                            success: function(data) {
                                // console.log(data);
                                if (data) {
                                    $('#idEdit').val(service_id);
                                    $('#nameEdit').val(data.name);
                                    $('#user_idEdit').val(data.user_id);
                                    $('#unitEdit').val(data.unit);
                                    $('#priceEdit').val(data.price);
                                    $('#descriptionEdit').val(data.description);
                                }
                            }
                        });
                    }
                })
            });
        </script>
    @endpush
</x-app-layout>
