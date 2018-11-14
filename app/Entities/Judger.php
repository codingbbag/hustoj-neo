<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Judger
 *
 * @package App\Entities
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $code
 * @property int $status
 * @property string $bind_ip
 * @property int $category
 */
class Judger extends Model
{
    const ST_ACTIVITY = 1;
    const ST_DEACTIVATE = 0;
}
