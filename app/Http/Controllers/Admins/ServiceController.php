<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::role(['marketing', 'technician'])->get();

        $services = Service::latest()->paginate(10);

        return view('admins.services.index', compact('users', 'services'));
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
        $validated = $request->validate([
            'name' => ['required'],
            'unit' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'user_id' => ['required'],
        ]);

        Service::create($validated);

        return back()->with('success', 'Servis berhasil ditambahkan.');
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
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'unit' => ['required'],
            'price' => ['required'],
            'description' => ['required'],
            'user_id' => ['required'],
        ]);

        $service = Service::find($request->id);
        $service->name = $request->name;
        $service->unit = $request->unit;
        $service->price = $request->price;
        $service->description = $request->description;
        $service->user_id = $request->user_id;

        $service->update();

        return back()->with('success', 'Data servis berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();

        return back()->with('success', 'Data servis berhasil dihapus.');
    }
}
