<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\SubDivision;
use App\Models\ReliefCampFacility;
use App\Models\ReliefCampDemography;
use App\Models\NodalOfficer;

class ReliefCamp extends Model
{
    use HasFactory;

    /**
     * Get the sub_division that owns the relief_camp
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function subDivision()
    {
        return $this->belongsTo(SubDivision::class);
    }

    /**
     * Get the reliefCampFacility associated with the relief_camp
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function reliefCampFacility()
    {
        return $this->belongsTo(ReliefCampFacility::class);
    }

    /**
     * Get all of the reliefCampDemography for the relief_camp
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reliefCampDemography()
    {
        return $this->hasMany(ReliefCampDemography::class);
    }

    /**
     * Get the nodalOfficer that owns the ReliefCamp
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nodalOfficer()
    {
        return $this->belongsTo(NodalOfficer::class);
    }
}
