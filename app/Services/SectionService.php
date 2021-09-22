<?php

namespace App\Services;
use App\Models\Section;
class SectionService
{
    protected $sectionService;
    public function __construct(Section $Section)
    {
        $this->Section = $Section;
    }
    
    public function getAll()
    {
        $data = $this->Section->getAllSection();
        return $data;
    }
    
    public function getSectionByName($name)
    {
        return Section::where('name',$name)->get();
    }

    public function create($postdata)
    {
        try{
            $this->Section->createSection($postdata);
        }catch(\Exception $e){
            echo $e;
        }
     
    }

    public function update($data)
    {
        
        $this->Section->update($data);
    }

    public function delete($id)
    {
        
        $this->Section->delete($id);
    }
}