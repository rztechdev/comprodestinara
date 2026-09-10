<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Destination extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'badge',
        'location',
        'lead',
        'description',
        'research_focus',
        'module_name',
        'capacity',
        'image_path',
        'gallery_paths',
        'is_featured',
        'is_active',
        'order',
    ];

    protected $casts = [
        'gallery_paths' => 'array',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    use \App\Traits\LocalizableModel;

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true)->orderBy('order', 'asc');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function getNameAttribute($value) { return $this->getLocalized('name'); }
    public function getBadgeAttribute($value) { return $this->getLocalized('badge'); }
    public function getLocationAttribute($value) { return $this->getLocalized('location'); }
    public function getLeadAttribute($value) { return $this->getLocalized('lead'); }
    public function getDescriptionAttribute($value) { return $this->getLocalized('description'); }
    public function getResearchFocusAttribute($value) { return $this->getLocalized('research_focus'); }
    public function getModuleNameAttribute($value) { return $this->getLocalized('module_name'); }
    public function getCapacityAttribute($value) { return $this->getLocalized('capacity'); }

    public function getImageUrlAttribute(): string
    {
        if (empty($this->image_path)) {
            return asset('assets/img/hd/dest-wonosadi.jpg');
        }
        if (str_starts_with($this->image_path, 'http://') || str_starts_with($this->image_path, 'https://')) {
            if (str_contains($this->image_path, 'googleusercontent.com') && !str_contains($this->image_path, '=s') && !str_contains($this->image_path, '=w')) {
                return $this->image_path . '=s0';
            }
            return $this->image_path;
        }
        if (str_starts_with($this->image_path, 'assets/')) {
            return asset($this->image_path);
        }
        return asset('storage/' . $this->image_path);
    }
}