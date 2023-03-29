<?php

namespace App\Http\Controllers\Marketings;

use App\Models\Floor;
use App\Models\Tenant;
use App\Models\Service;
use App\Models\Building;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contract;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::with(['room.floor.building', 'tenant.user'])->latest()->paginate(10);

        return view('marketings.contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::withCount('floors')->get();
        $tenants = Tenant::with('user')->get();
        $services = Service::all();

        return view('marketings.contracts.create', compact('buildings', 'tenants', 'services'));
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_status' => ['required'],
            'building' => ['required'],
            'floor' => ['required'],
            'room_id' => ['required'],
            'main_wide' => ['required'],
            'indec_select' => ['required'],
            'time_period' => ['required'],
            'term' => ['required'],
            'start_date' => ['required'],
            'term_payment' => ['required'],
            'contract_payment' => ['required'],
            'service_charge_type' => ['required'],
            'ppn_type' => ['required'],
            'ppn_option' => ['required'],
            'line_option' => ['required'],
            'stamp_option' => ['required'],
            'stamp_amount' => ['required'],
            'description' => ['required'],
            'tenant_id' => ['required'],
        ],
        [
            'room_id.required' => 'The room field is required.',
            'tenant_id.required' => 'The customer field is required.'
        ]);


        if ($request->time_unit == 'days') {
            $end_date = date('Y-m-d', strtotime('+'.$request->total_period.' days', strtotime( $request->start_date )));
        } elseif ($request->time_unit == 'weeks') {
            $end_date = date('Y-m-d', strtotime('+'.$request->total_period.' days', strtotime( $request->start_date )));
        } elseif ($request->time_unit == 'month') {
            $end_date = date('Y-m-d', strtotime('+'.$request->total_period.' month', strtotime( $request->start_date )));
        } elseif ($request->time_unit == 'year') {
            $end_date = date('Y-m-d', strtotime('+'.$request->total_period.' year', strtotime( $request->start_date )));
        }

        $total_payment = $request->contract_payment + $request->service_charge + $request->additional_service +
                        $request->ppn + $request->contract_deposit + $request->line_deposit + $request->stamp;

        $room = new Contract([
            'booking_status' => $request->booking_status,
            'booking_code' => $request->booking_code,
            'room_wide' => $request->room_wide,
            'time_period' => $request->time_period,
            'term' => $request->term,
            'start_date' => $request->start_date,
            'end_date' => $end_date,
            'term_payment' => $request->term_payment,
            'contract_payment' => $request->contract_payment,
            'service_charge' => $request->service_charge,
            'ppn_type' => $request->ppn_type,
            'ppn' => $request->ppn,
            'contract_deposit' => $request->contract_deposit,
            'line_deposit' => $request->line_deposit,
            'stamp' => $request->stamp,
            'description' => $request->description,
            'additional_service' => $request->additional_service,
            'total_payment' => $total_payment,
            'room_id' => $request->room_id,
            'room_position_id' => $request->room_position_id,
            'tenant_id' => $request->tenant_id,
            'service_id' => $request->service_id
        ]);
        $room->save();

        return redirect()->route('contracts.index')->with('success', ' Data kontrak sewa berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
