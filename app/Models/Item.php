<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Item extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'code',
        'name',
        'category',
        'estimated_value',
        'description',
        'status',
    ];

    protected $casts = [
        'estimated_value' => 'decimal:2',
    ];

    public function getImageAttribute()
    {
        return $this->getFirstMediaUrl('items') ?: 'https://via.placeholder.com/40';
    }
} 