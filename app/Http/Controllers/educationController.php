<?php

namespace App\Http\Controllers;

use App\Models\riwayat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class educationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= riwayat::orderBy('tahun_akhir', 'desc')->get();
        return view('dashboard.education.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.education.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        Session::flash('title', $request ->title);
        Session::flash('info1', $request ->info1);
        Session::flash('info2', $request ->info2);
        Session::flash('info3', $request ->info3);
        Session::flash('tahun_mulai', $request ->tahun_mulai);
        Session::flash('tahun_akhir', $request ->tahun_akhir);
        Session::flash('content',  $request ->content);

        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'tahun_mulai' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Education Level must be filled',
                'info1.required' => 'Institution Name must be filled',
                'tahun_mulai.required' => 'Tahun Mulai must be filled',
                'content.requided' => 'Content must be filled' 
            ]
            );

            $data = [
                'judul' => $request ->title,
                'info1' => $request -> info1,
                'info2' => $request -> info2,
                'info3' => $request ->info3,
                'tahun_mulai' => $request -> tahun_mulai,
                'tahun_akhir' => $request -> tahun_akhir,
                'isi' => $request ->content
            ];
            riwayat::create($data);

            return redirect()->route('education.index')->with('success', 'Successfully Added Education');
    

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = riwayat::where('id', $id)->first();
        return view('dashboard.education.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'info1' => 'required',
                'tahun_mulai' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Education Level must be filled',
                'info1.required' => 'Institution Name must be filled',
                'tahun_mulai.required' => 'Tahun Mulai must be filled',
                'content.requided' => 'Content must be filled' 
            ]
            );

            $data = [
                'judul' => $request ->title,
                'info1' => $request -> info1,
                'info2' => $request -> info2,
                'info3' => $request ->info3,
                'tahun_mulai' => $request -> tahun_mulai,
                'tahun_akhir' => $request -> tahun_akhir,
                'isi' => $request ->content
            ];
            riwayat::where('id', $id)->update($data);

            return redirect()->route('education.index')->with('success', 'Successfully Update Education');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        riwayat::where('id', $id ) ->delete();
        return redirect()->route('education.index')->with('success', 'Successfully Deleted Education' );
    }
}
