<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AnnouncementCategory;

class Announcement extends Model
{
    use HasFactory;


    /**
     * Get the announcementCategory associated with the announcement
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function announcementCategory()
    {
        return $this->belongsTo(AnnouncementCategory::class, 'announcement_category_id', 'announcement_category_id');
    }
}
