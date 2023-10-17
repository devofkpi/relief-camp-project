<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ReliefCamp;
use App\Models\SubDivision;

class NodalOfficer extends Model
{
    use HasFactory;

    /**
     * Get all of the comments for the nodal_officer
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reliefCamps()
    {
        return $this->hasMany(ReliefCamp::class);
    }
    /**
     * Get the subDivision that owns the NodalOfficer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
}
