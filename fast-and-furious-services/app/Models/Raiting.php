<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\Service;
use App\Models\Mechanic;

class Raiting extends Model
{
    use HasFactory;

    protected $table = 'raitings';

    public $primaryKey = 'id';

    public function userkey() {
        return $this->belongsTo(User::class, 'user');
    }

    public function servicekey() {
        return $this->belongsTo(Service::class, 'service');
    }

    public function mechanickey() {
        return $this->belongsTo(Mechanic::class, 'mechanic');
    }

    protected $fillable = [
        'date_and_time',
        'user',
        'mechanic',
        'service',
        'rating',
        'note'
    ];
}
