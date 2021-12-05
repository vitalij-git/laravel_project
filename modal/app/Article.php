<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public function articleType() {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
}
