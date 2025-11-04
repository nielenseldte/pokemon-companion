<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Card extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'cards';

    
}
