<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gov_Update;
use App\Models\smec_Update;
use App\Models\contacts;
use App\Models\links;
use Illuminate\Support\Facades\DB;

class UserViewController extends Controller
{

    public function index()
    {
        $data = contacts::all();
        $links = links::all();

        $govUpdate = DB::table('gov_update')->latest('id')->first();
        $smecUpdate = DB::table('smec_update')->latest('id')->first();


        $bdcases = DB::table('bdcases')->latest('id')->first();
        $smec_cases = DB::table('smec_cases')->latest('id')->first();
        $global_cases = DB::table('global_cases')->latest('id')->first();



        return view('/user/userView', ['govUpdate' => $govUpdate, 'smecUpdate' => $smecUpdate, 'contacts' => $data, 'links' => $links, 'bdcases' => $bdcases, 'smec_cases' => $smec_cases, 'global_cases' => $global_cases]);
    }
}
