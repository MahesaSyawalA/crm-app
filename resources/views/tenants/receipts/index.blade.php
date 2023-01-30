<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Kwitansi</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Data Kwitansi</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- start row -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col-sm-12">
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="me-2 d-inline-block mb-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                    </div>
                                </div>
                                <div class="dropdown me-2 mb-2">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Status <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Proses Checking</a>
                                        <a class="dropdown-item" href="#">Lunas</a>
                                        <a class="dropdown-item" href="#">Belum Lunas</a>
                                        <a class="dropdown-item" href="#">Expired</a>
                                        <a class="dropdown-item" href="#">Surat Peringatan</a>
                                        <a class="dropdown-item" href="#">Dibatalkan</a>
                                    </div>
                                </div>
                                <div class="tgl-tagihan mb-2">
                                    <input class="form-control bg-light border-0" type="date">
                                </div>
                            </div>
                        </div>
                        <!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table-bordered table align-middle">
                            <thead>
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Tenant</th>
                                    <th class="align-middle">Kode Kwitansi</th>
                                    <th class="align-middle">Nominal Kwitansi</th>
                                    <th class="align-middle">Tanggal Kwitansi</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>PT Sinar Mas Jaya - Guntur Setiawan</td>
                                    <td>KWI/002/POP/IV/22</td>
                                    <td>Rp 1,542,719</td>
                                    <td>15 Juli 2024</td>
                                    <td>
                                        <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="View Detail">
                                                <a href="#" class="btn btn-sm btn-primary">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </li>
                                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="Download PDF">
                                                <a href="#" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-file-pdf"></i>
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
</x-app-layout>
