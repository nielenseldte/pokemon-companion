<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use MongoDB\Laravel\Eloquent\Model;

class Card extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'cards';

    
}
