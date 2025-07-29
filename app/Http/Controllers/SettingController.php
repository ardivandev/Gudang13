<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Events\GudangStatusUpdated;

class SettingController extends Controller
{
    public function toggleGudang()
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = Setting::create(['status_gudang' => 'buka']);
        }

        // Toggle status
        $setting->status_gudang = $setting->status_gudang === 'buka' ? 'tutup' : 'buka';
        $setting->save();

        // Kirim event broadcast
        broadcast(new GudangStatusUpdated($setting->status_gudang))->toOthers();

        return back();
    }
}
