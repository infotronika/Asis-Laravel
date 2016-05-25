<?php

namespace App;

use App\Person;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['phone'];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'person_id' => 'int',
    ];

    /**
     * Get the person that owns the contact.
     */
    public function person()
    {
        return $this->belongsTo(Person::class);
    }
}
