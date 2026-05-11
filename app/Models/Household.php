<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Household extends Model
{
    protected $primaryKey = 'household_id';
    public $incrementing = true;
    protected $keyType = 'int';

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
        'has_pregnant_member',
        'household_number',
        'evacuation_area',
        'preparedness_status',
        'score',
        'last_assessed'
    ];

    protected $casts = [
        'last_assessed' => 'datetime',
        'has_pregnant_member' => 'boolean',
    ];

    public function recordedBy()
    {
        return $this->belongsTo(User::class, 'recorded_by');
    }
}
