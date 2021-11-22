<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Category extends Model
{
    use Sortable;

    protected $fillable = ['title','description'];

    public $sortable = ['id', 'title','description',];
    public function hasManyPost() {
        return $this->hasMany(Post::class, 'post_id', 'id');
    }
}
