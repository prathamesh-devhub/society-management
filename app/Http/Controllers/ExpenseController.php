<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExpenseRequest;
use App\Http\Requests\UpdateExpenseRequest;
use Illuminate\Http\Request;
use App\Models\Expense;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $expenses = Expense::where('category','like',"%$search%")
        ->orWhere('vendor_name','like',"%$search%")
        ->orWhere('payment_mode','like',"%$search%")
        ->orWhere('reference_no','like',"%$search%")
        ->orderBy('expense_date')
        ->paginate(10);

        return view('expenses.index',compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExpenseRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('bill_copy')){
            $data['bill_copy'] = $request->file('bill_copy')->store('bill_copies','public'); 
        }
        Expense::create($data);
        return redirect()->route('expenses.index')->with('success','Expense added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view('expenses.show',compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return view('expenses.edit',compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExpenseRequest $request, Expense $expense)
    {
        $data = $request->validated();
        if($request->hasFile('bill_copy')){
            $data['bill_copy'] = $request->file('bill_copy')->store('bill_copies','public'); 
        }
        Expense::where('id',$expense->id)->update($data);
        return redirect()->route('expenses.index')->with('success','Expense updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect()->route('expenses.index')->with('success','Expense deleted successfully.');
    }
}
