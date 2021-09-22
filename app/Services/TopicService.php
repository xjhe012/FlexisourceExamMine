<?php

namespace App\Services;
use App\Models\Topic;
class TopicService
{
    protected $topicService;
    public function __construct(Topic $topic)
    {
        $this->topic = $topic;
    }
    
    public function getAll()
    {
        $data = $this->topic->getAllTopic();
        return $data;
    }
    
    public function getTopicByTitle($name)
    {
        return Topic::where('name',$name)->get();
    }

    public function create($postdata)
    {
     
        // $data['section_id'] = $postdata['section_id'];
        // $data['title'] = $postdata['title'];
        // $data['body'] = $postdata['body'];
        // $data['user_id'] = $postdata['user_id'];
        try{
            $this->topic->createTopic($postdata);
        }catch(\Exception $e){
            echo $e;
        }
     
    }

    public function update($data)
    {
        
        $this->topic->update($data);
    }

    public function delete($id)
    {
        
        $this->topic->delete($id);
    }
}