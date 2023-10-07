<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ReliefCamp;

class ReliefCampFacility extends Model
{
    use HasFactory;

    /**
     * Get the relief_camp that owns the relief_camp_facility
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reliefCamp()
    {
        return $this->hasOne(ReliefCamp::class);
    }

}
