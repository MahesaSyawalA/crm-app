<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Standmeter</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item active">Kelola Standmeter</li>
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
                        <div class="col-sm-6">
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="me-2 d-inline-block mb-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                    </div>
                                </div>
                                <div class="filter-bulan mb-2">
                                    <input class="form-control bg-light border-0" type="date">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-sm-end">
                                <button type="button" class="btn btn-success waves-effect waves-light mb-2">
                                    <i class="mdi mdi-export-variant me-1"></i> Export Excel
                                </button>
                                <a href="{{ route('standmeters.create') }}" type="button"
                                    class="btn btn-success waves-effect waves-light mb-2">
                                    <i class="mdi mdi-plus me-1"></i> Tambah Standmeter
                                </a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table-bordered table align-middle">
                            <thead>
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Customer</th>
                                    <th class="align-middle">Daya</th>
                                    <th class="align-middle">Standmeter Awal</th>
                                    <th class="align-middle">Standmeter Akhir</th>
                                    <th class="align-middle">Pemakaian</th>
                                    <th class="align-middle">Biaya</th>
                                    <th class="align-middle">BPJU</th>
                                    <th class="align-middle">Jumlah Tagihan</th>
                                    <th class="align-middle">Tanggal Input</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Bayu Sugoro</td>
                                    <td>Penerangan - 8800 VA</td>
                                    <td>18150</td>
                                    <td>18520</td>
                                    <td>370/Kwh</td>
                                    <td>Rp 563,880</td>
                                    <td>Rp 16,916</td>
                                    <td>Rp 580,796</td>
                                    <td>13 Oktober 2022</td>
                                    <td>
                                        <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                            <li data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                                <a href="#" class="btn btn-sm btn-info">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </li>
                                            <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="Download Excel">
                                                <a href="#" class="btn btn-sm btn-success">
                                                    <i class="fa fa-file-excel"></i>
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
</x-app-layout>
