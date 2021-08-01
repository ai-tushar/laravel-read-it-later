<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateContentRequest;
use App\Http\Resources\ContentResource;
use App\Repositories\Interfaces\ContentRepositoryInterface;
use App\Traits\ResponseAble;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    use ResponseAble;

    private $contentRepository;

    public function __construct(ContentRepositoryInterface $contentRepository)
    {
        $this->contentRepository = $contentRepository;
    }

    public function index($pocketId)
    {
        try {
            $contents = $this->contentRepository->allByPocketId($pocketId);
            return $this->respondSuccess([
                'contents' => ContentResource::collection($contents)
            ]);
        } catch (\Exception $e) {
            return $this->respondInternalError(); //$e->getMessage();
        }
    }

    public function store(CreateContentRequest $request, $pocketId)
    {
        try {
            $content = $this->contentRepository->create($pocketId, $request->all());
            return $this->respondSuccess([
                'content' => new ContentResource($content)
            ]);
        } catch (\Exception $e) {
            return $this->respondInternalError($e->getMessage()); //$e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $this->contentRepository->delete($id);
            return $this->respondSuccess([], 'Successfully Deleted!');
        } catch (\Exception $e) {
            return $this->respondNotFound();
        }
    }
}
