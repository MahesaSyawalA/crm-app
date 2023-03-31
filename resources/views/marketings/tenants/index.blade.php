<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Tenant</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Data Tenant</li>
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
                        <div class="col-sm-4">
                            <div class="me-2 d-inline-block mb-2">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="text-sm-end">
                                <a href="{{ route('tenants.create') }}" type="button"
                                    class="btn btn-success waves-effect waves-light mb-2">
                                    <i class="mdi mdi-plus me-1"></i> Tambah Tenant
                                </a>
                                {{-- <button type="button" class="btn btn-success waves-effect waves-light mb-2"
                                    data-bs-toggle="modal" data-bs-target="#addTenantModal">
                                    <i class="mdi mdi-plus me-1"></i> Tambah dari Lead Management
                                </button> --}}
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table-nowrap table-bordered table align-middle">
                            <thead>
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Email</th>
                                    <th class="align-middle">Nama Perusahaan</th>
                                    <th class="align-middle">Nomor Telepon Perusahaan</th>
                                    <th class="align-middle">Nama Penanggung Jawab</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tenants as $key => $tenant)
                                    <tr>
                                        <td scope="row">{{ $tenants->firstItem() + $key }}</td>
                                        <td>{{ $tenant->user->email }}</td>
                                        <td>{{ $tenant->company_name }}</td>
                                        <td>{{ $tenant->company_phone }}</td>
                                        <td>{{ $tenant->user->name }}</td>
                                        <td>
                                            <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="View Detail">
                                                    <a href="{{ route('tenants.show', $tenant->id) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
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
                            {{ $tenants->firstItem() }}
                            to
                            {{ $tenants->lastItem() }}
                            of
                            {{ $tenants->total() }}
                            entries
                        </div>
                        <div class="col">
                            <div class="pagination justify-content-end">
                                {{ $tenants->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    {{-- <!-- Modal Tambah Gedung -->
    <div class="modal fade" id="addTenantModal" tabindex="-1" aria-labelledby="addTenantModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addTenantModalLabel">Tambah Tenant</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="lead_management_id" class="form-label">Lead Management/Perusahaan</label>
                            <select class="form-select @error('lead_managements') is-invalid @enderror"
                                name="lead_management_id" id="lead_management_id">
                                <option value="" disabled selected>Pilih Lead Management</option>
                                @foreach ($lead_managements as $lead_management)
                                    <option value="{{ $lead_management->id }}"
                                        {{ old('lead_management_id') == $lead_management->id ? 'selected' : null }}>
                                        {{ $lead_management->company_name }} - {{ $lead_management->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Password</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" id="email" placeholder="Masukkan Email">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="password" placeholder="Masukkan Password">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <input type="text" name="name" id="name">
                        <input type="text" name="phone_number" id="phone_number">
                        <input type="text" name="address" id="address">
                        <input type="text" name="company_name" id="company_name">
                        <input type="text" name="company_phone" id="company_phone">
                        <select class="form-select @error('industry') is-invalid @enderror" name="industry[]"
                            id="industry" multiple>
                            <option value="" disabled>Pilih Industri</option>
                        </select>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal --> --}}

    @push('scripts')
        {{-- <script>
            $(document).ready(function() {
                $('#lead_management_id').on('change', function() {
                    var lead_management_id = $(this).val();

                    console.log(lead_management_id);
                    if (lead_management_id) {
                        $.ajax({
                            type: "get",
                            url: "/ajax/tenants/" + lead_management_id + "/getleadmanagements",
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: "json",
                            success: function(data) {
                                console.log(data);
                                if (data) {
                                    var name = data.name;
                                    var phoneNumber = data.phone_number;
                                    var address = data.address;
                                    var companyName = data.company_name;
                                    var companyPhone = data.company_phone;
                                    var industry = data.industries;

                                    $('#id').val(lead_management_id);
                                    $('#name').val(name);
                                    if (phoneNumber > 0) {
                                        $('#phone_number').val(phoneNumber);
                                    } else {
                                        $('#phone_number').val('Tidak memiliki nomer');
                                    }
                                    $('#address').val(address);
                                    $('#company_name').val(companyName);
                                    $('#company_phone').val(companyPhone);
                                    $('#industry').val(industry);
                                }
                            }
                        });
                    }
                })
            });
        </script> --}}
    @endpush
</x-app-layout>
