<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\School;
use App\Models\Caterer;
use App\Models\SchFeeding;
use App\Imports\FeedImport;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Region;
use App\Models\Payment;
use App\Models\DailyConfirm;
use Session;

class SchFeedingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // return 'Works Perfet!';

        $report_type = $request->input('report_type');
        $region = $request->input('region');
        $order = $request->input('order');
        $from = $request->input('from');
        $to = $request->input('to');

        $where = [
            'region_id' => $region,
        ];
        if ($report_type == 'School Reports') {
            // return 123312345;
            if ($region == 'All Regions') {
                $schools = School::orderBy('sch_name', $order)->get();
                // $school = School::where('del', '!=', 'none')->orderBy('sch_name', $order)->paginate(10);
            } else {
                $schools = School::where('region_id', $region)->orderBy('sch_name', $order)->get();
            }

            $send = [
                'c' => 1,
                'report_type' => 'school',
                'cur_date' => date('D, d-M-Y'),
                'region' => Region::all(),
                'schools' => $schools,
            ];
            return view('sch_report')->with($send);
            // return count($schools);

        } elseif ($report_type == 'Caterer Reports') {
            // return 12330987;
            if ($region == 'All Regions') {
                $caterers = Caterer::orderBy('name', $order)->get();
            } else {
                $caterers = Caterer::where('region_id', $region)->orderBy('name', $order)->get();
                // $caterers = Caterer::where('region_id', $region)->orderBy('name', $order)->get();
            }

            $send = [
                'c' => 1,
                'report_type' => 'caterer',
                'cur_date' => date('D, d-M-Y'),
                'region' => Region::all(),
                'enr' => School::orderBy('id', 'ASC')->sum('enrolment'),
                'region_id' => $region,
                'caterers' => $caterers,
            ];
            return view('sch_report')->with($send);
            // return $caterers;
        } elseif ($report_type == 'Payment Reports') {
            # code...
            if ($region == 'All Regions') {
                // return $from.' - '.$to;
                $payments = Payment::orderBy('id', $order)->get();
                if ($from != '' && $to == '') {
                    $payments = Payment::where('date', '>=', $from)->orderBy('id', $order)->get();
                } elseif ($from == '' && $to != '') {
                    $payments = Payment::where('date', '<=', $to)->orderBy('id', $order)->get();
                } elseif ($from != '' && $to != '') {
                    $payments = Payment::where('date', '>=', $from)->where('date', '<=', $to)->orderBy('id', $order)->get();
                } else {
                    $payments = Payment::orderBy('id', $order)->get();
                }
                $query_region = 'All Regions';
            } else {
                if ($from != '' && $to == '') {
                    $payments = Payment::where('region_id', $region)->where('date', '>=', $from)->orderBy('id', $order)->get();
                } elseif ($from == '' && $to != '') {
                    $payments = Payment::where('region_id', $region)->where('date', '<=', $to)->orderBy('id', $order)->get();
                } elseif ($from != '' && $to != '') {
                    $payments = Payment::where('region_id', $region)->where('date', '>=', $from)->where('date', '<=', $to)->orderBy('id', $order)->get();
                } else {
                    $payments = Payment::where('region_id', $region)->orderBy('id', $order)->get();
                }
                $query_region = Region::find($region)->reg_name.' Region';
            }
            // return $payments;

            $tax = 0;
            foreach ($payments as $pmt) {
                # code...
                $tax = $tax + ($pmt->tax * $pmt->enrolment * $pmt->day_count);
            }
            
            $send = [
                'c' => 1,
                'tax' => $tax,
                'from' => $from,
                'to' => $to,
                'report_type' => 'payment',
                'cur_date' => date('D, d-M-Y'),
                'region' => Region::all(),
                'query_region' => $query_region,
                'payments' => $payments,
            ];
            return view('sch_report')->with($send);
        }
        

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
            // return 'False';
        switch ($request->input('store_action')) {

            case 'feeding_list1':

                if ($request->input('region') == 'blank') {
                    return redirect(url()->previous())->with('error', 'Oops..! Select Region to proceed');
                }
                Session::put('region', $request->input('region'));
                
                if(!empty($request->file('ex_file'))){
                    try {
                        $this->validate($request, [
                            'ex_file'   => 'required|max:5000|mimes:xlsx,xls,csv'
                        ]);
            
                        Excel::import(new FeedImport,request()->file('ex_file'));

                        $fetch_schfd = SchFeeding::all();
                        // return count($fetch_schfd);
                        foreach ($fetch_schfd as $item) {
                            $sch_count = School::all();
                            $sch_count = count($sch_count);
                            $sch_search = School::where('sch_name', $item->sch_name)->where('district', $item->district)->count();

                            // return $sch_search;
                            $catr_count = Caterer::all();
                            $catr_count = count($catr_count);

                            if ($sch_search == 0) {
                                # code...
                                $school = School::firstOrCreate([
                                    'user_id' => 1,
                                    'caterer_id' => 'none',
                                    // 'caterer_id' => $catr_count+1,
                                    'region_id' => $request->input('region'),
                                    'district' => $item->district,
                                    'sch_name' => $item->sch_name,
                                    // 'headteacher' => $row[4],
                                    // 'cordinator' => $row[5],
                                ]);


                                $search_catr = Caterer::where('ezwich', $item->ezwich)->first();
                                if (empty($search_catr)) {
                                    $caterer = Caterer::firstOrCreate([
                                        'user_id' => 1,
                                        'school_id' => $school->id,
                                        // 'school_id' => $sch_count+1,
                                        'name' => $item->caterer_name,
                                        // 'comp_name' => '',
                                        // 'address' => '',
                                        // 'contact' => '',
                                        // 'email' => '',
                                        'ezwich' => $item->ezwich,
                                    ]);
                                    $find_sch = School::find($school->id);
                                    $find_sch->caterer_id = $caterer->id;
                                    $find_sch->save();
                                }else{
                                    // return $search_catr->id;
                                    $find_sch = School::find($school->id);
                                    $find_sch->caterer_id = $search_catr->id;
                                    $find_sch->save();
                                }



                            }
                        }

                        return redirect(url()->previous())->with('success', 'File Upload Successful');
            
                    } catch (ValidationException $exception) {
                        return redirect(url()->previous())->with('Error', $exception->errors());
                    }
                }else{
                    return redirect('/uploads')->with('error', 'Oops..! Select file to upload!');
                }
            break;

            case 'feeding_list':

                if ($request->input('region') == 'blank') {
                    return redirect(url()->previous())->with('error', 'Oops..! Select Region to proceed');
                }
                Session::put('region', $request->input('region'));
                
                if(!empty($request->file('ex_file'))){
                    try {
                        $this->validate($request, [
                            'ex_file'   => 'required|max:5000|mimes:xlsx,xls,csv'
                        ]);
            
                        Excel::import(new FeedImport,request()->file('ex_file'));

                        $fetch_schfd = SchFeeding::all();
                        // return count($fetch_schfd);
                        foreach ($fetch_schfd as $item) {
                            $sch_count = School::all();
                            $sch_count = count($sch_count);
                            $sch_search = School::where('sch_name', $item->sch_name)->where('district', $item->district)->count();

                            // return $sch_search;
                            $catr_count = Caterer::all();
                            $catr_count = count($catr_count);

                            if ($sch_search == 0) {
                                # code...
                                $school = School::firstOrCreate([
                                    'user_id' => 1,
                                    'caterer_id' => 'none',
                                    // 'caterer_id' => $catr_count+1,
                                    'region_id' => $request->input('region'),
                                    'district' => $item->district,
                                    'sch_name' => $item->sch_name,
                                    'enrolment' => $item->enrolment,
                                    // 'headteacher' => $row[4],
                                    // 'cordinator' => $row[5],
                                ]);


                                $search_catr = Caterer::where('ezwich', $item->ezwich)->first();
                                if (empty($search_catr)) {
                                    $caterer = Caterer::firstOrCreate([
                                        'user_id' => auth()->user()->id,
                                        'school_id' => $school->id,
                                        'region_id' => $request->input('region'),
                                        // 'school_id' => $sch_count+1,
                                        'name' => $item->caterer_name,
                                        // 'comp_name' => '',
                                        // 'address' => '',
                                        // 'contact' => '',
                                        // 'email' => '',
                                        'ezwich' => $item->ezwich,
                                        'enrolment' => $item->enrolment,
                                    ]);

                                    // Add caterer_id to Schools
                                    $find_sch = School::find($school->id);
                                    $find_sch->caterer_id = $caterer->id;
                                    $find_sch->save();
                                }else{
                                    // return $search_catr->id;
                                    $find_sch = School::find($school->id);
                                    $find_sch->caterer_id = $search_catr->id;
                                    $find_sch->save();
                                }

                            }else {

                                // If school exists but caterer doesn't

                                $check_sch = School::where('sch_name', $item->sch_name)->where('district', $item->district)->first();
                                $search_catr = Caterer::where('ezwich', $item->ezwich)->first();
                                if (empty($search_catr)) {
                                    $caterer = Caterer::firstOrCreate([
                                        'user_id' => auth()->user()->id,
                                        'school_id' => $check_sch->id,
                                        'region_id' => $request->input('region'),
                                        // 'school_id' => $sch_count+1,
                                        'name' => $item->caterer_name,
                                        // 'comp_name' => '',
                                        // 'address' => '',
                                        // 'contact' => '',
                                        // 'email' => '',
                                        'ezwich' => $item->ezwich,
                                        'enrolment' => $item->enrolment,
                                    ]);
                                    $find_sch = School::find($check_sch->id);
                                    $find_sch->caterer_id = $caterer->id;
                                    $find_sch->save();
                                }else{
                                    // return $search_catr->id;
                                    $find_sch = School::find($check_sch->id);
                                    $find_sch->caterer_id = $search_catr->id;
                                    $find_sch->save();
                                }
                            }
                        }

                        $catrs = Caterer::all();
                        foreach ($catrs as $ctr) {
                            // Sum Caterer Enrolments
                            // $sum_ctr = Caterer::find($caterer->id);
                            $ctr->enrolment = School::where('caterer_id', $ctr->id)->sum('enrolment');
                            $ctr->save();
                        }

                        return redirect(url()->previous())->with('success', 'File Upload Successful');
            
                    } catch (ValidationException $exception) {
                        return redirect(url()->previous())->with('Error', $exception->errors());
                    }
                }else{
                    return redirect('/uploads')->with('error', 'Oops..! Select file to upload!');
                }
            break;

            case 'confirm_daily':
                return $id;
                return 'True';
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
        if ($id < 10) {
            $dt = date('Y-m-0'.$id);
        } else {
            $dt = date('Y-m-'.$id);
        }

        $regions = Region::all();
        $daily_conf = DailyConfirm::where('date', $dt)->paginate(10);
        $send = [
            'cur_date' => $dt,
            'regions' => $regions,
            'daily_conf' => $daily_conf
        ];
        return view('dailyview_feed')->with($send);
        // return $id;
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
        if ($id < 10) {
            $dt = date('Y-m-0'.$id);
        } else {
            $dt = date('Y-m-'.$id);
        }
        

        switch ($request->input('update_action')) {

            case 'confirm_daily':

                $amt = 1;
                $tax = 3;
                $cur_amt = 3;
                // $day_count = 4;
                $enrolment = 200;

                foreach (auth()->user()->caterer->school as $sch) {
                    # code...
                    $where = [
                        // 'caterer_id' => $sch->caterer_id,
                        'school_id' => $sch->id
                    ];
                    $check = DailyConfirm::where($where)->where('date', $dt)->get();
                    if (count($check) == 0) {
                        $conf_insert = DailyConfirm::firstOrCreate([
                            'user_id' => auth()->user()->id,
                            'school_id' => $sch->id,
                            'date' => $dt,
                            'sch_name' => $sch->sch_name,
                            'food_type' => $request->input('ft_save'.$id.$sch->id),
                            'emis' => 'PIT0'.$sch->id,
                            'conf1' => 1,
                        ]);
                    }

                    $day_count = DailyConfirm::where($where)->where('date', 'LIKE', '%'.date('Y-m').'%')->count();
                    $check_pay = Payment::where($where)->where('caterer_id', $sch->caterer_id)->where('date', 'LIKE', '%'.date('Y-m').'%')->get();
                    if (count($check_pay) == 0) {
                        $payment_insert = Payment::firstOrCreate([
                            'caterer_id' => $sch->caterer_id,
                            'school_id' => $sch->id,
                            'region_id' => $sch->region_id,
                            'tax' => $amt - ($amt - ($tax/100)),
                            'date' => $dt,
                            'amt' => $amt - ($tax/100),
                            'enrolment' => $sch->enrolment,
                        ]);
                        $pay_up = Payment::find($payment_insert->id);
                        $pay_up->day_count = $day_count;
                        $pay_up->due_amt = (($amt - ($tax/100)) * $payment_insert->enrolment) * $day_count;
                        $pay_up->save();
                    } else {
                        $find_pay = Payment::where($where)->where('caterer_id', $sch->caterer_id)->where('date', 'LIKE', '%'.date('Y-m').'%')->first();
                        $pay_up = Payment::find($find_pay->id);
                        $pay_up->day_count = $day_count;
                        $pay_up->due_amt = (($amt - ($tax/100)) * $find_pay->enrolment) * $day_count;
                        $pay_up->save();
                    }
                    
                    // return $request->input('ft_save'.$id.$sch->id);
                }
                // return auth()->user()->caterer->school;
                return redirect(url()->previous())->with('success', 'Daily Confirmation Successfull!');
            break;

            case 'flag':

                $flag = DailyConfirm::find($id);
                $flag->flag = $request->input('flag_comment');
                $flag->save();
                // return auth()->user()->caterer->school;
                return redirect(url()->previous())->with('success', 'Record Flag Successfull!');
            break;
        }
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
