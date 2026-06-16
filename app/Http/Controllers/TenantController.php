<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\Member;

class TenantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->search;

        $query = Tenant::with('member');

        if($search){
            $query->where(function($q) use ($search){
                $q->where('name','like',"%{$search}%")
                ->orWhere('phone','like',"%{$search}%")
                ->orWhere('email','like',"%{$search}%")
                ->orWhereHas('member',function($member) use ($search){
                    $member->where('name','like',"%{$search}%")
                    ->orWhere('email','like',"%{$search}%")
                    ->orWhere('wing','like',"%{$search}%")
                    ->orWhere('flat_number','like',"%{$search}%");
                });
            });
        }

        $tenants = $query
        ->orderBy('created_at','desc')
        ->paginate(10)
        ->withQueryString();

        return view('Tenants.index',compact('tenants','search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::orderBy('name')->get();
        return view('tenants.create',compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTenantRequest $request)
    {
        $data = $request->validated();

        if($request->hasFile('id_proof')){
            $data['id_proof'] =  $request->file('id_proof')->store('id_proofs','public');
        }
        if($request->hasFile('agreement_copy')){
            $data['agreement_copy'] =  $request->file('agreement_copy')->store('agreement_copy','public');
        }
        if($request->hasFile('police_verification')){
            $data['police_verification'] =  $request->file('police_verification')->store('police_verification','public');
        }

        Tenant::create($data);

        return redirect()->route('tenants.index')->with('success','Tenant Added Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Tenant $tenant)
    {
        return view('tenants.show',compact('tenant'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tenant $tenant)
    {
        $members = Member::orderBy('name')->get();
        return view('tenants.edit',compact('tenant','members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTenantRequest $request, Tenant $tenant)
    {
        $data = $request->validated();

        if($request->hasFile('id_proof')){
            $data['id_proof'] =  $request->file('id_proof')->store('id_proofs','public');
        }
        if($request->hasFile('agreement_copy')){
            $data['agreement_copy'] =  $request->file('agreement_copy')->store('agreement_copy','public');
        }
        if($request->hasFile('police_verification')){
            $data['police_verification'] =  $request->file('police_verification')->store('police_verification','public');
        }

        Tenant::where('id',$tenant->id)->update($data);

        return redirect()->route('tenants.index')->with('success','Tenant Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tenant $tenant)
    {
        $tenant->delete();
        return redirect()->route('tenants.index')->with('success','Tenant Deleted Successfully');

    }
}
