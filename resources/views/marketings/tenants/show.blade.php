<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Detail Tenant</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('leadmanagements.index') }}">Kelola Tenant</a></li>
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
                            <p class="mb-4">{{ $tenant->company_name }}</p>
                            <h5>Nomor Telepon Perusahaan</h5>
                            <p class="mb-4">{{ $tenant->company_phone }}</p>
                            <h5>Nama Penanggungjawab</h5>
                            <p class="mb-4">{{ $tenant->user->name }}</p>
                            <h5>Nomor Telepon Penanggungjawab</h5>
                            <p class="mb-4">{{ $tenant->user->phone_number }}</p>
                        </div>
                        <div class="col-7 ps-4">
                            <h5>Deskripsi</h5>
                            <p class="mb-4">{{ $tenant->address }}</p>
                            <h5>Industri</h5>
                            <p class="mb-4">
                                @for ($i = 0; $i < count($tenant->industries->pluck('name')); $i++)
                                    {{ $tenant->industries->pluck('name')[$i] }}
                                    @if (!$i)
                                        ,
                                    @endif
                                @endfor
                            </p>
                        </div>
                        <div class="mt-4">
                            <a href="{{ route('tenants.index') }}" type="button" class="btn btn-info w-md me-2">Kembali
                            </a>
                            <a href="{{ route('tenants.index') }}" type="button" class="btn btn-primary w-md me-2">Set
                                Grade
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</x-app-layout>
