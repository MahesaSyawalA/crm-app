<x-app-layout>
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Ruang</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Kelola Tempat</a></li>
                        <li class="breadcrumb-item active">Ruang</li>
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
                    <div class="row mb-2">
                        <div class="col-sm-9">
                            <div class="d-flex align-items-center flex-wrap">
                                <div class="me-2 d-inline-block mb-2">
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="Search...">
                                    </div>
                                </div>
                                <div class="me-2 mb-2">
                                    <select class="form-control select2" name="qbuilding" id="id_building"
                                        style="width: 192px;">
                                        <option value="" disabled selected>Pilih Gedung</option>
                                        @foreach ($buildings as $building)
                                            @if ($building->floors_count != 0)
                                                <option value="{{ $building->id_building }}"
                                                    {{ old('id_building') == $building->id_building ? 'selected' : null }}>
                                                    {{ $building->name_building }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="me-2 mb-2">
                                    <select class="form-control select2" name="qfloor" id="id_floor"
                                        style="width: 192px;">
                                        <option value="" disabled>Pilih Gedung Terlebih Dahulu</option>
                                    </select>
                                </div>
                                <div class="mb-2">
                                    <select type="text" class="form-control select2" name="qstatus"
                                        style="width: 192px;">
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="active">Aktif</option>
                                        <option value="inactive">Tidak Aktif</option>
                                        <option value="rented">Disewa</option>
                                        <option value="booked">Dibooking</option>
                                        <option value="sealed">Disegel</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="text-sm-end">
                                <a href="{{ route('rooms.create') }}" type="button"
                                    class="btn btn-success waves-effect waves-light mb-2"><i
                                        class="mdi mdi-plus me-1"></i> Tambah Ruang</a>
                            </div>
                        </div><!-- end col-->
                    </div>

                    <div class="table-responsive">
                        <table class="table-nowrap table-bordered table align-middle">
                            <thead>
                                <tr>
                                    <th class="align-middle">No</th>
                                    <th class="align-middle">Kode Gedung</th>
                                    <th class="align-middle">Kode Lantai</th>
                                    <th class="align-middle">Kode Ruang</th>
                                    <th class="align-middle">Nama Ruang</th>
                                    <th class="align-middle">Luas (m2)</th>
                                    <th class="align-middle">Status Ruang</th>
                                    <th class="text-center align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($rooms as $key => $room)
                                    <tr>
                                        <td scope="row">{{ $rooms->firstItem() + $key }}</td>
                                        <td class="text-body fw-bold">{{ $room->building->name_building }}</td>
                                        <td class="text-body fw-bold">{{ $room->floor->name_floor }}</td>
                                        <td class="text-body fw-bold">{{ $room->code_room }}</td>
                                        <td>{{ $room->name_room }}</td>
                                        <td>{{ $room->wide_room }} m<sup>2</sup></td>
                                        <td>
                                            @if ($room->status_room->value === 'inactive')
                                                <span class="badge font-size-12 badge-soft-warning">Aktif</span>
                                            @elseif ($room->status_room->value === 'rented')
                                                <span class="badge font-size-12 badge-soft-primary">Disewa</span>
                                            @elseif ($room->status_room->value === 'booked')
                                                <span class="badge font-size-12 badge-soft-info">Dibooking</span>
                                            @elseif ($room->status_room->value === 'sealed')
                                                <span class="badge font-size-12 badge-soft-danger">Disegel</span>
                                            @else
                                                <span class="badge font-size-12 badge-soft-success">Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <ul class="list-unstyled hstack justify-content-center mb-0 gap-1">
                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="View Detail">
                                                    <a href="{{ route('rooms.show', $room->id_room) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </li>
                                                <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                    data-bs-title="Edit">
                                                    <a href="{{ route('rooms.edit', $room->id_room) }}"
                                                        class="btn btn-sm btn-info">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                </li>
                                                <form action="{{ route('rooms.destroy', $room->id_room) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <li data-bs-toggle="tooltip" data-bs-placement="top"
                                                        data-bs-title="Delete">
                                                        <button type="submit" class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Yakin ingin menghapus data ruang ini?')">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </li>
                                                </form>
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
                            {{ $rooms->firstItem() }}
                            to
                            {{ $rooms->lastItem() }}
                            of
                            {{ $rooms->total() }}
                            entries
                        </div>
                        <div class="col">
                            <div class="pagination justify-content-end">
                                {{-- {{ $rooms->links() }} --}}
                                {{ $rooms->withQueryString()->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <script>
        $(document).ready(function() {
            $('#id_building').on('change', function() {
                var id_building = $(this).val();
                console.log(id_building);
                if (id_building) {
                    $.ajax({
                        type: "get",
                        url: "/ajax/buildings/" + id_building + "/floors",
                        data: {
                            '_token': '{{ csrf_token() }}'
                        },
                        dataType: "json",
                        success: function(data) {
                            console.log(data);
                            if (data) {
                                $('#id_floor').empty();
                                $('#id_floor').append(
                                    '<option value="" selected disabled>Pilih Lantai</option>'
                                );
                                $.each(data, function(key, floor) {
                                    $('select[name="qfloor"]').append(
                                        '<option value="' + floor.id_floor +
                                        '">' + floor.name_floor + '</option>'
                                    )
                                });
                            }
                            // $('#id_floor').empty();
                        }
                    });
                }
                // $('#id_floor').empty();
            })
        });
    </script>
</x-app-layout>
