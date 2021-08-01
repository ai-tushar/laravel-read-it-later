<?php

namespace App\Http\Controllers;

use App\Http\Resources\ContentDataResource;
use App\Repositories\Interfaces\ContentDataRepositoryInterface;
use App\Traits\ResponseAble;
use Illuminate\Http\Request;

class ContentDataController extends Controller
{
    use ResponseAble;
    private $contentDataRepository;

    public function __construct(ContentDataRepositoryInterface $contentDataRepository)
    {
        $this->contentDataRepository = $contentDataRepository;
    }

    public function index($contentId)
    {
        try {
            $contentData = $this->contentDataRepository->allByContentId($contentId);
            return view('contentData', compact('contentData'));
        } catch (\Exception $e) {
            return $this->respondInternalError(); //$e->getMessage();
        }
    }
}
