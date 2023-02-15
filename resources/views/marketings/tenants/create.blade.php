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
                                    <label for="formrow-password-input" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="formrow-password-input"
                                        placeholder="Masukkan Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Password</label>
                                    <input type="password" class="form-control" id="formrow-password-input"
                                        placeholder="Masukkan Password">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Nama Perusahaan/Instansi</label>
                                    <input type="text" class="form-control" id="formrow-email-input"
                                        placeholder="Masukkan Nama Perusahaan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Nama PenanggungJawab</label>
                                    <input type="text" class="form-control" id="formrow-password-input"
                                        placeholder="Masukkan nama lantai">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">No Telepon
                                        Perushaan/Instansi</label>
                                    <input type="text" class="form-control" id="formrow-email-input"
                                        placeholder="Masukkan Nomor Perusahaan">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">No Telepon
                                        PenanggungJawab</label>
                                    <input type="text" class="form-control" id="formrow-password-input"
                                        placeholder="Masukkan Nomor PenanggungJawab">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Industri</label>
                            <select class="form-select">
                                <option value="" disabled selected>Pilih Industri</option>
                                <option value="">Industri 1</option>
                                <option value="">Industri 2</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Alamat PenanggungJawab</label>
                            <textarea class="form-control" id="formrow-firstname-input" placeholder="Masukkan Alamat" rows="5"></textarea>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('tenants.index') }}" type="button"
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
