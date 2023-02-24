<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Lantai</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Kelola Tempat</a></li>
                        <li class="breadcrumb-item active">Lantai</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <!-- flash message -->
    <x-alert></x-alert>
    <!-- end flash message -->


    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-sm-8">
                            <form action="{{ route('floors.index') }}">
                                <div class="d-flex align-items-center flex-wrap">
                                    <div class="me-2 d-inline-block mb-2">
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="search" id="search"
                                                placeholder="Search...">
                                        </div>
                                    </div>
                                    <div class="me-2 mb-2">
                                        <select type="text" class="form-control select2" name="searchBuilding"
                                            style="width: 192px;">
                                            <option value="" disabled selected>Pilih Gedung</option>
                                            @foreach ($buildings as $building)
                                                <option value="{{ $building->id_building }}"
                                                    {{ old('id_building') == $building->id_building ? 'selected' : null }}>
                                                    {{ $building->name_building }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-2">
                                        <button class="btn btn-info" type="submit">
                                            <i class="fa fa-magnifying-glass"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <div class="col-sm-4">
                            <div class="text-sm-end">
                                <a href="{{ route('floors.create') }}"
                                    class="btn btn-success waves-effect waves-light mb-2"><i
                                        class="mdi mdi-plus me-1"></i>
                                    Tambah Lantai</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table-nowrap table-bordered table align-middle">
                            <thead>
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Nama Gedung</th>
                                    <th class="align-middle">Kode Lantai</th>
                                    <th class="align-middle">Nama Lantai</th>
                                    <th class="align-middle">Harga Sewa</th>
                                    <th class="align-middle">Service Charge (Termasuk Listrik)</th>
                                    <th class="align-middle">Service Charge Listrik Sendiri</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($floors as $key => $floor)
                                    <tr>
                                        <td scope="row">{{ $floors->firstItem() + $key }}</td>
                                        {{-- <td scope="row">{{ $loop->iteration }}</td> --}}
                                        <td class="text-body fw-bold">{{ $floor->building->name }}</td>
                                        <td class="text-body fw-bold">{{ $floor->code }}</td>
                                        <td>{{ $floor->name }}</td>
                                        <td>Rp {{ number_format($floor->monthly_price, 0, ',') }} / m2/Bulan</td>
                                        <td>Rp {{ number_format($floor->service_charge, 0, ',') }} / m2/Bulan
                                        </td>
                                        <td>Rp {{ number_format($floor->own_electricity, 0, ',') }} /
                                            m2/Bulan</td>
                                        <td>
                                            <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit">
                                                    <a href="{{ route('floors.edit', $floor->id) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                {{-- @if ($floor->rooms_count == 0) --}}
                                                <form action="{{ route('floors.destroy', $floor->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Delete">
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus data gedung ini?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </li>
                                                </form>
                                                {{-- @endif --}}
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="row">
                        <div class="col text-muted">
                            Showing
                            {{ $floors->firstItem() }}
                            to
                            {{ $floors->lastItem() }}
                            of
                            {{ $floors->total() }}
                            entries
                        </div>
                        <div class="col">
                            <div class="pagination justify-content-end">
                                {{-- {{ $floors->links() }} --}}
                                {{ $floors->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
</x-app-layout>
