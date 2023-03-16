<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Grade</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Kelola Grade Tenant</li>
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
                            <form action="{{ route('grades.index') }}">
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
                                    data-bs-toggle="modal" data-bs-target="#addGradeModal"><i
                                        class="mdi mdi-plus me-1"></i> Tambah Grade</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table-nowrap table-bordered table align-middle">
                            <thead>
                                <tr>
                                    <th class="align-middle" style="width: 5rem">No</th>
                                    <th class="align-middle">Kode Grade</th>
                                    <th class="align-middle">Nilai Grade</th>
                                    <th class="text-center align-middle" style="width: 9rem">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $key => $grade)
                                    <tr>
                                        <th scope="row">{{ $grades->firstItem() + $key }}</th>
                                        <td>{{ $grade->code }}</td>
                                        <td>{{ $grade->score }}</td>
                                        <td>
                                            <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit">
                                                    <button type="button" class="btn btn-sm btn-info btneditgrade"
                                                        value="{{ $grade->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#editGradeModal">
                                                        <i class="fa fa-edit"></i>
                                                    </button>
                                                </li>
                                                <form action="{{ route('grades.destroy', $grade->id) }}" method="post">
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
                            {{ $grades->firstItem() }}
                            to
                            {{ $grades->lastItem() }}
                            of
                            {{ $grades->total() }}
                            entries
                        </div>
                        <div class="col">
                            <div class="pagination justify-content-end">
                                {{ $grades->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- Modal Tambah Grade -->
    <div class="modal fade" id="addGradeModal" tabindex="-1" aria-labelledby="addGradeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addGradeModalLabel">Tambah Grade</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('grades.store') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="code" class="form-label">Kode Grade</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror"
                                name="code" id="code" placeholder="Masukkan Kode" value="{{ old('code') }}">

                            @error('code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="score" class="form-label">Nilai Grade</label>
                            <input type="text" class="form-control @error('score') is-invalid @enderror"
                                name="score" id="score" placeholder="Masukkan Nilai"
                                value="{{ old('score') }}">

                            @error('score')
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
    <div class="modal fade" id="editGradeModal" tabindex="-1" aria-labelledby="editGradeModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editGradeModalLabel">Edit Grade</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('grades.update', 'id') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="idEdit">

                        <div class="mb-3">
                            <label for="code" class="form-label">Kode Grade</label>
                            <input type="text" class="form-control @error('code') is-invalid @enderror"
                                name="code" id="codeEdit" placeholder="Masukkan Kode"
                                value="{{ old('code') }}">

                            @error('code')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="score" class="form-label">Nilai Grade</label>
                            <input type="text" class="form-control @error('score') is-invalid @enderror"
                                name="score" id="scoreEdit" placeholder="Masukkan Nilai"
                                value="{{ old('score') }}">

                            @error('score')
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
                $('.btneditgrade').on('click', function() {
                    var grade_id = $(this).val();

                    // console.log(grade_id);
                    if (grade_id) {
                        $.ajax({
                            type: "get",
                            url: "/ajax/grades/" + grade_id,
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: "json",
                            success: function(data) {
                                // console.log(data);
                                if (data) {
                                    $('#idEdit').val(grade_id);
                                    $('#codeEdit').val(data.code);
                                    $('#scoreEdit').val(data.score);
                                }
                            }
                        });
                    }
                })
            });
        </script>
    @endpush
</x-app-layout>
