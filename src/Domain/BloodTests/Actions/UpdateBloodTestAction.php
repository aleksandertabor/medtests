<?php

namespace Domain\BloodTests\Actions;

use Domain\BloodTests\DataTransferObjects\BloodTestData;
use Domain\BloodTests\Models\BloodTest;

class UpdateBloodTestAction
{
    public function __invoke(BloodTest $bloodTest, BloodTestData $bloodTestData): BloodTest
    {
        $bloodTest->fill([
            'name' => $bloodTestData->name,
        ])->save();

        $bloodTest->categories()->sync($bloodTestData->categories);

        return $bloodTest->refresh();
    }
}
