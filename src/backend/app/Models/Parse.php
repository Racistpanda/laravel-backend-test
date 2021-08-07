<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Parse extends Model
{
    use HasFactory;

    protected string $table = 'parse';

    protected array $fillable = ['tag'];

    protected array $guarded = ['id'];

    public function parseData(): HasMany
    {
        return $this->hasMany(ParseData::class);
    }

    public function percentageDone()
    {
         return DB::table($this->table)
            ->select(DB::raw('100 * count(finished.id) / count(all.id) as percentage'))
            ->leftJoin('parse_data as all', 'parse.id', '=', 'all.parse_id')
            ->leftJoin('parse_data as finished', function ($join) {
                $join
                    ->on('parse.id', '=', 'finished.parse_id')
                    ->where('finished.finished', '=', true);
            })
            ->where('parse.id', '=', $this->id)
            ->first()
        ;
    }
}
