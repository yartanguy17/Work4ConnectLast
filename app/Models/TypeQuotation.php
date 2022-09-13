<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeQuotation extends Model
{
    use HasFactory;

    public function quotations()
    {
        return $this->hasMany(Quotation::class);
    }
}
