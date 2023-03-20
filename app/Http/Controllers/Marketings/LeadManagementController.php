<?php

namespace App\Http\Controllers\Marketings;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\LeadManagement;
use Illuminate\Http\Request;

class LeadManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('marketings.leadmanagements.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::all();

        return view('marketings.leadmanagements.create', compact('industries'));
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
            'name' => ['required'],
            'phone_number' => ['required'],
            'ktp_number' => ['required', 'unique:lead_managements'],
            'address' => ['required'],
            'ktp_image' => ['image', 'file', 'max:2048'],
            'potential' => ['required'],
            'company_name' => ['required'],
            'company_phone' => ['required'],
            'industry' => ['required'],
        ]);

        $lead_management = new LeadManagement([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'ktp_number' => $request->ktp_number,
            'address' => $request->address,
            'potential' => $request->potential,
            'company_name' => $request->company_name,
            'company_phone' => $request->company_phone,
        ]);

        if ($request->file('ktp_image')) {
            $path = $request->file('ktp_image')->store('images/ktp');
            $splits = explode('/', $path);

            $lead_management->ktp_image = end($splits);
        }

        $lead_management->save();

        $industries = $request->industry;
        $lead_management->industries()->sync($industries);

        return redirect()->route('leadmanagements.index')->with('success', 'Data lead management berhasil ditambahkan.');
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
