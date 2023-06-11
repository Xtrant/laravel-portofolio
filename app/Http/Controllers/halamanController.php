<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class halamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = halaman::orderBy('judul', 'asc') ->get();
        return view('dashboard.halaman.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.halaman.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Session::flash('title', $request ->title);
        Session::flash('content',  $request ->content);

        $request->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Title must be filled',
                'content.requided' => 'Content must be filled' 
            ]
            );

            $data = [
                'judul' => $request ->title,
                'isi' => $request ->content
            ];
            halaman::create($data);

            return redirect()->route('halaman.index')->with('success', 'Successfully Added Data');
            
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
        $data = halaman::where('id', $id)->first();
        return view('dashboard.halaman.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
                'title' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Title must be filled',
                'content.requided' => 'Content must be filled' 
            ]
            );

            $data = [
                'judul' => $request ->title,
                'isi' => $request ->content
            ];
            halaman::where('id', $id) -> update($data);

            return redirect()->route('halaman.index')->with('success', 'Successfully Updated Data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        halaman::where('id', $id) -> delete();
        return redirect()->route('halaman.index')->with('success', 'Successfully Deleted Data');
        
    }
}
