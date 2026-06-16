<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Requests\StoreNoticeRequest;
use App\Http\Requests\UpdateNoticeRequest;
use App\Models\User;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*$search = request()->input('search');
        $notices = Notice::with('creator')
                         ->where('title', 'like', "%$search%")
                         ->orWhere('description', 'like', "%$search%")
                         ->orWhere('category', 'like', "%$search%")
                         ->orWhereHas('creator', function($query) use ($search) {
                             $query->where('name', 'like', "%$search%");
                         })
                         ->orderBy('publish_date', 'desc')
                         ->paginate(10);*/
                         $notices = Notice::all();
                         $search = '';
        return view('notices.index', ['notices' => $notices, 'search' => $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        return view('notices.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoticeRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('attachment'))
        {
            $data['attachment'] = $request->file('attachment')->store('notice_attachments', 'public');
        }

        $data['created_by'] = auth()->id();
        $data['is_active'] = $request->has('is_active');
        Notice::create($data);
        return redirect()->route('notices.index')->with('success', 'Notice created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Notice $notice)
    {
        return view('notices.show', compact('notice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notice $notice)
    {
        $users = User::all();
        return view('notices.edit', compact('notice', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        $data = $request->validated();
        if($request->hasFile('attachment'))
        {
            $data['attachment'] = $request->file('attachment')->store('notice_attachments', 'public');
        }

        $data['created_by'] = auth()->id();
        $data['is_active'] = $request->has('is_active');
        $notice->update($data);
        return redirect()->route('notices.index')->with('success', 'Notice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notice $notice)
    {
        $notice->delete();
        return redirect()->route('notices.index')->with('success', 'Notice deleted successfully.');
    }
}
