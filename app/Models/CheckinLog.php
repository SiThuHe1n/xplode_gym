<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckinLog extends Model
{
    use HasFactory;

    public function trainer()
    {
        return $this->belongsTo(Staff::class,'trainer_id');
    }

    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }

}
