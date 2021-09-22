<?php 

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\SectionService;
use App\Services\MessageService;
use App\Services\TopicService;
use App\Http\Controllers\Sync\SyncSectionController;
class MockApiController extends Controller{

    public function __construct(sectionService $sectionService,messageService $messageService,topicService $topicService)
    {
        $this->sectionservice = $sectionService;
        $this->messageService = $messageService;
        $this->topicService = $topicService;
    }

    public function MockApiSection()
    {
        $data = $this->sectionservice->getAll();
        foreach($data as $key => $val){
            $section_data = $this->sectionservice->getSectionByName($val['name']);
       
            if(empty($section_data)){
                $this->sectionservice->update($val);
            }else{
                $this->sectionservice->create($val);
            }
        }
    }

    public function MockApiMessage()
    {
        $data = $this->messageservice->getAll();
        foreach($data as $key => $val){
            $section_data = $this->messageservice->getSectionByName($val['name']);
       
            if(empty($section_data)){
                $this->messageservice->update($val);
            }else{
                $this->messageservice->create($val);
            }
        }
    }

    public function MockApiTopic()
    {
        $data = $this->topicservice->getAll();
        foreach($data as $key => $val){
            $section_data = $this->topicservice->getSectionByName($val['name']);
       
            if(empty($section_data)){
                $this->topicservice->update($val);
            }else{
                $this->topicservice->create($val);
            }
        }
    }
}