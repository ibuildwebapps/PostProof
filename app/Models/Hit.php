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
        'expected_content_types',
        'client_ips',
        'default_locale',
        'user_agent',
        'post_data',
        'get_data',
        'headers',
    ];
}
