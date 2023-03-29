<?php

namespace App\Http\Controllers\Admins;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarketingController extends Controller
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
        $marketings = User::where('name', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('email', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('phone_number', 'LIKE', '%' . $keyword . '%')
                        ->orWhere('status', 'LIKE', $keyword)
                        ->role('marketing')
                        ->latest()->paginate(10);

        return view('admins.users.marketings.index', compact('users', 'marketings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

        return back()->with('success', 'Berhasil menambahkan role marketing pada user.');
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
        $marketing = User::find($id);
        // dd($user);
        return view('admins.users.marketings.edit', compact('marketing'));
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

        $marketing = User::find($id);
        $marketing->name = $request->name;
        $marketing->phone_number = $request->phone_number;
        $marketing->status = $request->status;

        $marketing->update();

        return redirect()->route('marketings.index')->with('success', 'Data user marketing berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $marketing = User::find($id);
        $marketing->removeRole('marketing');

        return back()->with('success', 'Role marketing berhasil dihapus dari user ini.');
    }
}
