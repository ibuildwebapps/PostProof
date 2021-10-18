<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hit extends Model
{
    protected $table = 'hit' ;
    use Timestamp ;
    use HasFactory;

    protected $fillable = [
        'tag',
        'scheme',
        'method',
        'default_locale',
        'remote_address',
        'remote_host',
        'user_agent',
        'raw_data',
        'headers',
    ];
}
