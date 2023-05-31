<?php

namespace App\Http\Controllers;

use App\Models\Time_Log;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Time_Log_EvaluationController extends Controller
{

    /**
     * total_time_per_day
     *
     * @param  mixed $timeLogs
     * @return array
     */
    private function total_time_per_day(array $timeLogs): array
    {
        $totalTimePerDay = [];
        $totalTimePerDay['TotalMonthTime'] = 0;
        foreach ($timeLogs as $timeLog) {
            if ($timeLog->Start_time && $timeLog->End_time) {

                $id = $timeLog->id;
                $startTime = Carbon::createFromFormat('H:i:s', $timeLog->Start_time);
                $endTime = Carbon::createFromFormat('H:i:s', $timeLog->End_time);

                $timeDifference = $endTime->diffInMinutes($startTime);

                $hours = floor($timeDifference / 60);
                $minutes = $timeDifference % 60;
                $totalTimePerDay['TotalMonthTime'] += $timeDifference;
                $totalTimePerDay[$id]['hours'] = $hours;
                $totalTimePerDay[$id]['minutes'] = $minutes;

            }

        }
        return $totalTimePerDay;
    }

    public function total_time_per_month($total_day_time)
    {
        $totalTimePerMonth = [];
        $hours = floor($total_day_time['TotalMonthTime'] / 60);
        $minutes = $total_day_time['TotalMonthTime'] % 60;
        $totalTimePerMonth['hours'] = $hours;
        $totalTimePerMonth['minutes'] = $minutes;
        return $totalTimePerMonth;

    }
    /**
     * Display a listing of the resource.
     */
    /**
     * index
     *
     * @param  mixed $request
     * @return void
     */
    public function index(Request $request)
    {

        $date = Carbon::create($request->month, 1)->format('Y-m'); // 1 is used to create 1st date of every month
        \DB::enableQueryLog();
// Retrieve time logs based on the user ID and date
        $timeLogs = Time_Log::where('user_id', auth()->user()->id)
            ->whereRaw("DATE_FORMAT(date, '%Y-%m') = ?", [$date])
            ->with('project')
            ->orderBy('Date')
            ->get();
        dd(\DB::getQueryLog());
        $total_day_time = $this->total_time_per_day($timeLogs);
// dd($total_day_time);
        $total_month_time = $this->total_time_per_month($total_day_time);

        $data = [
            'timeLogs' => $timeLogs,
            'Month' => $date,
            'total_day_time' => $total_day_time,
            'total_month_time' => $total_month_time,
        ];
        return view('Evaluation_report', $data);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
