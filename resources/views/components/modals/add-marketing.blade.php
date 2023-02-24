<div class="modal fade" id="addMarketingModal" tabindex="-1" aria-labelledby="addMarketingModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addMarketingModalLabel">Tambah User Marketing</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="formrow-password-input" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="formrow-password-input"
                            placeholder="Masukkan Nama">
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="formrow-email-input" class="form-label">Email</label>
                                <input type="email" class="form-control" id="formrow-email-input"
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
                                <label for="formrow-email-input" class="form-label">Nomor Telepon</label>
                                <input type="email" class="form-control" id="formrow-email-input"
                                    placeholder="Masukkan Email">
                            </div>
                        </div>

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
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
            </form>
        </div>
    </div>
</div>
