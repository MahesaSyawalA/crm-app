<x-app-layout>

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0 font-size-18">Data Kontrak Sewa</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="">Data Kontrak Sewa</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Form Tambah Data</h4>

                    <form action="{{ route('contracts.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="booking_status" class="form-label">Status Booking</label>
                                    <select
                                        class="form-select select2 nosearch @error('booking_status') is-invalid @enderror"
                                        name="booking_status" id="booking_status">
                                        <option value="" disabled selected>Pilih Status</option>
                                        <option value="1">Ya</option>
                                        <option value="0">Tidak</option>
                                    </select>

                                    @error('booking_status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6" id="input_booking_code">
                                <div class="mb-3">
                                    <label for="code_booking" class="form-label">Kode Booking</label>
                                    <input type="text" class="form-control" name="booking_code" id="booking_code"
                                        placeholder="Masukkan kode">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="building" class="form-label">Gedung</label>
                                    <select class="form-select select2 @error('building') is-invalid @enderror"
                                        id="building" name="building">
                                        <option value="" disabled selected>Pilih Gedung</option>
                                        @foreach ($buildings as $building)
                                            @if ($building->floors_count != 0)
                                                <option value="{{ $building->id }}"
                                                    {{ old('id') == $building->id ? 'selected' : null }}>
                                                    {{ $building->name }} - {{ $building->code }}</option>
                                            @endif
                                        @endforeach
                                    </select>

                                    @error('building')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="floor" class="form-label">Lantai</label>
                                    <select class="form-select select2 @error('floor') is-invalid @enderror"
                                        id="floor" name="floor">
                                        <option value="" disabled>Pilih Gedung Terlebih Dahulu</option>
                                    </select>

                                    @error('floor')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="room_id" class="form-label">Ruang</label>
                                    <select class="form-select select2 @error('room_id') is-invalid @enderror"
                                        name="room_id" id="room_id">
                                        <option value="" disabled>Pilih Lantai Terlebih Dahulu</option>
                                    </select>

                                    @error('room_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="main_wide" class="form-label">Luas Ruangan Utama</label>
                                    <div class="input-group">
                                        <input type="number"
                                            class="form-control @error('main_wide') is-invalid @enderror"
                                            name="main_wide" id="main_wide" style="background-color: #eff2f7;"
                                            placeholder="0" value="0" readonly>
                                        <label class="input-group-text">m2</label>

                                        @error('main_wide')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="indec_select" class="form-label">+/- Ruangan</label>
                                    <select class="form-select select2 nosearch" name="indec_select" id="indec_select">
                                        <option value="" disabled selected>Pilih</option>
                                        <option value="plus">Tambah</option>
                                        <option value="minus">Kurang</option>
                                        <option value="none">Tidak ada Penambahan/Pengurangan</option>

                                        @error('indec_select')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row" id="more_wide">
                            <div class="col-md-6">
                                <div class="mb-3" id="indec_input">
                                    <label for="indec_wide" class="form-label">Luas Tambah/Kurang</label>
                                    <div class="input-group">
                                        <input type="number" min="0" class="form-control" name="indec_wide"
                                            id="indec_wide" placeholder="Masukkan Luas" value="0">
                                        <label class="input-group-text">m2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3" id="roompos_id">
                                    <label for="room_position_id" class="form-label">Ruang Tambahan</label>
                                    <select class="form-select select2 nosearch" name="room_position_id"
                                        id="room_position_id">
                                        <option value="" disabled>Pilih Ruang Utama Terlebih Dahulu
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="time_period" class="form-label">Jangka Waktu</label>
                            <div class="input-group">
                                <select class="form-select select2 @error('time_period') is-invalid @enderror"
                                    name="time_period" id="time_period">
                                    <option value="" disabled>Pilih Lantai Terlebih Dahulu</option>
                                </select>
                                <input type="number" min="0"
                                    class="form-control @error('term') is-invalid @enderror" name="term"
                                    id="term" placeholder="Termin" value="1">

                                @error('time_period')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                                @error('term')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="start_date">Tanggal Awal</label>
                                    <input type="date"
                                        class="form-control @error('start_date') is-invalid @enderror"
                                        name="start_date" id="start_date">

                                    @error('start_date')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="tenant_id" class="form-label">Tenant</label>
                                    <select class="form-select select2 @error('tenant_id') is-invalid @enderror"
                                        id="tenant_id" name="tenant_id">
                                        <option value="" disabled selected>Pilih Tenant</option>
                                        @foreach ($tenants as $tenant)
                                            <option value="{{ $tenant->id }}"
                                                {{ old('id') == $tenant->id ? 'selected' : null }}>
                                                {{ $tenant->company_name }} - {{ $tenant->user->name }}</option>
                                        @endforeach
                                    </select>

                                    @error('tenant_id')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="service_charge_type" class="form-label">Jenis Service
                                        Charge</label>
                                    <select
                                        class="form-select select2 nosearch @error('service_charge_type') is-invalid @enderror"
                                        name="service_charge_type" id="service_charge_type">
                                        <option value="" disabled selected>Pilih Jenis Service Charge</option>
                                        <option value="">Service Charge + Listrik - Rp 0 / Bulan</option>
                                        <option value="">Service Charge - Rp 0 / Bulan</option>
                                    </select>

                                    @error('service_charge_type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="ppn_type" class="form-label">PPN</label>
                                    <select
                                        class="form-select select2 nosearch @error('ppn_type') is-invalid @enderror"
                                        name="ppn_type" id="ppn_type">
                                        <option value="" disabled selected>Pilih PPN yang Dibayarkan</option>
                                        <option value="management">PPN Dibayarkan Manajemen</option>
                                        <option value="tenant">PPN Dibayarkan Tenant</option>
                                    </select>

                                    @error('ppn_type')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Line Telepon</label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="radio" id="line_yes" value="yes" name="line_option">
                                            <label for="line_yes"> Ya</label>

                                            @error('line_option')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" id="line_no" value="no" name="line_option">
                                            <label for="line_no"> Tidak</label>

                                            @error('line_option')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <p>| <strong>Rp 3.000.000</strong></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Materai</label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="radio" id="stamp_yes" value="yes" name="stamp_option">
                                            <label for="stamp_yes"> Ya</label>

                                            @error('stamp_option')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" id="stamp_no" value="no" name="stamp_option">
                                            <label for="stamp_no"> Tidak</label>

                                            @error('stamp_option')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group" id="input_stamp_amount">
                                                <input type="text" class="form-control" id="stamp_amount"
                                                    name="stamp_amount" placeholder="0">
                                                <label for="stamp_amount" class="input-group-text">x Rp 10.000</label>

                                                @error('stamp_amount')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">PPN</label>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <input type="radio" id="ppn_yes" name="ppn_option" value="10">
                                            <label for="ppn_yes"> 10%</label>

                                            @error('ppn_option')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-2">
                                            <input type="radio" id="ppn_no" name="ppn_option" value="11">
                                            <label for="ppn_no"> 11%</label>

                                            @error('ppn_option')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="total_period" id="total_period" placeholder="total period"
                            name="total_period">
                        <input type="hidden" name="time_unit" id="time_unit" placeholder="time unit"
                            name="time_unit">
                        <input type="hidden" name="line_deposit" id="line_deposit" placeholder="Line deposit">
                        <input type="hidden" name="stamp" id="stamp" placeholder="Harga Materai">
                        <input type="hidden" name="ppn" id="ppn" placeholder="Jumlah PPN">
                        <input type="hidden" name="room_wide" id="room_wide" placeholder="Total luas ruangan">
                        <input type="hidden" name="service_charge" id="service_charge"
                            placeholder="Total Service Charge">
                        <input type="hidden" name="term_payment" id="term_payment" placeholder="Harga per termin">
                        <input type="hidden" name="contract_payment" id="contract_payment"
                            placeholder="Harga sewa ruang">
                        <input type="hidden" name="contract_deposit" id="contract_deposit"
                            placeholder="Harga deposit sewa">
                        <input type="hidden" name="total_payment" id="total_payment" placeholder="Total harga">

                        <div class="mb-5">
                            <label for="description" class="form-label">Keterangan</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                placeholder="Masukkan Keterangan" rows="5"></textarea>

                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row mb-5">
                            <div class="card shadow">
                                <div class="card-header my-2 bg-transparent">
                                    <h5>
                                        <a data-bs-toggle="collapse" href="#collapseExtraService" role="button"
                                            aria-expanded="false" aria-controls="collapseExtraService">Additional
                                            Service <i class="fa fa-chevron-down"></i></a>
                                    </h5>
                                    <hr class="mb-2">
                                </div>
                                <div class="collapse" id="collapseExtraService">
                                    <div class="card-body">
                                        <div class="row">
                                            @foreach ($services as $service)
                                                <div class="col-md-2 me-5">
                                                    <div class="card" style="width: 14rem;">
                                                        <div class="card-body" style="padding: 0;">
                                                            <h5 class="card-title d-flex align-items-center">
                                                                <input type="checkbox" name="extra_service_check"
                                                                    id="extra_service_check">
                                                                <div class="ms-2">
                                                                    {{ $service->name }}
                                                                </div>
                                                            </h5>
                                                            <div class="input-group mb-2" id="group_extra_service">
                                                                <input type="text" class="form-control"
                                                                    id="extra_service_amount" placeholder="0">
                                                                <label for="extra_service_amount"
                                                                    class="input-group-text">{{ $service->unit }}</label>
                                                            </div>
                                                            <input type="hidden" class="form-control"
                                                                id="current_extra_service"
                                                                name="current_extra_service" placeholder="0"
                                                                value="{{ $service->price }}">
                                                            <input type="hidden" class="form-control"
                                                                id="additional_service" name="additional_service"
                                                                placeholder="0" value="0">
                                                            <p class="card-text">
                                                                Rp
                                                                {{ number_format($service->price) }} /
                                                                {{ $service->unit }}
                                                                <br>
                                                                {{ $service->description }} <br>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="text-center">
                                    <h3>Total Pembayaran</h3>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="table-responsive">
                                    <table class="table-striped table"></table>
                                </div>
                            </div>
                            <div class="col-md-6"></div>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('contracts.index') }}" type="button"
                                class="btn btn-danger w-md me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary w-md">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                //ambil data seluruh lantai
                $('#building').on('change', function() {
                    var building_id = $(this).val();
                    // console.log(building_id);
                    if (building_id) {
                        $.ajax({
                            type: "get",
                            url: "/ajax/buildings/" + building_id + "/floors",
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: "json",
                            success: function(data) {
                                // console.log(data);
                                if (data) {
                                    $('#floor').empty();
                                    $('#floor').append(
                                        '<option value="" selected disabled>Pilih Lantai</option>'
                                    );
                                    $.each(data, function(key, floor) {
                                        $('select[name="floor"]').append(
                                            '<option value="' + floor.id +
                                            '">' + floor.name + ' - Rp ' +
                                            floor
                                            .monthly_price + ' / m2/Bulan </option>'
                                        )
                                    });
                                }
                                // $('#id_floor').empty();
                            }
                        });
                    }
                    // $('#id_floor').empty();
                })

                //ambil data seluruh ruang
                $('#floor').on('change', function() {
                    var floor_id = $(this).val();
                    // console.log(floor_id);
                    if (floor_id) {
                        $.ajax({
                            type: "get",
                            url: "/ajax/floors/" + floor_id + "/rooms",
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: "json",
                            success: function(data) {
                                // console.log(data);
                                if (data) {
                                    $('#room_id').empty();
                                    $('#room_id').append(
                                        '<option value="" selected disabled>Pilih Ruang</option>'
                                    );
                                    $.each(data, function(key, room) {
                                        $('select[name="room_id"]').append(
                                            '<option value="' + room.id +
                                            '">' + room.name + ' - ' +
                                            room.code + ' - ' + room.wide +
                                            ' m2</option>'
                                        );
                                    });
                                }
                                // $('#id_floor').empty();
                            }
                        });
                    }
                    // $('#id_floor').empty();
                })

                //ambil detail data lantai
                $('#floor').on('change', function() {
                    var floor_id = $(this).val();
                    // console.log(floor_id);
                    if (floor_id) {
                        $.ajax({
                            type: "get",
                            url: "/ajax/floors/" + floor_id + "/getdetails",
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: "json",
                            success: function(data) {
                                // console.log(data);
                                if (data) {
                                    $('#time_period').empty();
                                    $('#time_period').append(
                                        '<option value="" selected disabled>Pilih Satuan</option>' +
                                        '<option value="1 days" data-months="1" data-time_unit="days" data-price="' +
                                        data
                                        .daily_price + '">1 Hari - Rp ' + data
                                        .daily_price +
                                        '</option>' +
                                        '<option value="1 weeks" data-months="7" data-time_unit="weeks" data-price="' +
                                        data
                                        .daily_price * 7 + '">1 Minggu - Rp ' + (data
                                            .daily_price) * 7 + '</option>' +
                                        '<option value="1 month" data-months="1" data-time_unit="month" data-price="' +
                                        data
                                        .monthly_price + '">1 Bulan - Rp ' + data
                                        .monthly_price + '</option>' +
                                        '<option value="2 month" data-months="2" data-time_unit="month" data-price="' +
                                        (data
                                            .monthly_price) * 2 + '">2 Bulan - Rp ' + (data
                                            .monthly_price) * 2 + '</option>' +
                                        '<option value="3 month" data-months="3" data-time_unit="month" data-price="' +
                                        (data
                                            .monthly_price) * 3 + '">3 Bulan - Rp ' + (data
                                            .monthly_price) * 3 + '</option>' +
                                        '<option value="4 month" data-months="4" data-time_unit="month" data-price="' +
                                        (data
                                            .monthly_price) * 4 + '">4 Bulan - Rp ' + (data
                                            .monthly_price) * 4 + '</option>' +
                                        '<option value="5 month" data-months="5" data-time_unit="month" data-price="' +
                                        (data
                                            .monthly_price) * 5 + '">5 Bulan - Rp ' + (data
                                            .monthly_price) * 5 + '</option>' +
                                        '<option value="6 month" data-months="6" data-time_unit="month" data-price="' +
                                        (data
                                            .monthly_price) * 6 + '">6 Bulan - Rp ' + (data
                                            .monthly_price) * 6 + '</option>' +
                                        '<option value="7 month" data-months="7" data-time_unit="month" data-price="' +
                                        (data
                                            .monthly_price) * 7 + '">7 Bulan - Rp ' + (data
                                            .monthly_price) * 7 + '</option>' +
                                        '<option value="8 month" data-months="8" data-time_unit="month" data-price="' +
                                        (data
                                            .monthly_price) * 8 + '">8 Bulan - Rp ' + (data
                                            .monthly_price) * 8 + '</option>' +
                                        '<option value="9 month" data-months="9" data-time_unit="month" data-price="' +
                                        (data
                                            .monthly_price) * 9 + '">9 Bulan - Rp ' + (data
                                            .monthly_price) * 9 + '</option>' +
                                        '<option value="10   data-months="10" data-time_unit="month" data-price="' +
                                        (data
                                            .monthly_price) * 10 + '">10 Bulan - Rp ' + (data
                                            .monthly_price) * 10 + '</option>' +
                                        '<option value="11 month" data-months="11" data-time_unit="month" data-price="' +
                                        (data
                                            .monthly_price) * 11 + '">11 Bulan - Rp ' + (data
                                            .monthly_price) * 11 + '</option>' +
                                        '<option value="1 year" data-months="12" data-time_unit="year" data-price="' +
                                        (data
                                            .monthly_price) * 12 + '">1 Tahun - Rp ' + (data
                                            .monthly_price) * 12 + '</option>'
                                    );
                                    $('#contract_deposit').val(data.monthly_price);
                                }
                                // $('#id_floor').empty();
                            }
                        });
                    }
                    // $('#id_floor').empty();
                })

                //ambil detail data/luas ruangan
                $('#room_id').on('change', function() {
                    var room_id = $(this).val();
                    // console.log(room_id);
                    if (room_id) {
                        $.ajax({
                            type: "get",
                            url: "/ajax/rooms/" + room_id + "/getdetails",
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: "json",
                            success: function(data) {
                                // console.log(data);
                                if (data) {
                                    $('#main_wide').val(data.wide);
                                    $('#room_wide').val(data.wide);
                                    $('#service_charge_type').empty();
                                    $('#service_charge_type').append(
                                        '<option value="" selected disabled>Pilih Jenis Service Charge</option>' +
                                        '<option value="' + data.service_charge_total +
                                        '">Listrik Pulomas Office Park - Rp ' +
                                        data.service_charge_total +
                                        ' / Bulan</option>' +
                                        '<option value="' + data.own_electricity_total +
                                        '">Listrik Sendiri - Rp ' +
                                        data.own_electricity_total +
                                        ' / Bulan</option>'
                                    );
                                }
                                // $('#id_floor').empty();
                            }
                        });
                    }
                    // $('#id_floor').empty();
                })

                //ambil data posisi ruangan berdasarkan ruang utama
                $('#room_id').on('change', function() {
                    var room_id = $(this).val();
                    // console.log(room_id);
                    if (room_id) {
                        $.ajax({
                            type: "get",
                            url: "/ajax/rooms/" + room_id + "/roompositions",
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: "json",
                            success: function(data) {
                                // console.log(data);
                                if (data) {
                                    $('#room_position_id').empty();
                                    $('#room_position_id').append(
                                        '<option value="" selected disabled>Pilih Ruangan</option>' +
                                        '<option value="' + data.front +
                                        '">' + data.front_room.name + ' - Depan - ' + data
                                        .front_room.wide + ' m2</option>' +
                                        '<option value="' + data.back +
                                        '">' + data.back_room.name + ' - Belakang - ' + data
                                        .front_room.wide + ' m2</option>' +
                                        '<option value="' + data.left +
                                        '">' + data.left_room.name + ' - Kiri - ' + data
                                        .front_room.wide + ' m2</option>' +
                                        '<option value="' + data.right +
                                        '">' + data.right_room.name + ' - Kanan - ' + data
                                        .front_room.wide + ' m2</option>'
                                    );
                                }
                                // $('#id_floor').empty();
                            }
                        });
                    }
                    // $('#id_floor').empty();
                })

                //ambil detail data/luas ruang tambahan
                $('#room_position_id').on('change', function() {
                    var room_id = $(this).val();
                    // console.log(room_id);
                    if (room_id) {
                        $.ajax({
                            type: "get",
                            url: "/ajax/rooms/" + room_id + "/getdetails",
                            data: {
                                '_token': '{{ csrf_token() }}'
                            },
                            dataType: "json",
                            success: function(data) {
                                // console.log(data);
                                if (data) {
                                    $('#indec_wide').val(data.wide);
                                }
                                // $('#id_floor').empty();
                            }
                        });
                    }

                    if ($('#indec_select').val() == 'plus') {
                        var contractDeposit = $('#contract_deposit').val()
                        var contractDepositPlus = contractDeposit * 2

                        $('#contract_deposit').val(contractDepositPlus)
                    }
                    // $('#id_floor').empty();
                })

                //set value contract_payment dan service_charge
                $('#time_period').on('change', function() {
                    // var timePeriod = $(this).val()
                    var dataPrice = $(this).find('option:selected').attr("data-price");
                    var dataMonths = $(this).find('option:selected').attr("data-months");
                    var timeUnit = $(this).find('option:selected').attr("data-time_unit");
                    var term = $('#term').val()
                    // console.log(dataPrice)
                    var contractPayment = parseInt(dataPrice) * parseInt(term)
                    $('#term_payment').val(dataPrice)
                    $('#contract_payment').val(contractPayment)
                    $('#time_unit').val(timeUnit)
                    $('#term').on('input', function() {
                        var term = $(this).val()
                        var contractPayment = parseInt(dataPrice) * parseInt(term)
                        var serviceChargeType = $('#service_charge_type').val()
                        console.log(serviceChargeType)
                        var totalMonths = parseInt(dataMonths) * parseInt(term)
                        var serviceCharge = parseInt(serviceChargeType) * parseInt(totalMonths)
                        $('#total_period').val(totalMonths)
                        $('#contract_payment').val(contractPayment)
                        $('#service_charge').val(serviceCharge)
                    })
                    $('#service_charge_type').on('change', function() {
                        var term = $('#term').val()
                        var serviceChargeType = $('#service_charge_type').val()
                        console.log(serviceChargeType)
                        var totalMonths = parseInt(dataMonths) * parseInt(term)
                        var serviceCharge = parseInt(serviceChargeType) * parseInt(totalMonths)
                        $('#service_charge').val(serviceCharge)
                    })
                })

                //set value wide_room berdasarkan main_wide dan indec_wide
                $(function() {
                    $('#indec_wide').on('input', function() {
                        var indecWide = $(this).val()
                        var mainWide = $('#main_wide').val()
                        if ($('#indec_select').val() == 'plus') {
                            var roomWide = parseInt(mainWide) + parseInt(indecWide)
                            $('#room_wide').val(roomWide)
                        } else if ($('#indec_select').val() == 'minus') {
                            var roomWide = parseInt(mainWide) - parseInt(indecWide)
                            $('#room_wide').val(roomWide)
                        }
                    })

                    $('#indec_select').on('change', function() {
                        var indecSelect = $(this).val()
                        var mainWide = $('#main_wide').val()
                        if (indecSelect == '') {
                            var roomWide = parseInt(mainWide)
                            $('#room_wide').val(roomWide)
                        }
                    })
                })

                //set value line_deposit berdasarkan pilihan
                $("input[name$='line_option']").on('click', function() {
                    // console.log($(this).val());
                    if ($(this).val() == 'yes') {
                        $('#line_deposit').val(3000000);
                    } else {
                        $('#line_deposit').val(0);
                    }
                });

                //set value materai berdasarkan pilihan
                $("input[name$='stamp_option']").on('click', function() {
                    if ($(this).val() == 'yes') {
                        $("#stamp_amount").on('input', function() {
                            var amount = $(this).val()
                            // console.log($(this).val());
                            var stamp = parseInt(amount) * 10000
                            $('#stamp').val(stamp);
                        });
                    } else {
                        $('#stamp').val(0);
                    }
                })

                //set value additional service
                $('#extra_service_amount').on('input', function() {
                    var contractPayment = $('#contract_payment').val()
                    var serviceCharge = $('#service_charge').val()
                    var extraServiceAmount = $(this).val()
                    var currentExtraService = $('#current_extra_service').val()
                    var extraService = parseInt(currentExtraService) * parseInt(extraServiceAmount)
                    $('#additional_service').val(extraService)
                    if (extraServiceAmount == 0) {
                        $('#additional_service').val(0)
                    }
                    if ($("input[name$='ppn_option']").val() == '10') {
                        console.log($(this).val())
                        var ppn = (parseInt(contractPayment) + parseInt(serviceCharge) + parseInt(
                            extraService)) * (10 / 100)
                        $('#ppn').val(ppn)
                    } else if ($("input[name$='ppn_option']").val() == '11') {
                        var ppn = (parseInt(contractPayment) + parseInt(serviceCharge) + parseInt(
                            extraService)) * (11 / 100)
                        $('#ppn').val(ppn)
                    }
                })

                //set value ppn berdasarkan pilihan
                $("input[name$='ppn_option']").on('click', function() {
                    var contractPayment = $('#contract_payment').val()
                    var serviceCharge = $('#service_charge').val()
                    var extraService = $('#additional_service').val()
                    if ($(this).val() == '10') {
                        var ppn = (parseInt(contractPayment) + parseInt(serviceCharge)) * (10 / 100)
                        $('#ppn').val(ppn)
                    } else if ($(this).val() == '11') {
                        var ppn = (parseInt(contractPayment) + parseInt(serviceCharge)) * (11 / 100)
                        $('#ppn').val(ppn)
                    }
                })

                //set value total payment
                $('#start_date').on('change', function() {
                    var contractPayment = $('#contract_payment').val()
                    var serviceCharge = $('#service_charge').val()
                    var additionalService = $('#additional_service').val()
                    var ppn = $('#ppn').val()
                    var contractDeposit = $('#contract_deposit').val()
                    var lineDeposit = $('#line_deposit').val()
                    var stamp = $('#stamp').val()

                    var totalPayment = parseInt(contractPayment) + parseInt(serviceCharge) + parseInt(
                        additionalService) + parseInt(ppn) + parseInt(contractDeposit) + parseInt(
                        lineDeposit) + parseInt(stamp)

                    $('#total_payment').val(totalPayment)
                })

                //show atau hide inputan kode booking
                $(function() {
                    $('#input_booking_code').hide();
                    $('#booking_status').on('change', function() {
                        // console.log($(this).val());
                        if ($(this).val() == 1) {
                            $('#input_booking_code').show();
                        } else {
                            $('#input_booking_code').hide();
                        }
                    });
                })

                //show atau hide inputan tambah/kurang ruangan
                $(function() {
                    $('#indec_input').hide();
                    $('#roompos_id').hide();
                    $('#indec_select').on('change', function() {
                        // console.log($(this).val());
                        if ($(this).val() == 'plus') {
                            $('#indec_input').show();
                            $('#roompos_id').show();
                        } else if ($(this).val() == 'minus') {
                            $('#indec_input').show();
                            $('#roompos_id').hide();
                        } else {
                            $('#indec_input').hide();
                            $('#roompos_id').hide();
                        }
                    });
                })

                //show atau hide inputan materai
                $(function() {
                    $('#input_stamp_amount').hide();
                    $("input[name$='stamp_option']").on('click', function() {
                        // console.log($(this).val());
                        if ($(this).val() == 'yes') {
                            $('#input_stamp_amount').show();
                        } else {
                            $('#input_stamp_amount').hide();
                        }
                    });
                })

                //show hide additional service
                $(function() {
                    $("#group_extra_service").hide();
                    $("#extra_service_check").click(function() {
                        if ($(this).is(":checked")) {
                            $("#group_extra_service").show();
                        } else {
                            $("#group_extra_service").hide();
                        }
                    });
                });
            });
        </script>
    @endpush
</x-app-layout>
