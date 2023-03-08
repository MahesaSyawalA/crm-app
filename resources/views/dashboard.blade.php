<x-app-layout>
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
