<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\ReliefCampDemography;
use App\Models\PoliceStation;
use App\Models\PublicHealth;
use App\Models\AnganwadiCentre;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';

    /**
     * Get the reliefCampDemography that owns the address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reliefCampDemography()
    {
        return $this->hasOne(ReliefCampDemography::class);
    }

    /**
     * Get the policeStation that owns the address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function policeStation()
    {
        return $this->hasOne(PoliceStation::class);
    }

    /**
     * Get the publicHealth that owns the address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function publicHealth()
    {
        return $this->hasOne(PublicHealth::class);
    }

    /**
     * Get the anganwadiCentre that owns the address
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function anganwadiCentre()
    {
        return $this->hasOne(AnganwadiCentre::class);
    }
}
