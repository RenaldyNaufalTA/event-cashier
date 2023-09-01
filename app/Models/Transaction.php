<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $guarded = ['id'];
    protected $with = ['member', 'event'];
    public function member()
    {
        return $this->belongsTo(Member::class, 'member_id', 'id_member');
    }
    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function getRouteKeyName()
    {
        return 'unique_number';
    }
}
