<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;

class HodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        if ($keyword == 'aktif') {
            $keyword = 'active';
        }
        if ($keyword == 'tidak aktif') {
            $keyword = 'inactive';
        }

        $users = User::with('roles')->get();
        $hods = User::where('name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('phone_number', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('status', 'LIKE', $keyword)
                        ->role('hod')
                        ->latest()->paginate(10);

        return view('admins.users.hods.index', compact('users', 'hods'));
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
        $user = User::find($request->id);
        if ($user == true) {
            $user->assignRole('hod');
        }
        elseif ($user == false) {
            return back()->with('errors', 'Tidak ada user yang terpilih.');
        }

        return back()->with('success', 'Berhasil menambahkan role kepala divisi pada user.');
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
        $hod = User::find($id);
        // dd($user);
        return view('admins.users.hods.edit', compact('hod'));
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
        $validated = $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email:dns'],
            'phone_number' => ['required', 'min:10'],
            'status' => ['required'],
        ]);

        $hod = User::find($id);
        $hod->name = $request->name;
        $hod->phone_number = $request->phone_number;
        $hod->status = $request->status;

        $hod->update();

        return redirect()->route('hods.index')->with('success', 'Data user kepala divisi berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hod = User::find($id);
        $hod->removeRole('hod');

        return back()->with('success', 'Role kepala divisi berhasil dihapus dari user ini.');
    }
}
