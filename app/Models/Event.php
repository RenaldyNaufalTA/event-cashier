<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Event extends Model
{
    use Sluggable;

    protected $guarded = ['id'];

    public $timestamps = false;

    protected $dates = ['end_date', 'start_date'];

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
