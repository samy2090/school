<?php

namespace App\Http\Controllers;

use App\Models\Std_Account;
use App\Models\Fees;
use App\Models\FeesInvoices;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
        DB::beginTransaction();
        try{
            $fees_invoice = new FeesInvoices();
            $fees_invoice->student_id       =$request->std_id;
            $fees_invoice->fee_id           =$request->fees_id;
            $fees_invoice->invoice_date     = date('Y-m-d');
            $fees_invoice->dts              = $request->info;
            $fees_invoice->save();
            
            $fees_amount    = fees::where('id',$request->fees_id)->value('amount');
            $std_account = new Std_Account();
            $std_account->student_id            =$request->std_id;
            $std_account->fees_id               =$request->fees_id;
            $std_account->fees_invoice_id       =$fees_invoice->id;
            $std_account->debit                 =$fees_amount;
            $std_account->credit                =0.00;
            $std_account->info                  =$request->info;
            $std_account->save();
            DB::commit();

        toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->back();
        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
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
        DB::beginTransaction();
        try{
        $fees_amount    = fees::where('id',$request->fees_id)->value('amount');
        $std_account = Std_Account::where('fees_invoice_id', $request->fees_invoice_id);
            $std_account->update([
                'fees_id' => $request->fees_id,
                'debit' => $fees_amount,
                'credit' => 0.00,
                'info' => $request->info,
            ]);
    
        // Find the FeesInvoices instance and update it
        $fees_invoice = FeesInvoices::where('id', $request->fees_invoice_id)->first();
            $fees_invoice->update([
                'fee_id' => $request->fees_id,
                'invoice_date' => date('Y-m-d'),
                'dts' => $request->info,
            ]);
        
        DB::commit();

        toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->back();
        }
        catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error'=>$e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $invoice        = FeesInvoices::findOrFail($id)->delete();
        $std_account    = Std_Account::where('fees_invoice_id',$id)->delete();
        toastr()->success('Data has been saved successfully!', 'Congrats', ['timeOut' => 5000]);
        return redirect()->back();
    }
}
