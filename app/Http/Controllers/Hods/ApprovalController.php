<?php

namespace App\Http\Controllers\Hods;

use App\Models\User;
use App\Models\Contract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Approval;

class ApprovalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::with(['room.floor.building', 'tenant.user', 'approval'])->withCount('billing')->latest()->paginate(10);

        return view('hods.approvals.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'status' => ['required'],
            'description' => ['required'],
            'user_id' => ['required'],
        ]);

        $approval = Approval::find($request->id);
        $approval->status = $request->status;
        $approval->description = $request->description;
        $approval->user_id = $request->user_id;
        $approval->update();

        if($request->status == 'approved') {
            return redirect()->route('approvals.index')->with('success', 'Kontrak Sewa berhasil disetujui.');
        } elseif ($request->status == 'rejected') {
            return redirect()->route('approvals.index')->with('danger', 'Kontrak Sewa berhasil ditolak.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contract = Contract::with(['room.floor.building', 'tenant.user'])->find($id);

        $users = User::role('hod')->get();

        return view('hods.approvals.show', compact('contract', 'users'));
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

    public function createBilling($id)
    {
        $contract = Contract::with(['room.floor.building', 'tenant.user'])->find($id);

        return view('hods.billings.create', compact('contract'));
    }
}
