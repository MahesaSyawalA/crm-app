<x-app-layout>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Lead Management</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Lead Management</a></li>
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
                        <div class="mb-3">
                            <label for="formrow-email-input" class="form-label">Nama Perusahaan/Instansi</label>
                            <input type="text" class="form-control" id="formrow-email-input"
                                placeholder="Masukkan Nama Perusahaan">
                        </div>

                        <div class="mb-3">
                            <label for="formrow-email-input" class="form-label">No Telepon
                                Perushaan/Instansi</label>
                            <input type="text" class="form-control" id="formrow-email-input"
                                placeholder="Masukkan Nomor Perusahaan">
                        </div>

                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Nama PenanggungJawab</label>
                            <input type="text" class="form-control" id="formrow-password-input"
                                placeholder="Masukkan nama lantai">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">No Telepon
                                        PenanggungJawab</label>
                                    <input type="text" class="form-control" id="formrow-password-input"
                                        placeholder="Masukkan Nomor PenanggungJawab">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">No KTP
                                        PenanggungJawab</label>
                                    <input type="text" class="form-control" id="formrow-password-input"
                                        placeholder="Masukkan Nomor KTP PenanggungJawab">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Industri</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Industri</option>
                                        <option value="">Industri 1</option>
                                        <option value="">Industri 2</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Potensi Pemasaran</label>
                                    <select class="form-select">
                                        <option value="" disabled selected>Pilih Potensi</option>
                                        <option value="">Berpotensi</option>
                                        <option value="">Tidak Berpotensi</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Alamat PenanggungJawab</label>
                            <textarea class="form-control" id="formrow-firstname-input" placeholder="Masukkan Alamat" rows="5"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label">Scan KTP PenanggungJawab</label>
                            <input type="file" multiple accept=".jpg,.jpeg,.png,.gif,.svg" class="form-control"
                                id="formrow-inputCity">
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('leadmanagements.index') }}" type="button"
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
