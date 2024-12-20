<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dose extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_id',
        'vaccine_id',
        'dose_type',
        'scheduled_date',
    ];

    public function registration()
    {
        return $this->belongsTo(Registration::class);
    }

    public function vaccine()
    {
        return $this->belongsTo(Vaccine::class);
    }

    public function givenBy()
    {
        return $this->belongsTo(User::class, 'given_by');
    }
}