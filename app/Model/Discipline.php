<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    protected $fillable = ['title_discipline'];

    public static function create($attributes): bool
    {
        $discipline = new self($attributes);
        return $discipline->save();
    }
}