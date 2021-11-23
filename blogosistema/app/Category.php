<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use App\Post;
class Category extends Model
{
    use Sortable;

    protected $fillable = ['title','description'];

    public $sortable = ['id', 'title','description'];
    public function hasManyPost() {
        return $this->hasMany(Post::class, 'id', 'category_id');
    }
}
