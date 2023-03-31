<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Detail Kontrak Sewa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('contracts.index') }}">Kontrak Sewa</a></li>
                        <li class="breadcrumb-item active">Detail Kontrak Sewa</li>
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
                            <a href="{{ route('contracts.index') }}" type="button"
                                class="btn btn-info w-md me-2">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</x-app-layout>
