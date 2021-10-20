<?php

namespace Domain\BloodTests\Actions;

use Domain\BloodTests\Models\BloodTest;

class DeleteBloodTestAction
{
    public function __invoke(BloodTest $bloodTest): void
    {
        $bloodTest->delete();
    }
}
