<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @package App
 */
class Project extends Model
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
