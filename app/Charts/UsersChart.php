<?php

namespace App\Charts;

use App\Models\Ticket;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class UsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $tickets = Ticket::all();
        foreach ($tickets as $ticket) {
            if ($ticket->status == 'closed') {
                $closedV[] = $ticket->status;
            } else {
                $pendingV[] = $ticket->status;
            }
        }
        $countC = count($closedV);
        $countP = count($pendingV);
        return $this->chart->pieChart()
            ->setTitle('Top 3 scorers of the team.')
            ->setSubtitle('Season 2021.')
            ->addData([40, 50])
            ->setLabels(['Closed Tickets', 'Pending Tickets']);
    }
}
