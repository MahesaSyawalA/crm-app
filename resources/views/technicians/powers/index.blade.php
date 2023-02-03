<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Daya Tenant</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Kelola Daya Tenant</li>
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
                        <div class="col-sm-12">
                            <div class="me-2 d-inline-block mb-2">
                                <div class="position-relative">
                                    <input type="text" class="form-control" placeholder="Search...">
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
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
                                <tr>
                                    <td>1</td>
                                    <td>gunturawan123@email.com</td>
                                    <td>PT. Sinar Mas Jaya</td>
                                    <td>08956182311</td>
                                    <td>Guntur Setiawan</td>
                                    <td>
                                        <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="Tambah Daya">
                                                <button type="button" class="btn btn-sm btn-info"
                                                    data-bs-toggle="modal" data-bs-target="#addDayaTenantModal">
                                                    <i class="fa fa-edit"></i> Kelola Daya
                                                </button>
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
    <div class="modal fade" id="addDayaTenantModal" tabindex="-1" aria-labelledby="addDayaTenantModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="gedungModalLabel">Tambah Daya Tenant</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form class="repeater">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="formrow-email-input" class="form-label">Nama Perusahaan /
                                Intansi</label>
                            <input type="text" class="form-control" id="formrow-email-input"
                                value="PT. Sinar Mas Jaya" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nama PenanggungJawab</label>
                            <input type="text" class="form-control" id="formrow-password-input"
                                value="Guntur Setiawan" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Alamat PenanggungJawab</label>
                            <input type="text" class="form-control" id="formrow-password-input"
                                value="Jalan Tagog Cimekar Nomor 225" disabled>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Daya Terpasang</label>
                            <div data-repeater-list>
                                <div class="input-group mb-2" data-repeater-item>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Daya</option>
                                        <option value="">AC - 3300 VA</option>
                                        <option value="">Penerangan - 5500 VA</option>
                                    </select>
                                    <span class="input-group-text">Rp</span>
                                    <input type="text" class="form-control" id="formrow-inputCity"
                                        placeholder="Masukkan Tarif Dasar">
                                    <button type="button" class="btn btn-danger" data-repeater-delete>
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success btn-sm" data-repeater-create>
                                <i class="fa fa-plus"></i> Add
                            </button>
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
