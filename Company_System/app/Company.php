<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    // public function companyContact() {
    //     return $this->belongsTo(Contact::class, 'contact_id', 'id');
    // }
    public function contact()
    {
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'id', 'company_id');
    }
    public function typeHasMany() {
        return $this->hasMany(Type::class, 'company_id', 'id');
    }
}

