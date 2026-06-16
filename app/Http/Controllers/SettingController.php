<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{

    /**
     * Store a newly created resource in storage.
     */
    public function show(Request $request)
    {
        $setting = Setting::first();
        return view('settings.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $setting = Setting::first();
        return view('settings.edit', compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Setting $setting)
    {
        $data = $request->validate([
            'society_name' => 'required|string|max:255',
            'registration_no' => 'nullable|string|max:255',
            'address' => 'nullable|string',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:20',
            'logo' => 'nullable|image|max:2048',
            'bank_name' => 'nullable|string|max:255',
            'account_no' => 'nullable|string|max:255',
            'ifsc_code' => 'nullable|string|max:255',
            'repair_rate' => 'nullable|numeric|min:0',
            'sinking_rate' => 'nullable|numeric|min:0',
            'building_rate' => 'nullable|numeric|min:0',
            'electricity_charge' => 'nullable|numeric|min:0',
            'water_charge' => 'nullable|numeric|min:0',
            'service_charge' => 'nullable|numeric|min:0',
            'lift_charge' => 'nullable|numeric|min:0',
            'insurance_charge' => 'nullable|numeric|min:0',
            'education_charge' => 'nullable|numeric|min:0',
            'interest_rate' => 'nullable|numeric|min:0|max:100',
            'bill_due_day' => 'required',
        ]);

        $setting = Setting::first();

        if($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('society_logo', 'public');
        }
        $setting->update($data);

        return redirect()->route('settings.show')->with('success', 'Settings updated successfully.');
    }
}
