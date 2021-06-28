<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CovidCases;
use App\Models\bdcases;
use App\Models\smec_cases;
use App\Models\global_cases;
use App\Models\gov_Update;
use App\Models\smec_Update;
use App\Models\contacts;
use App\Models\links;
use App\Models\vaccination_status;

use Illuminate\Support\Facades\DB;

class CovidCasesController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        if ($request->has('bdcases')) {

            $validated = $request->validate([
                'infectionRate' => 'required|numeric',
                'TotalInfectionRate' => 'required|numeric',
                'recoveryRate' => 'required|numeric',
                'deathRate' => 'required|numeric',
            ]);

            if ($validated) {
                $bdcases = new bdcases;

                $bdcases->country_case_name = $request->country_cases;
                $bdcases->activeCases = $request->activeCases;
                $bdcases->totalInBD = $request->total;
                $bdcases->detectInlast24hours = $request->detect;
                $bdcases->deathInlast24hours = $request->death;
                $bdcases->totalDeath = $request->totalDeath;
                $bdcases->healedInlast24hours = $request->healed;
                $bdcases->totalHealed = $request->TotalHealed;
                $bdcases->infectionRate24hours = $request->infectionRate;
                $bdcases->infectionRateTotal = $request->TotalInfectionRate;
                $bdcases->recoveryRate = $request->recoveryRate;
                $bdcases->deathRate = $request->deathRate;
                $bdcases->save();

                return redirect('/admin');
            } else
                return redirect('/admin');
        }

        if ($request->has('smecCases')) {

            $smec_cases = new smec_cases;

            $smec_cases->activeCasesSmec = $request->activeCasesSmec;
            $smec_cases->totalInSmec = $request->totalInSmec;
            $smec_cases->detectInlast24hours = $request->detectInlast24hours;
            $smec_cases->deathInlast24hours = $request->deathInlast24hours;
            $smec_cases->totalDeath = $request->totalDeath;
            $smec_cases->healedInlast24hours = $request->healedInlast24hours;
            $smec_cases->totalHealed = $request->totalHealed;

            $smec_cases->save();

            return redirect('/admin');
        }

        if ($request->has('globalCases')) {

            $global_cases = new global_cases;

            $global_cases->totalInWorld = $request->totalInWorld;
            $global_cases->detectInlast24hours = $request->detectInlast24hours;
            $global_cases->deathInlast24hours = $request->deathInlast24hours;
            $global_cases->totalDeath = $request->totalDeath;

            $global_cases->save();

            return redirect('/admin');
        }

        if ($request->has('govUpdate')) {

            $govUpdate = new gov_Update;

            $govUpdate->govUpdate = $request->summernote;

            $govUpdate->save();

            return redirect('/admin');
        }

        if ($request->has('smecUpdate')) {

            $smecUpdate = new smec_Update;

            $smecUpdate->smecUpdatee = $request->summernotee;

            $smecUpdate->save();

            return redirect('/admin');
        }

        if ($request->has('contacts')) {

            $contacts = new contacts;

            $contacts->name = $request->name;
            $contacts->designation = $request->designation;
            $contacts->email = $request->email;
            $contacts->phone = $request->phone;
            $contacts->whatsapp = $request->whatsapp;

            $contacts->save();
            return redirect('/admin');
        }

        if ($request->has('links')) {

            $links = new links;

            $links->title = $request->title;

            $links->link = $request->link;

            $links->save();

            return redirect('/admin');
        } else
            return redirect('/admin');
    }

    public function check(Request $request)
    {

        $vaccination = DB::table('vaccination_status')->where('country_name', '=', $request['country'])->latest('id')->get();
        return response()->json([$vaccination]);
    }


    public function countryToggle(Request $request)
    {

        $country_cases = DB::table('bdcases')->where('country_case_name', '=', $request['country_cases'])->latest('id')->get();
        return response()->json([$country_cases]);
    }

    public function index()
    {
        $data = contacts::all();

        $contacts = DB::table('contacts')->latest('id')->first();

        $smec_cases = DB::table('smec_cases')->latest('id')->first();
        $global_cases = DB::table('global_cases')->latest('id')->first();
        $govUpdate = DB::table('gov_update')->latest('id')->first();
        $smecUpdate = DB::table('smec_update')->latest('id')->first();
        $links = DB::table('links')->latest('id')->first();


        $bdcases = DB::table('bdcases')->where('country_case_name', '=', 'Bangladesh')->latest('id')->first();

        $vaccination = DB::table('vaccination_status')->where('country_name', '=', 'Bangladesh')->latest('id')->first();



        // dd($latest);
        return view('welcome', ['vaccination' => $vaccination, 'links' => $links, 'contacts' => $contacts, 'bdcases' => $bdcases, 'smec_cases' => $smec_cases, 'global_cases' => $global_cases, 'govUpdate' => $govUpdate, 'smecUpdate' => $smecUpdate]);
    }

    public function contacts()
    {
        // $contacts = DB::table('contacts')->latest('id')->first();

        $contacts = contacts::all();

        return view('contacts', ['contacts' => $contacts]);
    }

    public function deleteContact($id)
    {
        $data = contacts::find($id);
        $data->delete();
        return redirect('/con');
    }

    public function updateContact($id)
    {
        $data = contacts::find($id);

        return view('update', ['contacts' => $data]);
    }

    public function update(Request $request)
    {
        if ($request->has('contacts')) {
            $data = contacts::find($request->id);

            $data->name = $request->name;
            $data->designation = $request->designation;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->whatsapp = $request->whatsapp;

            $data->save();
            return redirect('/con');
        }

        if ($request->has('links')) {

            // dd($request->all());

            $data = links::find($request->id);

            $data->link = $request->link;
            $data->title = $request->title;

            $data->save();
            return redirect('/links');
        }
    }

    public function links()
    {
        $links = links::all();

        return view('links', ['links' => $links]);
    }


    public function deleteLink($id)
    {

        $data = links::find($id);
        $data->delete();
        return redirect('/links');
    }

    public function updateLink($id)
    {
        $link = links::find($id);

        return view('linkUpdate', ['links' => $link]);
    }



    public function updateCases(Request $request)
    {

        if ($request->has('bdupdate')) {

            // dd($request);

            $bdcases = bdcases::find($request->id);

            $bdcases->totalInBD = $request->total;
            $bdcases->activeCases = $request->activeCases;
            $bdcases->detectInlast24hours = $request->detect;
            $bdcases->deathInlast24hours = $request->death;
            $bdcases->totalDeath = $request->totalDeath;
            $bdcases->healedInlast24hours = $request->healed;
            $bdcases->totalHealed = $request->TotalHealed;
            $bdcases->infectionRate24hours = $request->infectionRate;
            $bdcases->infectionRateTotal = $request->TotalInfectionRate;
            $bdcases->recoveryRate = $request->recoveryRate;
            $bdcases->deathRate = $request->deathRate;
            $bdcases->save();
            return redirect('/admin');
        }
        if ($request->has('smecupdate')) {

            $smec_cases = smec_cases::find($request->id);

            $smec_cases->activeCasesSmec = $request->activeCasesSmec;
            $smec_cases->totalInSmec = $request->totalInSmec;
            $smec_cases->detectInlast24hours = $request->detectInlast24hours;
            $smec_cases->deathInlast24hours = $request->deathInlast24hours;
            $smec_cases->totalDeath = $request->totalDeath;
            $smec_cases->healedInlast24hours = $request->healedInlast24hours;
            $smec_cases->totalHealed = $request->totalHealed;

            $smec_cases->save();
            return redirect('/admin');
        }
        if ($request->has('globalupdate')) {


            $global_cases = global_cases::find($request->id);

            $global_cases->totalInWorld = $request->totalInWorld;
            $global_cases->detectInlast24hours = $request->detectInlast24hours;
            $global_cases->deathInlast24hours = $request->deathInlast24hours;
            $global_cases->totalDeath = $request->totalDeath;

            $global_cases->save();

            return redirect('/admin');
        }

        if ($request->has('govUpdate_update')) {


            $govUpdate = gov_Update::find($request->id);
            $govUpdate->govUpdate = $request->summernote;

            $govUpdate->save();

            return redirect('/admin');
        }


        if ($request->has('vaccinationUpdate')) {

            $vaccineUpdate = vaccination_status::find($request->id);


            $vaccineUpdate->first_dose_taken = $request->firstdose;
            $vaccineUpdate->both_dose_taken = $request->bothdose;
            $vaccineUpdate->above_45 = $request->above45;
            $vaccineUpdate->below_45 = $request->below45;

            $vaccineUpdate->save();

            return redirect('/admin');
        }

        return redirect('/admin');
    }


    public function vaccinationStatus(Request $request)
    {

        if ($request->has('vaccinationSubmit')) {

            $validated = $request->validate([
                'country' => 'required|string',
                'firstdose' => 'required|numeric',
                'bothdose' => 'required|numeric',
                'above45' => 'required|numeric',
                'below45' => 'required|numeric',
            ]);

            if ($validated) {
                $vaccination_status = new vaccination_status;

                $vaccination_status->country_name = $request->country;
                $vaccination_status->first_dose_taken = $request->firstdose;
                $vaccination_status->both_dose_taken = $request->bothdose;
                $vaccination_status->above_45 = $request->above45;
                $vaccination_status->below_45 = $request->below45;

                $vaccination_status->save();

                return redirect('/admin');
            }
        }

        return redirect('/admin')->withMessage("Error");
    }
}
