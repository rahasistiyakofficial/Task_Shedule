@extends('layouts.app')

@section('content')
    <h1>{{ $report->title }}</h1>
    <p><strong>Content:</strong> {{ $report->content }}</p>
    <p><strong>Recipients:</strong> {{ $report->recipients }}</p>
    <p><strong>Schedule:</strong> {{ $report->schedule }}</p>
    <p><strong>Specific Time:</strong> {{ $report->specific_time ? $report->specific_time : 'N/A' }}</p>
    <a href="{{ route('reports.index') }}" class="btn btn-secondary">Back to List</a>
@endsection
