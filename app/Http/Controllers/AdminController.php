<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App;

class AdminController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth', 'role:admin']);
	}
    //
    public function index()
    {
    	return view('admin.index');
    }

    public function members()
    {
    	$members = App\User::members()->where('id', '!=', Auth::user()->id);

    	return view('admin.members', compact('members'));
    }

    public function members_loans()
    {
    	$loans = App\Loan::loans()->where('user_id', '!=', Auth::user()->id);

    	return view('admin.loans', compact('loans'));
    }

    public function members_contributions()
    {
    	$contributions = App\Contribution::contributions()->where('id', '!=', Auth::user()->id);

    	return view('admin.contributions', compact('contributions'));
    }

    public function broadcast()
    {
    	return view('admin.broadcast');
    }

    public function approveLoan(App\Loan $loan)
    {
    	$loan->status = true;
    	$loan->save();

    	session()->flash('status', 'Loan approved');

    	return back();
    }

    public function approveContribution(App\Contribution $contribution)
    {
    	$contribution->status = true;
    	$contribution->save();

    	session()->flash('status', 'Contribution approved');

    	return back();
    }

    public function save_broadcast(Request $request)
    {
    	$this->validate($request, [
    		'title' => 'required|max:100',
    		'message' => 'required|string|max:1500'
    	]);

    	App\broadcast::create([
    		'title' => $request->get('title'),
    		'message' => $request->get('message')
    	]);

    	session()->flash('status', 'The broadcast was send successfully');

    	return back();
    }

}
