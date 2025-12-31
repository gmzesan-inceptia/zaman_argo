<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    protected $fillable = [
        'category_id','title','slug','description','image','old_price','new_price'
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    protected static function booted() {
        static::creating(function($p){
            if (empty($p->slug)) $p->slug = Str::slug($p->title).'-'.Str::random(6);
        });
        static::updating(function($p){
            if ($p->isDirty('title')) $p->slug = Str::slug($p->title).'-'.Str::random(6);
        });

        static::deleting(function($p){
            if ($p->image && Storage::disk('public')->exists($p->image)) {
                Storage::disk('public')->delete($p->image);
            }
            
            // Delete all associated product images
            foreach ($p->images as $productImage) {
                if (Storage::disk('public')->exists($productImage->image_path)) {
                    Storage::disk('public')->delete($productImage->image_path);
                }
                $productImage->delete();
            }
        });
    }
}
