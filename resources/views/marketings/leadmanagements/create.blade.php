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
                    <h4 class="card-title mb-5">Form Tambah Lead Management</h4>

                    <form action="{{ route('leadmanagements.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="company_name" class="form-label">Nama Perusahaan/Instansi</label>
                            <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                name="company_name" id="company_name" placeholder="Masukkan Nama Perusahaan"
                                value="{{ old('company_name') }}">

                            @error('company_name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="company_phone" class="form-label">No Telepon
                                Perushaan/Instansi</label>
                            <input type="text" class="form-control @error('company_phone') is-invalid @enderror"
                                name="company_phone" id="company_phone" placeholder="Masukkan Nomor Perusahaan"
                                value="{{ old('company_phone') }}">

                            @error('company_phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama PenanggungJawab</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" id="name" placeholder="Masukkan nama lantai"
                                value="{{ old('name') }}">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="phone_number" class="form-label">No Telepon
                                        PenanggungJawab</label>
                                    <input type="text"
                                        class="form-control @error('phone_number') is-invalid @enderror"
                                        name="phone_number" id="phone_number"
                                        placeholder="Masukkan Nomor PenanggungJawab" value="{{ old('phone_number') }}">

                                    @error('phone_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="ktp_number" class="form-label">No KTP
                                        PenanggungJawab</label>
                                    <input type="text" class="form-control @error('ktp_number') is-invalid @enderror"
                                        name="ktp_number" id="ktp_number"
                                        placeholder="Masukkan Nomor KTP PenanggungJawab"
                                        value="{{ old('ktp_number') }}">

                                    @error('ktp_number')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="industry" class="form-label">Industri</label>
                                    <select class="form-select select2 industri @error('industry') is-invalid @enderror"
                                        name="industry[]" id="industry" multiple>
                                        <option value="" disabled>Pilih Industri</option>
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->id }}"
                                                {{ old('industry_id') == $industry->id ? 'selected' : null }}>
                                                {{ $industry->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('industry_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="potential" class="form-label">Potensi Pemasaran</label>
                                    <select
                                        class="form-select select2 nosearch @error('potential') is-invalid @enderror"
                                        name="potential" id="potential">
                                        <option value="" disabled>Pilih Potensi</option>
                                        <option value="potentially"
                                            {{ old('potential') == 'potentially' ? 'selected' : null }}>Berpotensi
                                        </option>
                                        <option value="nopotential"
                                            {{ old('status') == 'nopotential' ? 'selected' : null }}>Tidak Berpotensi
                                        </option>
                                    </select>

                                    @error('potential')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat PenanggungJawab</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address"
                                placeholder="Masukkan Alamat" value="{{ old('address') }}" rows="5"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="ktp_image" class="form-label">Scan KTP PenanggungJawab</label>
                            <img src="" class="img-thumbnail img-fluid mb-3 p-0" id="imgKTPAdd"
                                style="max-height: 192px">
                            <input type="file" multiple accept=".jpg,.jpeg,.png,.gif,.svg"
                                class="form-control @error('ktp_image') is-invalid @enderror" name="ktp_image"
                                id="ktp_image" onchange="previewImgKTPAdd()">

                            @error('ktp_image')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
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

    @push('scripts')
        <script>
            //Script Preview KTP Image
            function previewImgKTPAdd() {
                imgKTPAdd.src = URL.createObjectURL(event.target.files[0]);
                imgKTPAdd.style.display = 'block';
            }
        </script>
    @endpush
</x-app-layout>
