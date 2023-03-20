<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data User Teknik</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Kelola User</a></li>
                        <li class="breadcrumb-item active">Teknik</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <form action="{{ route('technicians.index') }}">
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
                                    data-bs-toggle="modal" data-bs-target="#addTechnicianModal"><i
                                        class="mdi mdi-plus me-1"></i> Tambah User</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table-nowrap table-bordered table align-middle">
                            <thead>
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Nama</th>
                                    <th class="align-middle">Email</th>
                                    <th class="align-middle">Nomor Handphone</th>
                                    <th class="align-middle">Status</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($technicians as $key => $technician)
                                    <tr>
                                        <th scope="row">{{ $technicians->firstItem() + $key }}</th>
                                        <td>{{ $technician->name }}</td>
                                        <td>{{ $technician->email }}</td>
                                        <td>{{ $technician->phone_number }}</td>
                                        <td>
                                            @if ($technician->status->value === 'active')
                                                <span class="badge font-size-12 badge-soft-success">Aktif</span>
                                            @else
                                                <span class="badge font-size-12 badge-soft-danger">Tidak Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit">
                                                    <a href="{{ route('technicians.edit', $technician->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                <form action="{{ route('technicians.destroy', $technician->id) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Delete">
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus role teknik dari user ini?')">
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
                    <ul class="pagination justify-content-end mb-2">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" aria-label="Previous">
                                <i class="mdi mdi-chevron-left"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <i class="mdi mdi-chevron-right"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- Modal Assign Role -->
    <div class="modal fade" id="addTechnicianModal" tabindex="-1" aria-labelledby="addTechnicianModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addTechnicianModalLabel">Assign Role Teknik</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('technicians.store') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="account" class="form-label">User</label>
                            <input type="hidden" id="id" name="id">
                            <select class="form-select" id="account" name="account">
                                <option value="" disabled selected>Pilih User</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ old('id') == $user->id ? 'selected' : null }}>
                                        {{ $user->name }} -
                                        @if ($user->hasRole('admin'))
                                            Admin
                                        @elseif ($user->hasRole('marketing'))
                                            Marketing
                                        @elseif ($user->hasRole('hod'))
                                            Kepala Divisi
                                        @elseif ($user->hasRole('technician'))
                                            Teknik
                                        @elseif ($user->hasRole('cater'))
                                            Cater
                                        @elseif ($user->hasRole('finance'))
                                            Keuangan
                                        @elseif ($user->hasRole('tenant'))
                                            Tenant
                                        @else
                                            Tidak Punya Role
                                        @endif

                                        ({{ $user->email }})
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" name="name" id="name" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email" disabled>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">Nomor Telepon</label>
                                    <input type="text" class="form-control" name="phone_number" id="phone_number"
                                        disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status_user" class="form-label">Pilih Status</label>
                                    <input type="text" class="form-control" name="status_user" id="status_user"
                                        disabled>
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
    <!-- End Modal -->

    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#account').on('change', function() {
                    var user_id = $(this).val();

                    console.log(user_id);
                    if (user_id) {
                        $.ajax({
                            type: "get",
                            url: "/ajax/users/" + user_id + "/getdetails",
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: "json",
                            success: function(data) {
                                console.log(data);
                                if (data) {
                                    var name = data.name;
                                    var email = data.email;
                                    var phoneNumber = data.phone_number;
                                    var statusUser = data.status;

                                    $('#id').val(user_id);
                                    $('#name').val(name);
                                    $('#email').val(email);
                                    if (phoneNumber > 0) {
                                        $('#phone_number').val(phoneNumber);
                                    } else {
                                        $('#phone_number').val('Tidak memiliki nomer');
                                    }
                                    if (statusUser = 'active') {
                                        $('#status_user').val('Aktif');
                                    } else {
                                        $('#status_user').val('Tidak Aktif');
                                    }
                                }
                            }
                        });
                    }
                })
            });
        </script>
    @endpush
</x-app-layout>
