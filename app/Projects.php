<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    /**
     * Assignable attributes.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'link',
        'slug'
    ];
}
