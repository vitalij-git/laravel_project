<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class book extends Model
{
    use Sortable;

    protected $fillable = ['title', 'isbn', 'pages', 'about', 'author_id'];

    public $sortable = ['id', 'title', 'isbn', 'pages', 'about', 'author_id'];
    public function authorBook()
    {
        return $this->belongsTo(Author::class, 'author_id', 'id');
    }
}
