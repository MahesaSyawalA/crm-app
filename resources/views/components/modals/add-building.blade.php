<div class="modal fade" id="addGedungModal" tabindex="-1" aria-labelledby="addGedungModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="addGedungModalLabel">Tambah Gedung</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('buildings.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="code" class="form-label">Kode Gedung</label>
                        <input type="text" class="form-control @error('code') is-invalid @enderror" name="code"
                            placeholder="Masukkan Kode" value="{{ old('code') }}" autofocus>

                        @error('code')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Gedung</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            placeholder="Masukkan Nama" value="{{ old('name') }}">

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Alamat Gedung</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" name="address" placeholder="Masukkan Alamat"
                            rows="5">{{ old('address') }}</textarea>

                        @error('address')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Foto Gedung</label>
                        <img src="" class="img-thumbnail img-fluid mb-3 p-0" id="imgBuildingAdd"
                            style="max-height: 192px">
                        <input type="file" multiple accept=".jpg,.jpeg,.png,.gif,.svg"
                            class="form-control @error('image') is-invalid @enderror" name="image"
                            onchange="previewImgBuildingAdd()">

                        @error('image')
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
