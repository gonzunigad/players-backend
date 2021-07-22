<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public function scopeSearch($query, $searchText)
    {
        if ($searchText !== null) {
            $words = explode(' ', $searchText);
            // Separate and search by searched word? I am not sure if that is the wanted result but i
            foreach($words as $word) {
                $query->where(function($query) use ($word) {
                    $query->where('nickname', 'LIKE', '%' . $word . '%')
                        ->orWhere('status', 'LIKE', '%' . $word . '%');
                });
            }
        }

        return $query;
    }
}
