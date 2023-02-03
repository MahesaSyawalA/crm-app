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
                                <tr>
                                    <td>1</td>
                                    <td>Sewa Jaringan</td>
                                    <td>/Bulan</td>
                                    <td>Rp 100,000</td>
                                    <td>Jaringan telepon dan internet</td>
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

    <!-- Modal Tambah Additional Service -->
    <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="gedungModalLabel">Tambah Additional Service</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nama Service</label>
                            <input type="text" class="form-control" id="formrow-password-input"
                                placeholder="Masukkan Nama">
                        </div>

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Pilih PIC</label>
                            <select class="form-select">
                                <option value="" disabled selected>Pilih PIC</option>
                                <option value="">PIC 1</option>
                                <option value="">PIC 2</option>
                                <option value="">PIC 3</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label">Harga</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="formrow-inputCity"
                                    placeholder="Masukkan Satuan Service">
                                <label class="input-group-text">Rp</label>
                                <input type="text" class="form-control" id="formrow-inputCity"
                                    placeholder="Masukkan Harga">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="formrow-firstname-input" placeholder="Masukkan Deskripsi" rows="5"></textarea>
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
