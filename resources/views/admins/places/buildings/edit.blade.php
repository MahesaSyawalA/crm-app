<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit Gedung</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('buildings.index') }}">Kelola Tempat</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('buildings.index') }}">Gedung</a></li>
                        <li class="breadcrumb-item active">Edit Gedung</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Ada beberapa masalah dengan masukkan Anda.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- card content -->
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                {{-- <div class="row justify-content-center my-3">
                    <div class="col-6"> --}}
                <div class="card-body">
                    <h4 class="card-title mb-5">Form Edit Gedung</h4>

                    <form action="{{ route('buildings.update', 'id') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <input type="hidden" name="id_building" id="id_building"
                                value="{{ $building->id_building }}">

                            <div class="mb-3">
                                <label for="code_building" class="form-label">Kode Gedung</label>
                                <input type="text" class="form-control @error('code_building') is-invalid @enderror"
                                    id="code_building" name="code_building" placeholder="Masukkan Kode"
                                    value="{{ old('code_building', $building->code_building) }}" autofocus>

                                @error('code_building')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name_building" class="form-label">Nama Gedung</label>
                                <input type="text" class="form-control @error('name_building') is-invalid @enderror"
                                    id="name_building" name="name_building" placeholder="Masukkan Nama"
                                    value="{{ old('name_building', $building->name_building) }}">

                                @error('name_building')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address_building" class="form-label">Alamat Gedung</label>
                                <textarea class="form-control @error('address_building') is-invalid @enderror" id="address_building"
                                    name="address_building" placeholder="Masukkan Alamat" rows="5">{{ old('address_building', $building->address_building) }}</textarea>

                                @error('address_building')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image_building" class="form-label">Foto Gedung</label>
                                @if ($building->image_building)
                                    <img src="{{ asset('storage/' . $building->image_building) }}"
                                        class="img-thumbnail img-fluid d-block mb-3 p-0" id="imgBuildingEdit"
                                        style="max-height: 192px; overflow:hidden;">
                                @else
                                    <img src="" class="img-thumbnail img-fluid mb-3 p-0" id="imgBuildingEdit"
                                        style="max-height: 192px; overflow:hidden;">
                                @endif
                                <input type="file" multiple accept=".jpg,.jpeg,.png,.gif,.svg"
                                    class="form-control @error('image_building') is-invalid @enderror"
                                    id="image_building" name="image_building" onchange="previewImgBuildingEdit()">

                                @error('image_building')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <a href="{{ route('buildings.index') }}" type="button"
                                    class="btn btn-danger w-md me-2">Cancel</a>
                                <button type="submit" class="btn btn-primary w-md">Submit</button>
                            </div>
                        </div>
                    </form>
                    <!-- end card body -->
                </div>
                {{-- </div>
                </div> --}}
                <!-- end card -->
            </div>
            <!-- end col -->
        </div>
    </div>
    <!-- end card -->

    <script>
        //Script Preview Image Building
        function previewImgBuildingEdit() {
            imgBuildingEdit.src = URL.createObjectURL(event.target.files[0]);
            imgBuildingEdit.style.display = 'block';
        }
    </script>
</x-app-layout>
