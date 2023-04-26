<?php

namespace App\Models\RelationShips;


use App\Models\Project;

trait TaskRelationShips
{
    public function project() {
        return $this->hasOne(Project::class, 'id', 'project_id');

    }

}
