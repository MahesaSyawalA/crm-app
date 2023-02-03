<x-app-layout>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Lantai</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Kelola Tempat</a></li>
                        <li class="breadcrumb-item"><a href="">Lantai</a></li>
                        <li class="breadcrumb-item active">Tambah Lantai</li>
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
                    <h4 class="card-title mb-5">Form Tambah Lantai</h4>

                    <form>
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Pilih Gedung</label>
                            <select class="form-select">
                                <option value="" disabled selected>Pilih Gedung</option>
                                <option value="">Gedung A</option>
                                <option value="">Gedung B</option>
                                <option value="">Gedung C</option>
                            </select>
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Kode Lantai</label>
                                    <input type="text" class="form-control" id="formrow-email-input"
                                        placeholder="Masukkan kode lantai">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Nama Lantai</label>
                                    <input type="text" class="form-control" id="formrow-password-input"
                                        placeholder="Masukkan nama lantai">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Harga per m2/Bulan</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                        <label class="input-group-text">m2/Bulan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Harga per m2/Hari</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                        <label class="input-group-text">m2/Hari</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Service Charge</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Service Charge Listrik
                                        Sendiri</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-5">
                                    <label for="formrow-inputCity" class="form-label">Tarif Dasar Overtime (Diatas 4
                                        Jam)</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-5">
                                    <label for="formrow-inputCity" class="form-label">Tarif Dasar Overtime (Dibawah
                                        4
                                        Jam)</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('floors') }}" type="button"
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
