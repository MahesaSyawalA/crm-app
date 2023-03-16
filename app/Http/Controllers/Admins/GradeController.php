<?php

namespace App\Http\Controllers\Admins;

use App\Models\Grade;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->search;
        $grades = Grade::where('code', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('score', 'LIKE', '%' . $keyword . '%')
                    ->orderBy('code', 'asc')
                    ->paginate(10);

        return view('admins.grades.index', compact('grades'));
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
            'code' => ['required', 'unique:grades'],
            'score' => ['required'],
        ]);

        Grade::create($validated);

        return back()->with('success', 'Grade berhasil ditambahkan.');
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
            'code' => ['required'],
            'score' => ['required'],
        ]);

        $grade = Grade::find($request->id);
        $grade->code = $request->code;
        $grade->score = $request->score;

        $grade->update();

        return back()->with('success', 'Data grade berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $grade = Grade::find($id);
        $grade->delete();

        return back()->with('success', 'Data grade berhasil dihapus.');
    }
}
