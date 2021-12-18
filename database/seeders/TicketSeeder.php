<?php

namespace Database\Seeders;

use App\Models\Ticket;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ticket = [
            [
                // 'id' => 1,
                'customer_name' => 'John Smith',
                'subject' => 'Cant Access My Account',
                'priority' => 'normal',
                'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, illum! Reprehenderit provident quas fugit ad ipsum fugiat ut saepe id facilis dolor, cupiditate corporis totam enim perferendis culpa, iste voluptatem?',
                'status' => 'pending',
            ],
            [
                // 'id' => 2,
                'customer_name' => 'Sarah Jones',
                'subject' => 'Can Login And But Cant My Access Dashboard',
                'priority' => 'urgent',
                'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, illum! Reprehenderit provident quas fugit ad ipsum fugiat ut saepe id facilis dolor, cupiditate corporis totam enim perferendis culpa, iste voluptatem?',
                'status' => 'pending',
            ],
            [
                // 'id' => 3,
                'customer_name' => 'Adefemi Oguns',
                'subject' => 'Cant Access My Account',
                'priority' => 'important',
                'details' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, illum! Reprehenderit provident quas fugit ad ipsum fugiat ut saepe id facilis dolor, cupiditate corporis totam enim perferendis culpa, iste voluptatem?',
                'status' => 'pending',
            ],
        ];

        Ticket::insert($ticket);
    }
}
