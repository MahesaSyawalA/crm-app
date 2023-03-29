<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FinanceController extends Controller
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
        $finances = User::where('name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('phone_number', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('status', 'LIKE', $keyword)
                        ->role('finance')
                        ->latest()->paginate(10);

        return view('admins.users.finances.index', compact('users', 'finances'));
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
            $user->assignRole('finance');
        }
        elseif ($user == false) {
            return back()->with('errors', 'Tidak ada user yang terpilih.');
        }

        return back()->with('success', 'Berhasil menambahkan role keuangan pada user.');
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
        $finance = User::find($id);
        // dd($user);
        return view('admins.users.finances.edit', compact('finance'));
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

        $finance = User::find($id);
        $finance->name = $request->name;
        $finance->phone_number = $request->phone_number;
        $finance->status = $request->status;

        $finance->update();

        return redirect()->route('finances.index')->with('success', 'Data user keuangan berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $finance = User::find($id);
        $finance->removeRole('finance');

        return back()->with('success', 'Role keuangan berhasil dihapus dari user ini.');
    }
}
