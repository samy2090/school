<?php

namespace App\Http\Controllers;

use App\Models\FeesInvoices;
use App\Models\Fees;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeesInvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees_invoices      = FeesInvoices::all();
        $allfees               = Fees::all();
        return view('dashboard.fee_invoices',compact('fees_invoices','allfees'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(FeesInvoices $feesInvoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeesInvoices $feesInvoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeesInvoices $feesInvoices)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeesInvoices $feesInvoices)
    {
        //
    }
}
