<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    public function applicants()
    {
        return $this->hasMany(Applicant::class, 'division_id');
    }
}
