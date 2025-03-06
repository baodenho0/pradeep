<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    const TYPE_MAIN = 1;

    const STATUS_ACTIVE = 1;

    protected $fillable = [
        'slug',
        'url',
        'icon',
        'parent_id',
        'type',
        'position',
        'name_en',
        'name_np',
        'status',
    ];

    public function parent()
    {
        return $this->belongsTo(Menu::class, 'parent_id')->where('status', self::STATUS_ACTIVE);
    }


    public function children()
    {
        return $this->hasMany(Menu::class, 'parent_id')->where('status', self::STATUS_ACTIVE);
    }

    public function childrenRecursive()
    {
        return $this->hasMany(Menu::class, 'parent_id')->orderBy('position')->with('childrenRecursive');
    }
}
