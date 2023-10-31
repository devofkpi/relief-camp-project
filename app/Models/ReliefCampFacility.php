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
        'separate_kitchen',
        'open_space',
        'water_tanks_capacity',
        'water_avail_ratio',
        'number_of_toilets',
        'toilet_ratio_per_person',
        'number_of_buckets',
        'bucket_ratio_per_person',
        'number_of_mugs',
        'mug_ratio_per_person',
        'sufficient_cooking_utensils',
        'number_of_mattresses',
        'mattress_ratio_per_person',
        'number_of_bedsheets',
        'bedsheet_ratio_per_person',
        'number_of_pillows',
        'pillow_ratio_per_person',
        'number_of_blankets',
        'blanket_ratio_per_person',
        'number_of_mosquitos',
        'mosquito_ratio_per_person',
        'sufficient_lighting_facility',
        'number_of_fans',
        'fans_ratio_per_person',
        'sufficient_plates_glasses',
        'fuel_sources',
        'availability_of_fuel_in_days',
        'availability_of_rice_in_days',
        'availability_of_dal_in_days',
        'availability_of_veg_in_days',
        'number_of_persons_staying_at_night',
        'availability_of_food_grains_in_days',
        'safe_drinking_water',
        'provisioning_of_supplement',
        'availability_of_soap_consumable_in_days',
        'number_of_school_going_students',
        'per_of_students_linked_to_school',
        'number_of_child_identified_anganwadi',
        'number_of_child_linked_anganwadi',
        'per_child_linked_anganwadi',
        'number_of_pregnant_women',
        'number_of_pregnant_women_linked_health',
        'per_of_pregnant_women_linked_health',
        'number_of_disabled_person',
        'number_of_disabled_person_linked_facility',
        'per_of_disabled_person_linked_facility',
        'number_of_child_separated_parents',
        'number_of_child_separated_parents_linked_sw',
        'per_of_child_separated_parents_linked_sw',
        'date_visit_of_health',
        'date_visit_of_phed',
        'date_visit_of_social_welfare',
        'date_visit_of_cafpd',
        'date_visit_of_edu',
        'date_visit_of_pow',
        'date_visit_of_mahud_ceo_adc',
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
