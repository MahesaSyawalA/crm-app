<x-app-layout>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Standmeter</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Data Standmeter</a></li>
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
                            <label for="formrow-password-input" class="form-label">Ruang Sewa Tenant</label>
                            <select class="form-select">
                                <option value="" disabled selected>Pilih Tenant</option>
                                <option value="">AC - 3300 VA</option>
                                <option value="">Penerangan - 5500 VA</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-password-input" class="form-label">Daya</label>
                            <select class="form-select">
                                <option value="" disabled selected>Pilih Daya</option>
                                <option value="">AC - 3300 VA</option>
                                <option value="">Penerangan - 5500 VA</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Standmeter Awal</label>
                                    <input type="text" class="form-control" id="formrow-email-input"
                                        placeholder="Masukkan Standmeter Awal">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Standmeter Akhir</label>
                                    <input type="text" class="form-control" id="formrow-password-input"
                                        placeholder="Masukkan Standmeter Akhir">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="formrow-inputCity" class="form-label">Foto Standmeter</label>
                            <input type="file" multiple accept=".jpg,.jpeg,.png,.gif,.svg" class="form-control"
                                id="formrow-inputCity">
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Pemakaian Per Kwh / LWBP</label>
                                    <input type="text" class="form-control" id="formrow-email-input"
                                        placeholder="Masukkan Pemakaian">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Biaya Pemakaian</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Masukkan Biaya Pemakaian">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Biaya BPJU /
                                        Lain-lain</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Masukkan Biaya BPJU">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-password-input" class="form-label">Jumlah Tagihan</label>
                                    <div class="input-group">
                                        <span class="input-group-text">Rp</span>
                                        <input type="text" class="form-control" id="formrow-inputCity"
                                            placeholder="Masukkan Tarif Dasar">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('standmeters.index') }}" type="button"
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
