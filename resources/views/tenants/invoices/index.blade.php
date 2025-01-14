<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Invoice</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Data Invoice</li>
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
                            <h5 class="mb-4">Menunggu Pembayaran</h5>
                            <h1 class="card-text">1239</h1>
                        </div>
                        <div class="align-self-center flex-shrink-0">
                            <div class="avatar-md rounded-circle bg-light" style="--bs-bg-opacity: .5">
                                <span class="avatar-title">
                                    <i class="bx bx-money-withdraw font-size-24"></i>
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
                            <h5 class="mb-4">Menunggu Approval</h5>
                            <h1 class="card-text">5</h1>
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
                            <h5 class="mb-4">Lunas</h5>
                            <h1 class="card-text">800</h1>
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
    </div>
    <!-- End Card Info -->

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
                                    <th class="align-middle">Status Tagihan</th>
                                    <th class="align-middle">Tenant</th>
                                    <th class="align-middle">Kode Tagihan</th>
                                    <th class="align-middle">Deskripsi Tagihan</th>
                                    <th class="align-middle">Jumlah Tagihan</th>
                                    <th class="align-middle">Tanggal Tagihan</th>
                                    <th class="align-middle">Jatuh Tempo</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contracts as $key => $contract)
                                    @if ($contract->billing->status->value == 'unpaid')
                                        <tr>
                                            <td scope="row"></td>
                                            <td>
                                                <span class="badge font-size-12 badge-soft-warning">Belum Lunas</span>
                                            </td>
                                            <td>{{ $contract->tenant->company_name }} -
                                                {{ $contract->tenant->user->name }}
                                            </td>
                                            <td>{{ $contract->billing->code }}</td>
                                            <td>{{ $contract->billing->name }} {{ $contract->total_period }} -
                                                {{ $contract->room->floor->building->name }}
                                                {{ $contract->room->floor->name }} {{ $contract->room->name }}.</td>
                                            <td>Rp {{ number_format($contract->total_payment, 0, ',') }}</td>
                                            <td>{{ $contract->billing->release_date }}</td>
                                            <td>{{ $contract->billing->due_date }}</td>
                                            <td>
                                                <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Konfirmasi Pembayaran">
                                                        <button type="button" class="btn btn-sm btn-info"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#addBuktiBayarModal">
                                                            <i class="fa fa-upload"></i>
                                                        </button>
                                                    </li>
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
                                    @endif
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

    <!-- Modal Tambah Gedung -->
    <div class="modal fade" id="addBuktiBayarModal" tabindex="-1" aria-labelledby="addBuktiBayarModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="gedungModalLabel">Upload Bukti Pembayaran</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form>
                    <div class="modal-body">

                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label">Bukti Pembayaran</label>
                            <input type="file" multiple accept=".jpg,.jpeg,.png,.gif,.svg" class="form-control"
                                id="formrow-inputCity">
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
