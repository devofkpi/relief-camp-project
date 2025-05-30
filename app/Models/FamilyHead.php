<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ReliefCampDemography;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class FamilyHead extends Model
{
    use HasFactory;

    protected $fillable=['family_head_name'];

    /**
     * Get the reliefCampDemography that owns the family_head
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reliefCampDemography()
    {
        return $this->hasOne(ReliefCampDemography::class);
    }
}
