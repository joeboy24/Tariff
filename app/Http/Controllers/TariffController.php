<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarif;
use Session;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //

        switch ($request->input('store_action')) {

            case 'kwh_submit':

                $cust_class = $request->input('cust_class');
                $kcons = $request->input('Kconsumption');

                if ($cust_class == 2) {
                    $srv_chrg = 11.7315;
                    $vat = ($kcons + $srv_chrg) * 0.125;
                    $nhil = ($kcons + $srv_chrg) * 0.025;
                    $getfund = $nhil;
                    $strLightLevy = $kcons * 0.03;
                    $govLevy = $kcons * 0.02;
                    $tot_charge = $kcons + $srv_chrg + $vat + $nhil + $getfund + $strLightLevy + $govLevy;

                } else {
                    if ($kcons <= 50) {
                        $srv_chrg = 2.1333;
                    } else {
                        $srv_chrg = 7.0389;
                    }

                    $vat = 0;
                    $nhil = 0;
                    $getfund = 0;
                    $strLightLevy = $kcons * 0.03;
                    $govLevy = $kcons * 0.02;
                    $tot_charge = $kcons + $srv_chrg + $vat + $nhil + $getfund + $strLightLevy + $govLevy;
                }


                Session::put('srv_chrg', $srv_chrg);
                Session::put('vat', $vat);
                Session::put('nhil', $nhil);
                Session::put('getfund', $getfund);
                Session::put('tot_charge', $tot_charge);
                
                $tarif = Tarif::firstOrCreate([
                    'user_id' => auth()->user()->id,
                    'kcons' => $kcons,
                    'serv_chrg' => $srv_chrg,
                    'vat' => $vat,
                    'nhil' => $nhil,
                    'getfund' => $getfund,
                    'strl_levi' => $strLightLevy,
                    'gov_levi' => $govLevy,
                    'total_chrg' => $tot_charge,
                ]);

                // 'user_id', 'kcons', 'serv_chrg', 'nat', 'nhil', 'getfund', 'strl_levi', 'gov_levi', 'total_chrg', 'status'

                return redirect('/')->with('success', 'Computation Successfull..!');
                return 'srv_chrg -> '.session('srv_chrg');

                // $school = School::firstOrCreate([
                //     'user_id' => 1,
                //     'caterer_id' => 'none',
                //     // 'caterer_id' => $catr_count+1,
                //     'region_id' => $request->input('region'),
                //     'district' => $item->district,
                //     'sch_name' => $item->sch_name,
                //     // 'headteacher' => $row[4],
                //     // 'cordinator' => $row[5],
                // ]);

            break;

            case 'add_user':
                $tarif = Tarif::firstOrCreate([
                    'name' => auth()->user()->id,
                    'email' => $kcons,
                    'contact' => $srv_chrg,
                    'password' => $vat,
                ]);
            break;
        }
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
