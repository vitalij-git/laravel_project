<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class task extends Model
{

    use Sortable;

    protected $table = "tasks";

    protected $fillable = ["title", "description", "type_id"];

    public $sortable = ["id", "title", "description", "type_id"];

    public function typeTask()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }
    public function ownerTask()
    {
        return $this->belongsTo(Owner::class, 'owner_id', 'id');
    }
}
