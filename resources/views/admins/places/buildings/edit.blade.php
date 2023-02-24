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

    <!-- flash message -->
    <x-alert></x-alert>
    <!-- end flash message -->

    <!-- card content -->
    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                {{-- <div class="row justify-content-center my-3">
                    <div class="col-6"> --}}
                <div class="card-body">
                    <h4 class="card-title mb-5">Form Edit Gedung</h4>

                    <form action="{{ route('buildings.update', $building->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">

                            <div class="mb-3">
                                <label for="code" class="form-label">Kode Gedung</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                    id="code" name="code" placeholder="Masukkan Kode"
                                    value="{{ old('code', $building->code) }}" autofocus>

                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Gedung</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Masukkan Nama"
                                    value="{{ old('name', $building->name) }}">

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="address" class="form-label">Alamat Gedung</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                                    placeholder="Masukkan Alamat" rows="5">{{ old('address', $building->address) }}</textarea>

                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Foto Gedung</label>
                                <input type="hidden" name="old_image" value="{{ $building->image }}">
                                @if ($building->image)
                                    <img src="{{ asset('storage/images/buildings/' . $building->image) }}"
                                        class="img-thumbnail img-fluid d-block mb-3 p-0" id="imgBuildingEdit"
                                        style="max-height: 192px; overflow:hidden;">
                                @else
                                    <img src="" class="img-thumbnail img-fluid mb-3 p-0" id="imgBuildingEdit"
                                        style="max-height: 192px; overflow:hidden;">
                                @endif
                                <input type="file" multiple accept=".jpg,.jpeg,.png,.gif,.svg"
                                    class="form-control @error('image') is-invalid @enderror" id="image"
                                    name="image" onchange="previewImgBuildingEdit()">

                                @error('image')
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
