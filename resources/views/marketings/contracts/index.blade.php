<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Kontrak Sewa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Data Kontrak Sewa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- Card Info -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 me-3">
                            <h5 class="mb-4">Menunggu Approval</h5>
                            <h1 class="card-text">11</h1>
                        </div>
                        <div class="align-self-center flex-shrink-0">
                            <div class="avatar-md rounded-circle bg-light" style="--bs-bg-opacity: .5">
                                <span class="avatar-title">
                                    <i class="bx bx-alarm font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 me-3">
                            <h5 class="mb-4">Disetujui</h5>
                            <h1 class="card-text">345</h1>
                        </div>
                        <div class="align-self-center flex-shrink-0">
                            <div class="avatar-md rounded-circle bg-light" style="--bs-bg-opacity: .5">
                                <span class="avatar-title">
                                    <i class="bx bx-check-double font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 me-3">
                            <h5 class="mb-4">Ditolak</h5>
                            <h1 class="card-text">5</h1>
                        </div>
                        <div class="align-self-center flex-shrink-0">
                            <div class="avatar-md rounded-circle bg-light" style="--bs-bg-opacity: .5">
                                <span class="avatar-title">
                                    <i class="bx bx-x font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 me-3">
                            <h5 class="mb-4">Dibatalkan</h5>
                            <h1 class="card-text">0</h1>
                        </div>
                        <div class="align-self-center flex-shrink-0">
                            <div class="avatar-md rounded-circle bg-light" style="--bs-bg-opacity: .5">
                                <span class="avatar-title">
                                    <i class="bx bx-block font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 me-3">
                            <h5 class="mb-4">Unit Tersedia</h5>
                            <h1 class="card-text">168</h1>
                        </div>
                        <div class="align-self-center flex-shrink-0">
                            <div class="avatar-md rounded-circle bg-light" style="--bs-bg-opacity: .5">
                                <span class="avatar-title">
                                    <i class="bx bx-pin font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card bg-secondary text-light">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 me-3">
                            <h5 class="mb-4">Sewa Aktif</h5>
                            <h1 class="card-text">36</h1>
                        </div>
                        <div class="align-self-center flex-shrink-0">
                            <div class="avatar-md rounded-circle bg-light" style="--bs-bg-opacity: .5">
                                <span class="avatar-title">
                                    <i class="bx bx-file font-size-24"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Card Info -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="search-box me-2 d-inline-block mb-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                        <i class="bx bx-search-alt search-icon"></i>
                                    </div>
                                </div>
                                <div class="dropdown me-2 mb-2">
                                    <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Pilih Status <i class="mdi mdi-chevron-down"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#">Proses Checking</a>
                                        <a class="dropdown-item" href="#">Disetujui</a>
                                        <a class="dropdown-item" href="#">Ditolak</a>
                                        <a class="dropdown-item" href="#">Dibatalkan</a>
                                        <a class="dropdown-item" href="#">Request Pembatalan</a>
                                    </div>
                                </div>
                                <div class="tgl-awal me-2 mb-2">
                                    <input class="form-control bg-light border-0" type="date">
                                </div>
                                <span>~</span>
                                <div class="tgl-akhir ms-2 mb-2">
                                    <input class="form-control bg-light border-0" type="date">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-success waves-effect waves-light mb-2">
                                    <i class="mdi mdi-export-variant me-1"></i> Export Excel
                                </button>
                                <button type="button" class="btn btn-success waves-effect waves-light mb-2">
                                    <i class="mdi mdi-plus me-1"></i> Buat Kontrak
                                </button>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table-nowrap table-check table align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Ruangan Sewa</th>
                                    <th class="align-middle">Tanggal Mulai Sewa</th>
                                    <th class="align-middle">Tanggal Berakhir Sewa</th>
                                    <th class="align-middle">Tenant</th>
                                    <th class="align-middle">Status</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Gedung A Lantai 01 Ruang 1A</td>
                                    <td>15 Juni 2023</td>
                                    <td>15 Desember 2023</td>
                                    <td>PT. Sinar Mas Jaya - Guntur Setiawan</td>
                                    <td>
                                        <span class="badge font-size-12 badge-soft-success">Disetujui</span>
                                    </td>
                                    <td>
                                        <div class="d-flex justify-content-center gap-3">
                                            <a href="" class="text-info">
                                                <i class="mdi mdi-eye font-size-18"></i>
                                            </a>
                                        </div>
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
