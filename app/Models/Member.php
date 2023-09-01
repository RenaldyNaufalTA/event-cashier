<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $guarded = ['id'];

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function getRouteKeyName()
    {
        return 'id_member';
    }

    public function scopeFilter($query)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('id_member', 'like', '%' . $search . '%')
                ->orWhere('nama', 'like', '%' . $search . '%');
        });
    }
}