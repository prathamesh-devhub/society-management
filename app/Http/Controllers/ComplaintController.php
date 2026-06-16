<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Member;
use App\Http\Requests\StoreComplaintRequest;
use App\Http\Requests\UpdateComplaintRequest;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $search = $request->search;

        $query = Complaint::with('member');
        
        if($request->status) {
            $query->where('status', $request->status);
        }
        if($request->priority) {
            $query->where('priority', $request->priority);
        }
        if ($search) {

            $query->where(function ($q) use ($search) {

                $q->where('title', 'like', "%{$search}%")
                ->orWhere('description', 'like', "%{$search}%")
                ->orWhereHas('member', function ($memberQuery) use ($search) {

                        $memberQuery->where('name', 'like', "%{$search}%")
                                    ->orWhere('email', 'like', "%{$search}%")
                                    ->orWhere('wing', 'like', "%{$search}%")
                                    ->orWhere('flat_number', 'like', "%{$search}%");

                });

            });
        }

        $complaints = $query
            ->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view(
            'complaints.index',
            compact('complaints', 'search')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $members = Member::orderBy('name')->get();
        return view('complaints.create', compact('members'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreComplaintRequest $request)
    {
        Complaint::create($request->validated());

        return redirect()->route('complaints.index')->with('success', 'Complaint created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Complaint $complaint)
    {
        return view('complaints.show',compact('complaint'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Complaint $complaint)
    {
        $members = Member::orderBy('name')->get();

        return view('complaints.edit', compact('complaint', 'members'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateComplaintRequest $request, Complaint $complaint)
    {
        Complaint::where('id', $complaint->id)->update($request->validated());

        return redirect()->route('complaints.index')->with('success', 'Complaint updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Complaint $complaint)
    {
        $complaint->delete();
        return redirect()->route('complaints.index')->with('success', 'Complaint deleted successfully.');
    }
}
