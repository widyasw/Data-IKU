<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IKU8 extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'iku_8';

    protected $guarded = ['id'];
}
