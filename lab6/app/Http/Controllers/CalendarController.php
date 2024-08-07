<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function calendar(Request $request)
    {
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');
        $currentDay = Carbon::now()->format('d');

        $weekDays = [
            'Mon',
            'Tue',
            'Wed',
            'Thu',
            'Fri',
            'Sat',
            'Sun',
        ];

        $date = Carbon::create($currentYear, $currentMonth);

        $currentMonthName = $date->format('F');

        $daysInMonth = $date->daysInMonth;
        $firstDayOfMonth = $date->copy()->startOfMonth()->dayOfWeek;
        // $previousMonthDays = $date->copy()->subMonth()->daysInMonth;

        $data = [
            'daysInMonth' => $daysInMonth,
            'firstDayOfMonth' => $firstDayOfMonth,
            // 'previousMonthDays' => $previousMonthDays,
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear,
            'currentDay' => $currentDay,
            'currentMonthName' => $currentMonthName,
            // 'previousMonth' => $date->copy()->subMonth()->format('m'),
            // 'previousYear' => $date->copy()->subMonth()->format('Y'),
            // 'nextMonth' => $date->copy()->addMonth()->format('m'),
            // 'nextYear' => $date->copy()->addMonth()->format('Y'),
        ];

        // dd($data);

        return view('pages.calendar', compact('data', 'weekDays')); 
    }

    public function getCalendar($year, $month, $day)
    {
        dd($year, $month, $day);
        $currentMonth = $month;
        $currentYear = $year;
        $currentDay = $day;

        $weekDays = [
            'Mon',
            'Tue',
            'Wed',
            'Thu',
            'Fri',
            'Sat',
            'Sun',
        ];

        $date = Carbon::create($currentYear, $currentMonth);

        $currentMonthName = $date->format('F');

        $daysInMonth = $date->daysInMonth;
        $firstDayOfMonth = $date->copy()->startOfMonth()->dayOfWeek;
        // $previousMonthDays = $date->copy()->subMonth()->daysInMonth;

        $data = [
            'daysInMonth' => $daysInMonth,
            'firstDayOfMonth' => $firstDayOfMonth,
            // 'previousMonthDays' => $previousMonthDays,
            'currentMonth' => $currentMonth,
            'currentYear' => $currentYear,
            'currentDay' => $currentDay,
            'currentMonthName' => $currentMonthName,
            // 'previousMonth' => $date->copy()->subMonth()->format('m'),
            // 'previousYear' => $date->copy()->subMonth()->format('Y'),
            // 'nextMonth' => $date->copy()->addMonth()->format('m'),
            // 'nextYear' => $date->copy()->addMonth()->format('Y'),
        ];

        // dd($data);

        return view('pages.calendar', compact('data', 'weekDays')); 
    }
}
