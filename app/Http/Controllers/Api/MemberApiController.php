<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Http\Requests\Api\StoreMemberRequest;
use App\Http\Requests\Api\UpdateMemberRequest;
use App\Http\Resources\MemberResource;

class MemberApiController extends Controller
{
    public function index()
    {
        return MemberResource::collection(Member::all());
    }

    public function show(Member $member)
    {
        return new MemberResource($member);
    }

    public function store(StoreMemberRequest $request)
    {
       
        $member = Member::create($request->validated());

        return response()->json([
            'message' => 'Member created successfully',
            'member' => $member
        ], 201);
    }

    public function update(UpdateMemberRequest $request, Member $member)
    {
        
        $member->update($request->validated());

        return response()->json([
            'message' => 'Member updated successfully',
            'member' => $member
        ]);
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return response()->json([
            'message' => 'Member deleted successfully'
        ]);
    }
}
