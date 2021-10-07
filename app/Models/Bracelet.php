<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class Bracelet extends Eloquent
{
    use SoftDeletes;
    protected $connection = "mongodb";
    protected $collection = 'Bracelet';

    protected $fillable = [
        '_id','uuid', 'blood_oxygenation', 'heart_rate','persons_id'
    ];
    protected $hidden = [
        'created_at', 'updated_at', 'deleted_at',
    ];
    public function persons()
    {
        return $this->belongsTo(Persons::class, 'persons_id', '_id');
    }
}
