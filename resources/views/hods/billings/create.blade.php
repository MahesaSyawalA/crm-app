<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Buat Billing</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('approvals.index') }}">Approval Sewa</a></li>
                        <li class="breadcrumb-item active">Buat Billing</li>
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
                    <h4 class="card-title mb-5">Form Tagihan Buat Billing</h4>

                    <form action="{{ route('hodbillings.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">

                            <input type="hidden" name="contract_id" id="contract_id" value="{{ $contract->id }}">

                            <div class="mb-3">
                                <label for="code" class="form-label">Nama Tenant</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Masukkan Nama"
                                    value="{{ $contract->tenant->company_name }} - {{ $contract->tenant->user->name }}"
                                    disabled>

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="code" class="form-label">Kode Tagihan</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                    style="background-color: #eff2f7;" id="code" name="code"
                                    placeholder="Masukkan Kode"
                                    value="{{ old('code') }}INV/0{{ $contract->id }}/POP/I" readonly>

                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Informasi Tagihan</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Masukkan Nama"
                                    value="Tagihan Pembayaran Ke-1 Sewa">

                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="billing_status" class="form-label">Status Informasi Tagihan</label>
                                <select class="form-select select2 nosearch @error('status') is-invalid @enderror"
                                    id="billing_status" name="status">
                                    <option value="" disabled>Pilih Status</option>
                                    <option value="unpaid" selected>Belum Lunas</option>
                                </select>

                                @error('status')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="total_payment" class="form-label">Tagihan</label>
                                <div class="input-group" id="total_payment">
                                    <label for="total_payment" class="input-group-text">Rp</label>
                                    <input type="number" class="form-control" id="total_payment" name="total_payment"
                                        placeholder="0" value="{{ $contract->total_payment }}" disabled>

                                    @error('total_payment')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="release_date">Tanggal Awal</label>
                                <input type="date" class="form-control @error('release_date') is-invalid @enderror"
                                    name="release_date" id="release_date">

                                @error('release_date')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mt-5">
                                <a href="{{ route('approvals.index') }}" type="button"
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
