<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\TimeLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::where('user_id', Auth::id())->get();
        return view('leaves.index', compact('leaves'));
    }
    
    public function create()
    {
        return view('leaves.create');
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $logConflict = TimeLog::where('user_id', Auth::id())
            ->whereBetween('log_date', [$request->start_date, $request->end_date])
            ->exists();

        if ($logConflict) {
            return back()->with('error', 'Cannot apply leave for dates with logged work.');
        }

        Leave::create([
            'user_id' => Auth::id(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->route('leaves.index')->with('success', 'Leave applied successfully.');
    }
}
