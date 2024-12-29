<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSettingsRequest;
use App\Http\Requests\UpdateSettingsRequest;
use App\Models\Setting;
use App\Models\Settings;
use Illuminate\Support\Facades\Log;

class SettingsController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $settings = Setting::first();
        return view('settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingsRequest $request)
    {
        $settings = Setting::first();
        if($settings) {
            $settings->update($request->all());
        } else {
            $settings = Setting::create($request->all());
        }
        return redirect()->back();
    }

}
