<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gov_Update;
use App\Models\smec_Update;
use App\Models\country;
use App\Models\contacts;
use App\Models\links;
use App\Models\bdcases;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use App\Models\vaccination_status;



class UserViewController extends Controller
{

    public function index()
    {
        $data = contacts::all();
        $links = links::all();

        $govUpdate = DB::table('gov_update')->latest('id')->first();
        $smecUpdate = DB::table('smec_update')->latest('id')->first();


        $bdcases = bdcases::all()->sortByDesc('updated_at')->first();
        $smec_cases = DB::table('smec_cases')->latest('id')->first();
        $global_cases = DB::table('global_cases')->latest('id')->first();
        $vac = vaccination_status::all()->sortByDesc('updated_at')->first();
        $vacSum = vaccination_status::all();

        // $bdcasestime = bdcases::all()->sortByDesc('updated_at')->first();
        // $vacTime = vaccination_status::all()->sortByDesc('updated_at')->first();

        // dd($bdcasestime);
        // $covid_cases = array();
        // $vaccine = array();

        $bb = array();

        $sum1 = 0;
        $sum2 = 0;
        $sumAbove45 = 0;
        $sumBelow45 = 0;

        // dd(gettype($vac->first_dose_taken));

        // foreach($vacSum as $doses){

            // $sum1 = $sum1 + $doses->first_dose_taken;
            // $sum2 = $sum2 + $doses->both_dose_taken;
            // $sumAbove45 = $sumAbove45 + $doses->above_45;
            // $sumBelow45 = $sumBelow45 + $doses->below_45;

        // }




        $country = country::all()->sortBy('country_name');

        $result = null;
        $i = 0;
        foreach ($country as $item) {
            $covid_cases = array();
            $vaccine = array();
            $covid_cases[] = DB::table('bdcases')->where('country_case_name', '=', $item->country_name)->latest('id')->first();
            $vaccine[] = DB::table('vaccination_status')->where('country_name', '=', $item->country_name)->latest('id')->first();


            if($vaccine[0] != null){
            $sum1 = $sum1 + $vaccine[0]->first_dose_taken;
            $sum2 = $sum2 + $vaccine[0]->both_dose_taken;
            $sumAbove45 = $sumAbove45 + $vaccine[0]->above_45;
            $sumBelow45 = $sumBelow45 + $vaccine[0]->below_45;}

            // dd($vaccine);

            $bb[$i] = Arr::flatten(Arr::add($covid_cases, 'vv', $vaccine));
            $i++;
        }

        // foreach ($bb as $doses) {

        //     dd($bb);


        //     $sum1 = $sum1 + $doses[1]->first_dose_taken;
        //     $sum2 = $sum2 + $doses[1]->both_dose_taken;
        // }

        // dd($sum1);

        return view('/user/userView', ['sum1'=>$sum1, 'sum2' => $sum2, 'sumAbove45'=> $sumAbove45, 'sumBelow45'=>$sumBelow45,'vac' => $vac, 'bb' => $bb, 'govUpdate' => $govUpdate, 'smecUpdate' => $smecUpdate, 'contacts' => $data, 'links' => $links, 'bdcases' => $bdcases, 'smec_cases' => $smec_cases, 'global_cases' => $global_cases]);
    }
}
