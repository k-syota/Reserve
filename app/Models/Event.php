<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
        "information",
        "max_people",
        "start_date",
        "end_date",
        "is_visible",
    ];

    protected function eventDate():Attribute
    {
        return new Attribute(
            get: fn() => Carbon::parse($this->start_date)->format('Y年m年d日'),
        );
    }

    protected function startTime():Attribute
    {
        return new Attribute(
            get: fn() => Carbon::parse($this->start_date)->format('H時i分'),
        );
    }

    protected function endTime():Attribute
    {
        return new Attribute(
            get: fn() => Carbon::parse($this->end_date)->format('H時i分'),
        );
    }
}
