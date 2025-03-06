<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandDetailsSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'logo',
        'favicon',
        'brand_description',
        'contact_email',
        'contact_phone',
        'facebook',
        'twitter',
        'instagram',
        'linkedin',
    ];
}
