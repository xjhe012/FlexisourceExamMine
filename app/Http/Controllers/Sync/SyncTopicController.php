<?php

namespace App\Http\Controllers\Sync;

use App\Http\Controllers\Controller;
use App\Services\TopicService;
use Illuminate\Http\Request;

class SyncTopicController extends Controller
{
    protected $topicService;
    public function __construct(topicService $topicService)
    {
        $this->topicService = $topicService;
    }

    public function show($id)
    {
        $data = $this->topicService->getSectionById($id);
    }

    public function store($data)
    {
        $data = $this->topicService->create($data);
    }

    public function update($data)
    {
        $data = $this->topicService->update($data);
    }

    public function destroy()
    {
        $data = $this->topicService->delete($data);
    }

    
    
}