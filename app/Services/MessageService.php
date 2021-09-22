<?php

namespace App\Services;
use App\Models\Message;
class MessageService
{
    public function __construct(message $message)
    {
        $this->message = $message;
    }
    
    public function getAll()
    {
        $data = $this->message->getAllMessage();
        return $data;
    }
    
    public function getMessageByTitle($name)
    {
        return Message::where('name',$name)->get();
    }

    public function create($postdata)
    {
     
        // $data['topic_id'] = $postdata['topic_id'];
        // $data['is_hightlight'] = $postdata['is_hightlight'];
        // $data['body'] = $postdata['body'];
        // $data['user_id'] = $postdata['user_id'];
        try{
            $this->message->createMessage($postdata);
        }catch(\Exception $e){
            echo $e;
        }
     
    }

    public function update($data)
    {
        
        $this->message->update($data);
    }

    public function delete($id)
    {
        
        $this->message->delete($id);
    }
}