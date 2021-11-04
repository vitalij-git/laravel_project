<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    public function authorBook()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
