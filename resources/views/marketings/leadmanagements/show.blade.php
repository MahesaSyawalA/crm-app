<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Detail Lead Management</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('leadmanagements.index') }}">Kelola Lead
                                Management</a></li>
                        <li class="breadcrumb-item active">Detail</li>
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
        <div class="col-7">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-5">Detail</h4>
                    </div>
                    <div class="row">
                        <div class="col-5 border-end border-secondary border-3">
                            <h5>Nama Perusahaan / Intansi</h5>
                            <p class="mb-4">{{ $lead_management->company_name }}</p>
                            <h5>Nomor Telepon Perusahaan</h5>
                            <p class="mb-4">{{ $lead_management->company_phone }}</p>
                            <h5>Nama Penanggungjawab</h5>
                            <p class="mb-4">{{ $lead_management->name }}</p>
                            <h5>Nomor Telepon Penanggungjawab</h5>
                            <p class="mb-4">{{ $lead_management->phone_number }}</p>
                        </div>
                        <div class="col-7 ps-4">
                            <h5>Nomor KTP Penanggungjawab</h5>
                            <p class="mb-4">{{ $lead_management->ktp_number }}</p>
                            <h5>Deskripsi</h5>
                            <p class="mb-4">{{ $lead_management->address }}</p>
                            <h5>Industri</h5>
                            <p class="mb-4">
                                @for ($i = 0; $i < count($lead_management->industries->pluck('name')); $i++)
                                    {{ $lead_management->industries->pluck('name')[$i] }}
                                    @if (!$i)
                                        ,
                                    @endif
                                @endfor
                            </p>
                            <h5>Deskripsi</h5>
                            @if ($lead_management->potential->value == 'potentially')
                                <p class="mb-4">Berpotensi</p>
                            @elseif ($lead_management->potential->value == 'nopotential')
                                <p class="mb-4">Tidak berpotensi</p>
                            @endif
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('leadmanagements.index') }}" type="button"
                                class="btn btn-info w-md me-2">Kembali
                            </a>
                            <a href="{{ route('leadmanagements.index') }}" type="button"
                                class="btn btn-primary w-md me-2">Set Grade
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">
                        <h4 class="mb-4">Foto</h4>
                    </div>
                    @if ($lead_management->ktp_image)
                        <img src="{{ asset('storage/images/ktp/' . $lead_management->ktp_image) }}"
                            class="img-thumbnail img-fluid d-block mb-3 p-0" id="imgKTPShow"
                            style="max-height:640px; overflow:hidden;" alt="Foto KTP">
                    @else
                        <img src="https://via.placeholder.com/640x360?text=Tidak+Ada+Foto+Ruang"
                            class="img-thumbnail img-fluid mb-3 p-0" id="imgKTPShow" alt="Foto KTP">
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</x-app-layout>
