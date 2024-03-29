<?php

namespace Model;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['title_position'];

    public static function create($attributes): bool
    {
        $position = new self($attributes);
        return $position->save();
    }
}