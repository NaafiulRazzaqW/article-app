<?php

namespace App\Models\Articles;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArticlesModel extends Model
{
    protected $table = "articles";

    protected $fillable = ['title', 'image', 'description'];

    protected static function boot() {
        parent::boot();

        static::creating(function ($articles) {
            $articles->slug = $articles->generateUniqueSlug($articles->title);
        } );

        static::updating(function ($articles) {
            if($articles->isDirty('title')) {
                $articles->slug = $articles->generateUniqueSlug($articles->title);
            }
            if ($articles->isDirty('image') && $articles->getOriginal('image')) {
                Storage::disk('public')->delete($articles->getOriginal('image'));
            }
        });

        static::deleting(function ($articles) {
            if($articles->image) {
                Storage::disk('public')->delete($articles->image);
            }
        });
    }

    protected function generateUniqueSlug($title) {
        $slug = Str::slug($title);
        $originalSlug = $slug;
        $count = 1;

        while (DB::table('articles')->where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        return $slug;
    }

    public function getRouteKey(){
        return 'slug';
    }
}
