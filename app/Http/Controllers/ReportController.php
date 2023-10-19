<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ReportController extends Controller
{

public function index()
{
    $reports = Report::all();
    return view('reports.index', compact('reports'));
}

public function create()
{
    return view('reports.create');
}

public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required',
        'content' => 'required',
        'recipients' => 'required',
        'schedule' => ['required', Rule::in(['weekly', 'daily', 'monthly'])],
        'specific_time' => 'nullable|date_format:H:i', 
    ]);

    $data['user_id'] = auth()->id();

    if (empty($data['specific_time'])) {
        $data['specific_time'] = null; 
    }

    Report::create($data);

    return redirect()->route('reports.index')->with('success', 'Report created successfully');
}


public function show(Report $report)
{
    return view('reports.show', compact('report'));
}


}
