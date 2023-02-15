<x-app-layout>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Tenant</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Data Tenant</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Form Tambah Data</h4>

                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Status Booking</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="">Ya</option>
                                        <option value="">Tidak</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Pilih Gedung</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Gedung</option>
                                        <option value="">Gedung A</option>
                                        <option value="">Gedung B</option>
                                        <option value="">Gedung C</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Pilih Lantai</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Lantai</option>
                                        <option value="">Lantai 1</option>
                                        <option value="">Lantai 2</option>
                                        <option value="">Lantai 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Pilih Ruang</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Ruang</option>
                                        <option value="">Ruang 1</option>
                                        <option value="">Ruang 2</option>
                                        <option value="">Ruang 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Luas Ruangan</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                        <label class="input-group-text">m2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">+/- Ruangan</label>
                                    <select class="form-select">
                                        <option value="">Tambah</option>
                                        <option value="">Kurang</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Luas Tambah/Kurang</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                        <label class="input-group-text">m2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Ruang Tambahan</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Ruang</option>
                                        <option value="">Ruang 1</option>
                                        <option value="">Ruang 2</option>
                                        <option value="">Ruang 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Jangka Waktu</label>
                            <div class="input-group">
                                <input type="text" class="form-control" id="formrow-inputCity"
                                    placeholder="Enter Your Living City">
                                <select class="form-select">
                                    <option value="" disabled selected>Pilih Satuan</option>
                                    <option value="">Menit</option>
                                    <option value="">Jam</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Tanggal Awal</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="">Tanggal Akhir</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Jenis Service
                                        Charge</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Jenis Service Charge</option>
                                        <option value="">Service Charge + Listrik - Rp 0 / Bulan</option>
                                        <option value="">Service Charge - Rp 0 / Bulan</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">PPN</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih PPN yang Dibayarkan</option>
                                        <option value="">PPN Dibayarkan Manajemen</option>
                                        <option value="">PPN Dibayarkan Tenant</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="formrow-firstname-input" placeholder="Masukkan Keterangan" rows="5"></textarea>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('contracts.index') }}" type="button"
                                class="btn btn-danger w-md me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
</x-app-layout>
