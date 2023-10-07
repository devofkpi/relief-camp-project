<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Announement;

class AnnouncementCategory extends Model
{
    use HasFactory;

    protected $primaryKey='announcement_category_id';
    protected $table='announcement_categories';

    /**
     * Get the announcement that owns the announcement_category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function announcement()
    {
        return $this->hasOne(Announcement::class);
    }
}
