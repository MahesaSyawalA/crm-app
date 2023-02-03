<x-app-layout>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Ruang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Kelola Tempat</a></li>
                        <li class="breadcrumb-item"><a href="">Ruang</a></li>
                        <li class="breadcrumb-item active">Tambah Ruang</li>
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
                    <h4 class="card-title mb-5">Form Tambah Ruang</h4>

                    <form>
                        <div class="row">
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
                        </div>

                        <div class="row">

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Kode Ruang</label>
                                    <input type="text" class="form-control" id="formrow-email-input"
                                        placeholder="Masukkan kode lantai">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Nama Ruang</label>
                                    <input type="text" class="form-control" id="formrow-password-input"
                                        placeholder="Masukkan nama lantai">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Pilih Status</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="">Aktif</option>
                                        <option value="">Tidak Aktif</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Luas</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                        <label class="input-group-text">m2</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Total Tarif Overtime (Diatas 4
                                        Jam)</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                        <label class="input-group-text">Jam/m2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Total Tarif Overtime (Dibawah 4
                                        Jam)</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                        <label class="input-group-text">Jam/m2</label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Tarif Service Charge (Rp
                                        0)</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Tarif Service Charge Listrik
                                        Sendiri (Rp 0)</label>
                                    <div class="input-group">
                                        <label class="input-group-text">Rp</label>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Enter Your Living City">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label">Foto Gedung</label>
                            <input type="file" multiple accept=".jpg,.jpeg,.png,.gif,.svg" class="form-control"
                                id="formrow-inputCity">
                        </div>

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Alamat Gedung</label>
                            <textarea class="form-control" id="formrow-firstname-input" placeholder="Masukkan Alamat" rows="5"></textarea>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('rooms') }}" type="button" class="btn btn-danger w-md me-2">Cancel</a>
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
