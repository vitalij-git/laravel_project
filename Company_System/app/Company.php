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
        return $this->belongsTo('App\Contact');
    }
}

