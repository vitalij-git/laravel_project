<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function typeCompany() {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }
}
