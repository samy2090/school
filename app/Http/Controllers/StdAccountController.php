<?php

namespace App\Http\Controllers;

use App\Models\Std_Account;
use App\Models\Fees;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StdAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $std_accounts = Std_Account::all();
        return view('dashboard.std_accounts',compact('std_accounts')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fees_amount    = fees::where('id',$request->fees_id)->value('amount');
        $std_account = new Std_Account();
        $std_account->student_id    =$request->std_id;
        $std_account->fees_id       =$request->fees_id;
        $std_account->debit         =$fees_amount;
        $std_account->credit        =0.00;
        $std_account->info          =$request->info;
        $std_account->save();
        toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Std_Account $std_Account)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Std_Account $std_Account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Std_Account $std_Account)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Std_Account $std_Account)
    {
        //
    }
}
