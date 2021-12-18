<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'subject',
        'priority',
        'details',
        'status',
        'agent_name',
    ];

    public static function search($search)
    {
        return empty($search)
            ? static::query()
            : static::query()->where('id', 'LIKE', '%' . $search . '%')
            ->orWhere('customer_name', 'LIKE', '%' . $search . '%')
            ->orWhere('subject', 'LIKE', '%' . $search . '%')
            ->orWhere('agent_name', 'LIKE', '%' . $search . '%')
            ->orWhere('priority', 'LIKE', '%' . $search . '%')
            ->orWhere('details', 'LIKE', '%' . $search . '%')
            ->orWhere('status', 'LIKE', '%' . $search . '%');
    }
}
