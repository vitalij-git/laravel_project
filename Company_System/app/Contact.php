<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public function companyOne()
    {
        return $this->hasOne('App\Company');
    }
}
