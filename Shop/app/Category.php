<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Category extends Model
{
    use Sortable;

    protected $fillable = ['title','description','shop_id'];

    public $sortable = ['id', 'title', 'shop_id','description'];
    public function shopID()
    {
        return $this->belongsTo(Category::class, 'shop_id', 'id');
    }
    public function hasManyProduct() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }
}
