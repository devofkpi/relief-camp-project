<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ReliefCamp;
use App\Models\FamilyHead;
use App\Models\FamilyHeadRelation;
use App\Models\Address;

class ReliefCampDemography extends Model
{
    use HasFactory;

    /**
     * The reliefCamp that belong to the relief_camp_demography
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function reliefCamp()
    {
        return $this->belongsTo(ReliefCamp::class);
    }

    /**
     * Get the familyHead associated with the relief_camp_demography
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function familyHead()
    {
        return $this->belongsTo(FamilyHead::class);
    }

    /**
     * Get the familyHeadRelation associated with the relief_camp_demography
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function familyHeadRelation()
    {
        return $this->belongsTo(FamilyHeadRelation::class);
    }
    
    /**
     * Get the address associated with the relief_camp_demography
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
