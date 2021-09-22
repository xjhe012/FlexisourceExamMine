<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    protected $guarded = ['id', 'created_at'];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owned_by_user_id');
    }

    public function getAllMessage()
    {
        $result = DB::connection('sqlite_external')
        ->table('messages')
        ->select('topic_id','id','body','is_highlight','user_id','created_at','updated_at')
        ->get()->toArray();
        $data = collect($result)->map(function($x){ return (array) $x; })->toArray(); 
        return $data;
    }

    public function createMessage($data)
    {
        DB::connection('sqlite')->table('messages')->insert($data);
    }

    public function updateMessage($data)
    {
        DB::connection('sqlite')->table('messages')->where('id',  $data['id'])->update($data);
    }

    public function deleteMessage($id)
    {
        DB::connection('sqlite')->table('messages')->delete($id);
    }
}
