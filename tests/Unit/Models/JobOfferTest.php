<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\JobOffer;
class JobOfferTest extends TestCase
{
    public function testInsert()
    {
        $jobOffer = new JobOffer;
        $jobOffer->description = 'PHP Backend developer';
        $jobOffer->status = 1;
        $this->assertEquals(1, $jobOffer->status);
    }
}
