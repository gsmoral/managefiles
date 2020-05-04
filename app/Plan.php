<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = [
        'plan_name', 'plan_description', 'plan_price', 'plan_type', 'name', 'description', 'btn_label', 'amount'
    ];
}
