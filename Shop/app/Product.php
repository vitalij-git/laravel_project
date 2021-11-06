<?php

namespace App;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Sortable;

    protected $fillable = ['title', 'excerpt', 'price','description','image',  'category_id'];

    public $sortable = ['id', 'title', 'price',  'category_id'];
    public function categoryID()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

}
