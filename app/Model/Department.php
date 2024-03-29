<?php

namespace Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['title_department'];

    public static function create($attributes): bool
    {
        $department = new self($attributes);
        return $department->save();
    }
}