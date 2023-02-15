<div class="modal fade" id="editGedungModal" tabindex="-1" aria-labelledby="editGedungModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editGedungModalLabel">Edit Gedung</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('buildings.update', 'id') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <input type="hidden" name="id_building" id="id_building">

                    <div class="mb-3">
                        <label for="code_building" class="form-label">Kode Gedung</label>
                        <input type="text" class="form-control @error('code_building') is-invalid @enderror"
                            id="code_building" name="code_building" placeholder="Masukkan Kode" autofocus>

                        @error('code_building')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name_building" class="form-label">Nama Gedung</label>
                        <input type="text" class="form-control @error('name_building') is-invalid @enderror"
                            id="name_building" name="name_building" placeholder="Masukkan Nama">

                        @error('name_building')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address_building" class="form-label">Alamat Gedung</label>
                        <textarea class="form-control @error('address_building') is-invalid @enderror" id="address_building"
                            name="address_building" placeholder="Masukkan Alamat" rows="5"></textarea>

                        @error('address_building')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image_building" class="form-label">Foto Gedung</label>
                        <img src="" class="img-thumbnail img-fluid mb-3 p-0" id="previewImgBuildingOnEdit"
                            style="max-height: 192px">
                        <input type="file" multiple accept=".jpg,.jpeg,.png,.gif,.svg"
                            class="form-control @error('image_building') is-invalid @enderror" id="image_building"
                            name="image_building" onchange="previewImgOnEdit()">

                        @error('image_building')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
