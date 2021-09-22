<?php

namespace App\Http\Controllers\Sync;

use App\Http\Controllers\Controller;
use App\Services\MessageService;
use Illuminate\Http\Request;

class SyncMessageController extends Controller
{
    protected $messageService;
    public function __construct(messageService $messageService)
    {
        $this->messageService = $messageService;
    }

    public function show($id)
    {
        $data = $this->messageService->getSectionById($id);
    }

    public function store($data)
    {
        $data = $this->messageService->create($data);
    }

    public function update($data)
    {
        $data = $this->messageService->update($data);
    }

    public function destroy()
    {
        $data = $this->messageService->delete($data);
    }

    
    
}