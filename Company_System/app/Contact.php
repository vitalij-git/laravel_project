<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // public function companyOne()
    // {
    //     return $this->hasOne('App\Company');
    // }
    public function companyHasMany() {
        return $this->hasMany(Company::class, 'contact_id', 'id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class,  'id','contact_id');
    }
}
