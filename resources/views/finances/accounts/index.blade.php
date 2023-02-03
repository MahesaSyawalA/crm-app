<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Rekening</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Kelola Rekening</li>
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
                            <div class="me-2 d-inline-block mb-2">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-success waves-effect waves-light mb-2"
                                    data-bs-toggle="modal" data-bs-target="#addRekeningModal"><i
                                        class="mdi mdi-plus me-1"></i> Tambah Rekening</button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table-nowrap table-bordered table align-middle">
                            <thead>
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Nomor Rekening</th>
                                    <th class="align-middle">Atas Nama</th>
                                    <th class="align-middle">Nama Bank</th>
                                    <th class="text-center align-middle" style="width: 9rem">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>1200003029472</td>
                                    <td>PT Pulo Mas Jaya</td>
                                    <td>BCA</td>
                                    <td>
                                        <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                                <a href="#" class="btn btn-sm btn-info">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </li>
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete">
                                                <a href="#" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
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

    <!-- Modal Tambah Gedung -->
    <div class="modal fade" id="addRekeningModal" tabindex="-1" aria-labelledby="addRekeningModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="gedungModalLabel">Tambah Data Rekening</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nomor Rekening</label>
                            <input type="text" class="form-control" id="formrow-password-input"
                                placeholder="Masukkan Nomor Rekening">
                        </div>

                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Atas Nama</label>
                            <input type="text" class="form-control" id="formrow-password-input"
                                placeholder="Masukkan Nama">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal -->
</x-app-layout>
