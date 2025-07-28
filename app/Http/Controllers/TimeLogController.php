<?php

namespace App\Http\Controllers;

use App\Models\TimeLog;
use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TimeLogController extends Controller
{
    public function index()
    {
        $logs = TimeLog::where('user_id', Auth::id())
                    ->orderBy('log_date', 'desc')
                    ->get()
                    ->groupBy('log_date');

        return view('timelogs.index', compact('logs'));
    }

    public function create()
    {
        return view('timelogs.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'log_date' => 'required|date|before_or_equal:today',
            'task' => 'required|string|max:255',
            'hours' => 'required|integer|min:0|max:10',
            'minutes' => 'required|integer|min:0|max:59',
        ]);

        // Prevent if leave exists for the date
        $leaveExists = Leave::where('user_id', Auth::id())
            ->whereDate('start_date', '<=', $request->log_date)
            ->whereDate('end_date', '>=', $request->log_date)
            ->exists();

        if ($leaveExists) {
            return back()->with('error', 'Cannot log work on a leave date.');
        }

        $totalMinutes = TimeLog::where('user_id', Auth::id())
            ->where('log_date', $request->log_date)
            ->get()
            ->sum(fn($log) => $log->hours * 60 + $log->minutes);

        $newEntryMinutes = ($request->hours * 60) + $request->minutes;

        if (($totalMinutes + $newEntryMinutes) > 600) {
            return back()->with('error', 'Total work time for this date exceeds 10 hours.');
        }

        TimeLog::create([
            'user_id' => Auth::id(),
            'log_date' => $request->log_date,
            'task' => $request->task,
            'hours' => $request->hours,
            'minutes' => $request->minutes,
        ]);

        return back()->with('success', 'Task logged successfully.');
    }

    public function edit($id)
    {
        $log = TimeLog::findOrFail($id);
        return view('timelogs.edit', compact('log'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'task' => 'required|string|max:255',
            'hours' => 'required|integer|min:0|max:10',
            'minutes' => 'required|integer|min:0|max:59',
        ]);

        $log = TimeLog::findOrFail($id);
        
        $totalMinutes = TimeLog::where('user_id', Auth::id())
            ->where('log_date', $log->log_date) // use existing log_date from DB
            ->where('id', '!=', $id) // exclude current log
            ->get()
            ->sum(fn($log) => $log->hours * 60 + $log->minutes);

        // Calculate new time in minutes
        $newEntryMinutes = ($request->hours * 60) + $request->minutes;
        
        if (($totalMinutes + $newEntryMinutes) > 600) {
            return back()
                ->with('error', 'Total work time for this date exceeds 10 hours.')
                ->withInput();
        }
    
        // Save updated values
        $log->update($request->only('task', 'hours', 'minutes'));
    
        return redirect('/timelogs')->with('success', 'Task updated.');
        
    }
}
