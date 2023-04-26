<?php

namespace App\Models;

use App\Models\RelationShips\TaskRelationShips;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use HasFactory;
    use SoftDeletes;
    use TaskRelationShips;

    protected $fillable = ['name', 'priority', 'project_id'];
}
