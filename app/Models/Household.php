<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    protected $fillable = [
        'recorded_by',
        'household_head',
        'house_no',
        'street_name',
        'sitio',
        'contact_number',
        'latitude',
        'longitude',
        'total_family_members',
        'total_pwd',
        'total_seniors',
        'total_infants',
        'has_pregnant_member'
    ];

    protected $primaryKey = 'household_id';
}
