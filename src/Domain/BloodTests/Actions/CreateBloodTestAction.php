<?php

namespace Domain\BloodTests\Actions;

use Domain\BloodTests\DataTransferObjects\BloodTestData;
use Domain\BloodTests\Models\BloodTest;

class CreateBloodTestAction
{
    public function __invoke(BloodTestData $bloodTestData): BloodTest
    {
        $bloodTest = BloodTest::create([
            'name' => $bloodTestData->name,
        ]);

        $bloodTest->categories()->sync($bloodTestData->categories);

        return $bloodTest;
    }
}
