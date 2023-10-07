<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReliefCamp;

class SubDivision extends Model
{
    use HasFactory;
    /**
     * Get all of the comments for the sub_division
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reliefCamps()
    {
        return $this->hasMany(ReliefCamp::class);
    }
    public function nodalOfficers()
    {
        return $this->hasMany(NodalOfficer::class);
    } 
}
