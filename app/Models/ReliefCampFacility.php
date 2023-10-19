<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ReliefCamp;

class ReliefCampFacility extends Model
{
    use HasFactory;

    protected $fillable=[
        'building_type',
        'number_of_persons',
        'number_of_rooms',
        'number_of_halls',
        'number_of_toilets',
        'number_of_persons_utilising_toilets',
        'number_of_persons_staying_at_night',
        'number_of_mattresses',
        'number_of_badsheets',
        'number_of_blankets',
        'number_of_mosquito',
        'number_of_fans',
        'availability_of_food_grains_in_days',
        'availability_of_veg_in_days',
        'safe_drinking_water',
        'provisioning_of_supplement',
        'relief_camp_id'
    ];

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
