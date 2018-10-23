<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function scopePublished($query) {
        return $query->whereIn('state', array(1,2));
    }

    public function scopeDescendingHits($query) {
        return $query->orderBy('hits', 'desc');
    }
}
