<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Edit User Marketing</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('marketings.index') }}">Kelola User</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('marketings.index') }}">Marketing</a></li>
                        <li class="breadcrumb-item active">Edit User</li>
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
                    <h4 class="card-title mb-5">Form Edit User Marketing</h4>

                    <form action="{{ route('marketings.update', $marketing->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                style="background-color: #eff2f7;" name="email" id="email"
                                placeholder="Masukkan Email" value="{{ old('email', $marketing->email) }}" readonly>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror"
                                name="name" id="name" placeholder="Masukkan Nama"
                                value="{{ old('email', $marketing->name) }}">

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Nomor Telepon</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror"
                                name="phone_number" id="phone_number" placeholder="Masukkan Nomor"
                                value="{{ old('email', $marketing->phone_number) }}">

                            @error('phone_number')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select type="text" class="form-select select2 @error('status') is-invalid @enderror"
                                name="status" id="status_user">
                                <option value="active"
                                    {{ old('status', $marketing->status->value) == 'active' ? 'selected' : '' }}>Aktif
                                </option>
                                <option value="inactive"
                                    {{ old('status', $marketing->status->value) == 'inactive' ? 'selected' : '' }}>
                                    Tidak
                                    Aktif
                                </option>
                            </select>

                            @error('status')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('marketings.index') }}" type="button"
                                class="btn btn-danger w-md me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
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
</x-app-layout>
