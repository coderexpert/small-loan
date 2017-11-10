<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            return redirect('/admin/dashboard');
        }

        $loans = App\Loan::loans()->where('user_id', Auth::user()->id);
        return view('home', compact('loans'));
    }

    public function member_contribution()
    {
        $contributions = App\Contribution::contributions()->where('user_id', Auth::user()->id);
        return view('member.contribution', compact('contributions'));
    }

    public function member_submit_contribution(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|min:3|max:100000',
            'transaction' => 'required'
        ]);

        DB::insert('insert into contributions (user_id, amount, transaction, created_at, updated_at) values(?, ?, ?, ?, ?)', [Auth::user()->id, $request->get('amount'), $request->get('transaction'), now(), now()]);

        session()->flash('status', 'contribution submitted');

        return back();
    }

    public function member_apply_loan(Request $request)
    {
        $this->validate($request, [
            'amount' => 'required|max:100000'
        ]);


        DB::insert('insert into loans (user_id, amount, created_at, updated_at) values(?, ?, ?, ?)', [Auth::user()->id, $request->get('amount'), now(), now()]);

        session()->flash('status', 'loan applied');

         return back();
    }
}
