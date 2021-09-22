<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use DB;
class Section extends Model
{
    protected $guarded = ['id', 'created_at'];

    public function topics(): HasMany
    {
        return $this->hasMany(Topic::class);
    }

    public function getAllSection()
    {
        $result = DB::connection('sqlite_external')
        ->table('sections')
        ->select('name','id','created_at','updated_at')
        ->get()->toArray();
        $data = collect($result)->map(function($x){ return (array) $x; })->toArray(); 
        return $data;
    }

    public function createSection($data)
    {
        DB::connection('sqlite')->table('sections')->insert($data);
    }

    public function updateSection($data)
    {
        DB::connection('sqlite')->table('sections')->where('id',  $data['id'])->update($data);
    }

    public function deleteSection($id)
    {
        DB::connection('sqlite')->table('sections')->delete($id);
    }
}
