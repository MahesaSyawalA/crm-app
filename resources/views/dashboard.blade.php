<x-app-layout>
    <div>
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <x-alert></x-alert>

        <!-- card content -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-2">
                            <h1>Selamat Datang!</h1>
                            <h5>Anda login dengan role
                                <span class="text-primary">
                                    @for ($i = 0; $i < count(Auth::user()->roles->pluck('name')); $i++)
                                        {{ Auth::user()->roles->pluck('name')[$i] }}
                                        @if (!$i)
                                            ,
                                        @endif
                                    @endfor
                                </span>.
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @role('admin')
        <x-dashboards.admin-dashboard></x-dashboards.admin-dashboard>
    @endrole

    @role('marketing')
        <x-dashboards.marketing-dashboard></x-dashboards.marketing-dashboard>
    @endrole

    @role('hod')
        <x-dashboards.hod-dashboard></x-dashboards.hod-dashboard>
    @endrole

    @role('technician')
        <x-dashboards.technician-dashboard></x-dashboards.technician-dashboard>
    @endrole

    @role('finance')
        <x-dashboards.finance-dashboard></x-dashboards.finance-dashboard>
    @endrole

    @role('tenant')
        <x-dashboards.tenant-dashboard></x-dashboards.tenant-dashboard>
    @endrole
</x-app-layout>
