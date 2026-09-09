<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PageSection extends Model
{
    protected $fillable = [
        'page_slug',
        'section_key',
        'section_name',
        'title',
        'subtitle',
        'badge',
        'content',
        'image',
        'image_caption',
        'button_text',
        'button_link',
        'secondary_button_text',
        'secondary_button_link',
        'items',
        'order',
        'is_active',
    ];

    protected $casts = [
        'items' => 'array',
        'is_active' => 'boolean',
        'order' => 'integer',
    ];

    public static function getSection(string $pageSlug, string $sectionKey, $default = null): ?self
    {
        return static::where('page_slug', $pageSlug)
            ->where('section_key', $sectionKey)
            ->first() ?? $default;
    }

    public function getImageUrlAttribute(): ?string
    {
        if (empty($this->image)) {
            return null;
        }

        // If stored in storage/
        if (str_starts_with($this->image, 'page-sections/')) {
            return asset('storage/' . $this->image);
        }

        // If direct asset link
        if (str_starts_with($this->image, 'assets/') || str_starts_with($this->image, 'http://') || str_starts_with($this->image, 'https://')) {
            return asset($this->image);
        }

        return asset($this->image);
    }
}
