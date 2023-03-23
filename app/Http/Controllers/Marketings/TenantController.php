<?php

namespace App\Http\Controllers\Marketings;

use App\Models\User;
use App\Models\Industry;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LeadManagement;
use App\Models\Tenant;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lead_managements = LeadManagement::with('industries')->get();
        $tenants = Tenant::with('user')->latest()->paginate(10);

        return view('marketings.tenants.index', compact('lead_managements', 'tenants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $industries = Industry::all();

        return view('marketings.tenants.create', compact('industries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userValidated = $request->validate([
            'email' => ['required', 'unique:users'],
            'password' => ['required'],
            'name' => ['required'],
            'phone_number' => ['required'],
        ]);

        $userValidated['password'] = bcrypt($userValidated['password']);

        $user = User::create($userValidated);
        $user->assignRole('tenant');

        $request->validate([
            'address' => ['required'],
            'company_name' => ['required'],
            'company_phone' => ['required'],
            'industry' => ['required'],
        ]);

        $tenant = new Tenant([
            'address' => $request->address,
            'company_name' => $request->company_name,
            'company_phone' => $request->company_phone,
            'user_id' => $user->id,
        ]);

        $tenant->save();

        $industries = $request->industry;
        $tenant->industries()->sync($industries);

        return redirect()->route('tenants.index')->with('success', 'Data tenant berhasil ditambahkan');
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
