<?php

namespace App\Http\Livewire\Dashboard;

use App\Charts\UsersChart;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;

class Charts extends Component
{
    public function render(UsersChart $chart)
    {
        $ticketClosed = auth()->user()->hasAnyRole('User') && Ticket::where('status', 'closed')->where('agent_name', auth()->user()->name)->count();
        $users = User::all();
        foreach ($users as $user) {
            if ($user->hasAnyRole('Admin')) {
                $adminUser[] = $user;
            }
            if ($user->hasAnyRole('Supervisor')) {
                $supervisorUser[] = $user;
            }
            if ($user->hasAnyRole('User')) {
                $normalUser[] = $user;
            }
        }
        $chartUser = LarapexChart::setType('pie')
            ->setTitle('Total Number of Users')
            ->setLabels(['Admin', 'Supervisor', 'User'])
            ->setColors(['#ffc63b', '#ff6384', '#90cdf4'])
            ->setDataset([
                count($adminUser),
                count($supervisorUser),
                count($normalUser)
            ]);
        $s = $ticketClosed == 0 ? '' : 's';
        $v = $ticketClosed == 0 ? '0' : $ticketClosed;
        $getSubt = auth()->user()->hasAnyRole('User') ?  'You have closed ' . $v  . ' ticket' . $s : '';

        // dd($getSubt);
        $chart = LarapexChart::setType('pie')
            ->setTitle('Total Tickets')
            // ->setSubtitle('Physical sales vs Digital sales.')/
            ->setSubtitle($getSubt)
            ->setLabels(['Closed Tickets', 'Pending Tickets'])
            ->setDataset([
                auth()->user()->hasAnyRole('User') ? \App\Models\Ticket::where('status', '=', 'closed')->where('agent_name', auth()->user()->name)->count() : \App\Models\Ticket::where('status', '=', 'closed')->count(),
                \App\Models\Ticket::where('status', '=', 'pending')->count()
            ]);

        return view(
            'livewire.dashboard.charts',
            [
                'chart' => $chart,
                'chartUser' => $chartUser,
                // 'totalTicketByAgent' => $ticketClosed
            ]
        );
    }
}
