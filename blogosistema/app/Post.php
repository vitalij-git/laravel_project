<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Post extends Model
{
    use Sortable;

    protected $fillable = ['title','description','category_id'];

    public $sortable = ['id', 'title','description','category_id'];
}
