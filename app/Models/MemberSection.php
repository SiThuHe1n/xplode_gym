<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberSection extends Model
{
    use HasFactory;

    public function section()
    {
        return $this->belongsTo(Section::class,'trainer_section');
    }

    public function package()
    {
        return $this->belongsTo(Package::class,'package_id');
    }
    public function trainer()
    {
        return $this->belongsTo(Staff::class,'trainer_id');
    }
    public function member()
    {
        return $this->belongsTo(Member::class,'member_id');
    }
}
