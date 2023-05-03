<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Raiting;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';

    public $primaryKey = 'id';

    public function raiting() {
        return $this->hasMany(Raiting::class);
    }

    protected $fillable = [
        'name',
    ];

}
