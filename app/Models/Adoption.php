<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */

    protected $fillable = [
        'user_id',
        'pet_id',

    ];

    // Relationships:
    // adoption belongsTo User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // adoption belongsTo Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    
    // Scopes Names
    public function scopeName($adoptions, $q)
    {
        if (trim($q)) {
            $adoptions->where('user_id', 'LIKE', "%$q%")
                ->orWhere('pet_id', 'LIKE', "%$q%");
        }
    }
}
