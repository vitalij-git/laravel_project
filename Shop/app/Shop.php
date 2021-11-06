<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Shop extends Model
{
    use Sortable;

    protected $fillable = ['title','description','email','phone','country'];

    public $sortable = ['id', 'title','description','email','phone','country'];

    public function hasManyCategory() {
        return $this->hasMany(Category::class, 'shop_id', 'id');
    }

}
