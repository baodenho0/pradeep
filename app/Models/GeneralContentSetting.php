<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralContentSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'disclaimer',
        'copyright_text',
        'address',
        'meta_description',
        'google_map_embed',
        'meta_keyword',
        'opening_hours',
        'google_analytics_id',
        'alternative_phone',
        'tagline',
        'support_email',
    ];
}
