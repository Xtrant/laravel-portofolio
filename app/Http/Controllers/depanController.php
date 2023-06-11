<?php

namespace App\Http\Controllers;

use App\Models\halaman;
use App\Models\riwayat;
use Illuminate\Http\Request;

class depanController extends Controller
{
    public function index()
    {
        $education_data = riwayat::get();
        
        $interest_id = get_meta_value("_halaman_interest");
        $interest_page = halaman::where('id', $interest_id)->first();

        $award_id = get_meta_value("_halaman_award");
        $award_page = halaman::where('id', $award_id)->first();

        return view('depan.index')->with([
            'education' => $education_data,
            'halamanInterest' => $interest_page,
            'halamanAward' => $award_page
        ]);
    }
}
