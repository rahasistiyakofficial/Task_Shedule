<!DOCTYPE html>
<html>
<head>
    <title>{{ $report->title }}</title>
</head>
<body>
    <h1>{{ $report->title }}</h1>
    <p><strong>Content:</strong> {{ $report->content }}</p>
    <p><strong>Recipients:</strong> {{ $report->recipients }}</p>
    <p><strong>Schedule:</strong> {{ $report->schedule }}</p>
</body>
</html>
