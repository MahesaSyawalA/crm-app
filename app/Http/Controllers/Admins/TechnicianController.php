<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')->get();
        $technicians = User::role('technician')
                        ->latest()->paginate(10);

        return view('admins.users.technicians.index', compact('users', 'technicians'));
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
            $user->assignRole('marketing');
        }
        elseif ($user == false) {
            return back()->with('errors', 'Tidak ada user yang terpilih.');
        }

        return back()->with('success', 'Berhasil menambahkan role teknik pada user.');
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
        $technician = User::find($id);
        // dd($user);
        return view('admins.users.technicians.edit', compact('technician'));
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

        $technician = User::find($id);
        $technician->name = $request->name;
        $technician->phone_number = $request->phone_number;
        $technician->status = $request->status;

        $technician->update();

        return redirect()->route('technicians.index')->with('success', 'Data user teknik berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $technician = User::find($id);
        $technician->delete();

        return back()->with('success', ' Data user teknik berhasil dihapus.');
    }
}
