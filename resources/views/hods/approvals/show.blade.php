<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Detail Ruang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Kelola Tempat</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('approvals.index') }}">Ruang</a></li>
                        <li class="breadcrumb-item active">Detail Ruang</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- flash message -->
    <x-alert></x-alert>
    <!-- end flash message -->

    <!-- Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-5">Detail</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-6 border-end border-secondary border-3">
                            <h4>Ruangan Sewa</h4>
                            <p class="mb-4">{{ $contract->room->floor->building->name }}
                                {{ $contract->room->floor->name }} {{ $contract->room->name }}</p>
                            <h4>Tanggal Mulai Sewa</h4>
                            <p class="mb-4">
                                {{ \Carbon\Carbon::parse($contract->start_date)->translatedFormat('l\, j F Y') }}</p>
                            <h4>Tanggal Akhir Sewa</h4>
                            {{ \Carbon\Carbon::parse($contract->end_date)->translatedFormat('l\, j F Y') }}</p>
                            <h4>Nama Tenant</h4>
                            <p class="mb-4">{{ $contract->tenant->company_name }} -
                                {{ $contract->tenant->user->name }}</p>
                            <h4>Jangka Waktu</h4>
                            <p class="mb-4">{{ $contract->total_period }}</p>
                            <h4>Keterangan</h4>
                            <p class="mb-4">{{ $contract->description }}</p>
                        </div>
                        <div class="col-md-6 ps-4">
                            <h4>Pembayaran Sewa</h4>
                            <h5 class="mb-4">Rp {{ number_format($contract->contract_payment, 0, ',') }}</h5>
                            <h4 class="mt-2">Service Charge</h4>
                            <h5 class="mb-4">Rp {{ number_format($contract->service_charge, 0, ',') }}</h5>
                            <h4 class="mt-2">Extra Service Charge</h4>
                            <h5 class="mb-4"><strong>Total : Rp
                                    {{ number_format($contract->additional_service, 0, ',') }}
                                </strong></h5>
                            <h5 class="mb-2">Jumlah : Rp.
                                {{ number_format($contract->contract_payment + $contract->service_charge + $contract->additional_service, 0, ',') }}
                            </h5>
                            <h5 class="mb-2">PPN : Rp.
                                {{ number_format($contract->ppn, 0, ',') }}
                            </h5>
                            <h5 class="mb-2">Total A : Rp.
                                {{ number_format($contract->contract_payment + $contract->service_charge + $contract->additional_service + $contract->ppn, 0, ',') }}
                            </h5>
                            <hr>
                            <h4 class="mt-2">Deposit</h4>
                            <ul class="mb-4">
                                <li>
                                    <h5>Deposit Sewa : Rp
                                        {{ number_format($contract->contract_deposit, 0, ',') }}
                                    </h5>
                                </li>
                                <li>
                                    <h5>Deposit Telepon : Rp
                                        {{ number_format($contract->line_deposit, 0, ',') }}
                                    </h5>
                                </li>
                                <li>
                                    <h5>Materai {{ $contract->stamp / 10000 }} Pcs : Rp
                                        {{ number_format($contract->stamp, 0, ',') }}
                                    </h5>
                                </li>
                            </ul>
                            <h5 class="mb-2">Jumlah : Rp.
                                {{ number_format($contract->contract_deposit + $contract->line_deposit + $contract->stamp, 0, ',') }}
                            </h5>
                            <h5 class="mb-2">Total B : Rp.
                                {{ number_format($contract->contract_deposit + $contract->line_deposit + $contract->stamp, 0, ',') }}
                            </h5>
                            <hr class="border-bottom border-secondary border-3">
                            <h4 class="mt-2">Total Pembayaran (A+B)</h4>
                            <h5 class="mb-4">Rp {{ number_format($contract->total_payment, 0, ',') }}
                            </h5>
                            <h5 class="mb-4">Pembayaran per Termin : Rp
                                {{ number_format($contract->term_payment, 0, ',') }}</h5>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('approvals.index') }}" type="button"
                                class="btn btn-info w-md">Kembali</a>
                            @if ($contract->approval->status->value == 'checking')
                                <a type="button" class="btn btn-success w-md" data-bs-toggle="modal"
                                    data-bs-target="#approveModal"><i class="fa fa-check"></i>
                                    Approve</a>
                                <a type="button" class="btn btn-danger w-md" data-bs-toggle="modal"
                                    data-bs-target="#rejectModal"><i class="fa fa-ban"></i> Tolak</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- Modal Setujui Kontrak Sewa -->
    <div class="modal fade" id="approveModal" tabindex="-1" aria-labelledby="approveModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="approveModalLabel">Form Approve Sewa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('approvals.store') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" name="id" id="id" value="{{ $contract->approval->id }}">
                        <input type="hidden" name="status" id="approval_status" value="approved">

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Pegawai Approval</label>
                            <select class="form-select @error('user_id') is-invalid @enderror" id="user_id"
                                name="user_id">
                                <option value="" disabled selected>Pilih Pegawai</option>
                                @foreach ($users as $employee)
                                    <option value="{{ $employee->id }}"
                                        {{ old('id') == $employee->id ? 'selected' : null }}>{{ $employee->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Keterangan</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                id="description" rows="5" placeholder="Masukkan Keterangan">{{ old('description') }}</textarea>

                            @error('description')
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
    <!-- End Modal -->

    <!-- Modal Tolak Kontrak Sewa -->
    <div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="rejectModalLabel">Form Tolak Kontrak Sewa</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('approvals.store') }}" method="post">
                    @csrf
                    <div class="modal-body">

                        <input type="hidden" name="contract_id" id="contract_id" value="{{ $contract->id }}">
                        <input type="hidden" name="status" id="approval_status" value="rejected">

                        <div class="mb-3">
                            <label for="user_id" class="form-label">Pegawai Approval</label>
                            <select class="form-select @error('user_id') is-invalid @enderror" id="user_id"
                                name="user_id">
                                <option value="" disabled selected>Pilih Pegawai</option>
                                @foreach ($users as $employee)
                                    <option value="{{ $employee->id }}"
                                        {{ old('id') == $employee->id ? 'selected' : null }}>{{ $employee->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('user_id')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Keterangan</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror" name="description"
                                id="description" rows="5" placeholder="Masukkan Keterangan">{{ old('description') }}</textarea>

                            @error('description')
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
    <!-- End Modal -->
</x-app-layout>
