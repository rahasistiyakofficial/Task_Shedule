@extends('layouts.app')

@section('content')
    <h1>Report List</h1>
    <a href="{{ route('reports.create') }}" class="btn btn-primary">Create New Report</a>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Schedule</th>
                <th>Specific Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($reports as $report)
                <tr>
                    <td>{{ $report->title }}</td>
                    <td>{{ $report->schedule }}</td>
                    <td>{{ $report->specific_time ? $report->specific_time : 'N/A' }}</td>
                    <td>
                        <a href="{{ route('reports.show', $report) }}" class="btn btn-info">View</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
