<x-app-layout>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Tambah Lantai</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Kelola Tempat</a></li>
                        <li class="breadcrumb-item"><a href="">Lantai</a></li>
                        <li class="breadcrumb-item active">Tambah Lantai</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- flash message -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Ada beberapa masalah dengan masukkan Anda.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- end flash message -->

    <div class="row justify-content-center">
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Form Tambah Lantai</h4>

                    <form action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="formrow-firstname-input" class="form-label">Pilih Gedung</label>
                            <select class="form-select select2">
                                <option value="" disabled selected>Pilih Gedung</option>
                                <option value="">Gedung A</option>
                                <option value="">Gedung B</option>
                                <option value="">Gedung C</option>
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Pilih Lantai</label>
                                    <select class="form-select select2">
                                        <option value="" disabled selected>Pilih Lantai</option>
                                        <option value="">Lantai 1</option>
                                        <option value="">Lantai 2</option>
                                        <option value="">Lantai 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Pilih Ruang</label>
                                    <select class="form-select select2">
                                        <option value="" disabled selected>Pilih Ruang</option>
                                        <option value="">Ruang 1</option>
                                        <option value="">Ruang 2</option>
                                        <option value="">Ruang 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Depan</label>
                                    <select class="form-select select2">
                                        <option value="" disabled selected>Pilih Ruang</option>
                                        <option value="">Ruang 1</option>
                                        <option value="">Ruang 2</option>
                                        <option value="">Ruang 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Belakang</label>
                                    <select class="form-select select2">
                                        <option value="" disabled selected>Pilih Ruang</option>
                                        <option value="">Ruang 1</option>
                                        <option value="">Ruang 2</option>
                                        <option value="">Ruang 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="formrow-firstname-input" class="form-label">Kiri</label>
                                    <select class="form-select select2">
                                        <option value="" disabled selected>Pilih Ruang</option>
                                        <option value="">Ruang 1</option>
                                        <option value="">Ruang 2</option>
                                        <option value="">Ruang 3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-5">
                                    <label for="formrow-firstname-input" class="form-label">Kanan</label>
                                    <select class="form-select select2">
                                        <option value="" disabled selected>Pilih Ruang</option>
                                        <option value="">Ruang 1</option>
                                        <option value="">Ruang 2</option>
                                        <option value="">Ruang 3</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div>
                            <a href="{{ route('roompositions.index') }}" type="button"
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
