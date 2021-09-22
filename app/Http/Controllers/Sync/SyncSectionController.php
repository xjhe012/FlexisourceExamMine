<?php

namespace App\Http\Controllers\Sync;

use App\Http\Controllers\Controller;
use App\Services\SectionService;
use Illuminate\Http\Request;

class SyncSectionController extends Controller
{
    protected $sectionService;
    public function __construct(sectionService $sectionService)
    {
        $this->sectionservice = $sectionService;
    }

    public function show($id)
    {
        $data = $this->sectionservice->getSectionById($id);
    }

    public function store($data)
    {
        $data = $this->sectionservice->create($data);
    }

    public function update($data)
    {
        $data = $this->sectionservice->update($data);
    }

    public function destroy()
    {
        $data = $this->sectionservice->delete($data);
    }

    
    
}