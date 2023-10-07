<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Address;

class PublicHealth extends Model
{
    use HasFactory;

      /**
     * Get the address associated with the anganwadi_centre
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
