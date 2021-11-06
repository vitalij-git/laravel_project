<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class author extends Model
{
    use Sortable;
    protected $fillable= ['name','surname'];
    protected $sortable=['id','name','surname'];
    public function authorBooks(){
        return $this->hasMany(Book::class, 'author_id', 'id');
    }
}
