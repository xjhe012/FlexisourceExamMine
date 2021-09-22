<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Topic extends Model
{
    protected $guarded = ['id', 'created_at'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owned_by_user_id');
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function getAllTopics()
    {
        $result = DB::connection('sqlite_external')
        ->table('topics')
        ->select('section_id','id','body','title','user_id','created_at','updated_at')
        ->get()->toArray();
        $data = collect($result)->map(function($x){ return (array) $x; })->toArray(); 
        return $data;
    }

    public function createTopic($data)
    {
        DB::connection('sqlite')->table('topics')->insert($data);
    }

    public function updateTopic($data)
    {
        DB::connection('sqlite')->table('topics')
            ->where('title', '=' ,$data['title'])
            ->where('section_id','=',$data['section_id'])
            ->update($data);
    }

    public function deleteTopic($id)
    {
        DB::connection('sqlite')->table('topics')->delete($id);
    }
}
