<?php

namespace App\Console\Commands;

use App\Models\Report;
use App\Jobs\SendReportEmail;
use Illuminate\Console\Command;

class SendReports extends Command
{
    protected $signature = 'app:send-reports';

    protected $description = 'Send scheduled reports';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Sending scheduled reports...');

        $now = now();
        $reports = Report::all();
        $dailyReports = Report::where('schedule', 'daily')->get();
        $weeklyReports = Report::where('schedule', 'weekly')->get();
        $monthlyReports = Report::where('schedule', 'monthly')->get();

        foreach ($reports as $report) {
            if ($report->specific_time) {
                if ($this->shouldSendAtSpecificTime($report)) {
                    $this->dispatchReportJob($report);
                    $this->info('Specific Time Scheduled reports sent successfully.');
                }
            }
        }

        foreach ($dailyReports as $report) {
            $this->dispatchReportJob($report);
            $this->info('Scheduled reports sent successfully.');
        }

        if ($now->isMonday()) {
            foreach ($weeklyReports as $report) {
                $this->dispatchReportJob($report);
                $this->info('Scheduled reports sent successfully.');
            }
        }

        if ($now->day === 1) {
            foreach ($monthlyReports as $report) {
                if ($this->shouldSendAtSpecificTime($report)) {
                    $this->dispatchReportJob($report);
                    $this->info('Scheduled reports sent successfully.');
                }
            }
        }
        
        $this->info('No Scheduled reports.');
    }

    private function shouldSendAtSpecificTime($report)
    {
        return $report->specific_time !== null &&
        (now()->subMinute()->format('H:i:s') <= $report->specific_time ||
        now()->addMinute()->format('H:i:s') >= $report->specific_time);
    }

    private function dispatchReportJob($report)
    {
        SendReportEmail::dispatch($report);
    }
}
