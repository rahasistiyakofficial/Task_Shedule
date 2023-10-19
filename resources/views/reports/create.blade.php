@extends('layouts.app')

@section('content')
    <h1>Create a New Report</h1>
    <form method="post" action="{{ route('reports.store') }}">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="recipients">Recipients</label>
            <input type="email" name="recipients" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="schedule">Schedule</label>
            <select name="schedule" class="form-control" required>
                <option value="daily">Daily</option>
                <option value="weekly">Weekly</option>
                <option value="monthly">Monthly</option>
            </select>
        </div>
        
        <div class="form-group">
            <label for="time">Specific Time</label>
            <input type="time" name="specific_time" class="form-control" required>
        </div>
        

        
        <button type="submit" class="btn btn-primary">Create Report</button>
    </form>
@endsection
