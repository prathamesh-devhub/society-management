<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMemberRequest;
use App\Http\Requests\UpdateMemberRequest;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\Storage;

class MemberController extends Controller
{
    function index(Request $request) {

        $search = $request->input('search');
        $members = Member::where('name', 'like', "%$search%")
            ->orWhere('email', 'like', "%$search%")
            ->orWhere('wing', 'like', "%$search%")
            ->orWhere('flat_number', 'like', "%$search%")
            ->orderBy('name')
            ->paginate(10);

        return view('members.index', ['members' => $members, 'search' => $search]);
    }

    function create() {
        return view('members.create');
    }
    
    public function show(Member $member) {
        $member->load('vehicles');
        $member->load('tenants');
        return view('members.show', compact('member'));
    }

    function store(StoreMemberRequest $request) {

        $data = $request->validated();
        if ($request->hasFile('profile_photo')) {
            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }
        Member::create($data);

        return redirect()->route('members.index')->with('success', 'Member added successfully');
    }

    function edit(Member $member) {
        return view('members.edit', compact('member'));
    }

    function update(UpdateMemberRequest $request, Member $member) {

        $data = $request->validated();
        if ($request->hasFile('profile_photo')) {

            if ($member->profile_photo) {
                Storage::disk('public')->delete($member->profile_photo);
            }

            $data['profile_photo'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }
        Member::where('id', $member->id)->update($data);
        return redirect()->route('members.index')->with('success', 'Member updated successfully');
    }

    function destroy(Member $member) {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member deleted successfully');
    }

}
