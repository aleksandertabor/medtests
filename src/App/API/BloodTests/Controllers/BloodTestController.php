<?php

namespace App\API\BloodTests\Controllers;

use App\API\BloodTests\Requests\BloodTestRequest;
use App\API\BloodTests\Resources\BloodTestResource;
use App\API\Controller;
use Domain\BloodTests\Actions\CreateBloodTestAction;
use Domain\BloodTests\Actions\DeleteBloodTestAction;
use Domain\BloodTests\Actions\UpdateBloodTestAction;
use Domain\BloodTests\DataTransferObjects\BloodTestData;
use Domain\BloodTests\Models\BloodTest;

class BloodTestController extends Controller
{
    public function index()
    {
        $query = BloodTest::query();

        return BloodTestResource::collection($query->paginate());
    }

    public function store(BloodTestRequest $request, CreateBloodTestAction $createBloodTestAction)
    {
        $bloodTestData = BloodTestData::fromRequest($request);

        $bloodTest = $createBloodTestAction($bloodTestData);

        return new BloodTestResource($bloodTest);
    }

    public function show(BloodTest $bloodTest)
    {
        return new BloodTestResource($bloodTest);
    }

    public function update(BloodTest $bloodTest, BloodTestRequest $request, UpdateBloodTestAction $updateBloodTestAction)
    {
        $bloodTestData = BloodTestData::fromRequest($request);

        $bloodTest = $updateBloodTestAction($bloodTest, $bloodTestData);

        return new BloodTestResource($bloodTest);
    }

    public function destroy(BloodTest $bloodTest, DeleteBloodTestAction $deleteBloodTestAction)
    {
        $deleteBloodTestAction($bloodTest);

        return response()->json([], 204);
    }
}
