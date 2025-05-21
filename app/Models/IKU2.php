<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IKU2 extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'iku_2';

    protected $guarded = ['id'];

    public function select_list() {
        return $this->belongsTo(SelectList::class, 'select_id');
    }
}
