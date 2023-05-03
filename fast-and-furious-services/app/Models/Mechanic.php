<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Raiting;

class Mechanic extends Model
{
    use HasFactory;

    protected $table = 'mechanics';

    public $primaryKey = 'id';

    public function raiting() {
        return $this->hasMany(Raiting::class);
    }

    protected $fillable = [
        'name',
        'phone_number',
        'years_of_experience',
        'email'
    ];

}
