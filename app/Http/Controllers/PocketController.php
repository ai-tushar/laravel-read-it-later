<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePocketRequest;
use App\Http\Resources\PocketResource;
use App\Repositories\Interfaces\PocketRepositoryInterface;
use App\Traits\ResponseAble;

class PocketController extends Controller
{
    use ResponseAble;

    private $pocketRepository;

    public function __construct(PocketRepositoryInterface $pocketRepository)
    {
        $this->pocketRepository = $pocketRepository;
    }

    public function index()
    {
        $pockets = $this->pocketRepository->all(['contents']);

        return view('pockets', compact('pockets'));
    }

    public function store(CreatePocketRequest $request)
    {
        try {
            $pocket = $this->pocketRepository->create($request->all());
            return $this->respondSuccess([
                'pocket' => new PocketResource($pocket)
            ]);
        } catch (\Exception $e) {
            return $this->respondInternalError(); //$e->getMessage();
        }
    }

    public function destroy($id)
    {
        try {
            $this->pocketRepository->delete($id);
            return $this->respondSuccess([], 'Successfully Deleted!');
        } catch (\Exception $th) {
            return $this->respondNotFound();
        }
    }
}
