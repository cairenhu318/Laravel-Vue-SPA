<?php

namespace Laraspace;

use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    public function contacts() 
    {
        return $this->belongsToMany(Contact::class);
    }

}
