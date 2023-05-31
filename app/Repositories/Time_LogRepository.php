<?php

namespace App\Repositories;

use App\Models\Time_Log;
use Illuminate\Support\Facades\Auth;

class Time_LogRepository
{
    public function Save_Time_Log($data)
    {

        $data['user_id'] = Auth::user()->id;

        return Time_Log::create($data);
        try {

        } catch (Exception $e) {

            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred.');
        }

    }
    public function update_Time_Log($data, $id)
    {

        return Time_Log::where('id', $id)->update([
            'start_time' => $data['start_time'],
            'end_time' => $data['end_time'],
            'project_id' => $data['project_id'],
            'date' => $data['date'],
        ]);

        try {

        } catch (Exception $e) {

            Log::error($e->getMessage());
            return redirect()->back()->with('error', 'An error occurred.');
        }

    }

}
