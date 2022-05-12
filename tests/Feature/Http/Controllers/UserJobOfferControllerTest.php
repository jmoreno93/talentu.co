<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\UserJobOffer;
use App\Models\User;
use App\Models\JobOffer;

class UserJobOfferControllerTest extends TestCase
{
    use RefreshDatabase;
    public function testUserJobOfferList()
    {
        $this->withoutMiddleware();
        $response = $this->get('api/v1/user_job_offer');
        $response->assertStatus(200);
    }
    public function testUserJobOffer()
    {
        $this->withoutMiddleware();
        $jobOffer = JobOffer::factory()->create();
        $user = User::factory()->create();
        //Create
        $userJobOffer = $this->post("api/v1/user_job_offer", [
            'job_offer_id' => $jobOffer->id,
            'user_id' => $user->id,
        ])->baseResponse->original[0];
        
        $response = $this->get("api/v1/user_job_offer/$userJobOffer->id");
        $response->assertStatus(200);
    }
    public function testUserJobOfferValidation()
    {
        $this->withoutMiddleware();
        $jobOffer = JobOffer::factory()->create();
        $user = User::factory()->create();
        //Create
        $this->post("api/v1/user_job_offer", [
            'job_offer_id' => $jobOffer->id,
            'user_id' => $user->id,
        ])->assertStatus(200);
        
        //Duplicate
        $this->post("api/v1/user_job_offer", [
            'job_offer_id' => $jobOffer->id,
            'user_id' => $user->id,
        ])->assertStatus(422);

        //Empty
        $this->post("api/v1/user_job_offer", [
            'job_offer_id' => null,
            'user_id' => null,
        ])
        ->assertSessionHasErrors('job_offer_id')
        ->assertSessionHasErrors('user_id');
    }
    public function testUserJobOfferDestroy()
    {
        $this->withoutMiddleware();
        $jobOffer = JobOffer::factory()->create();
        $user = User::factory()->create();
        //Create
        $userJobOffer = $this->post("api/v1/user_job_offer", [
            'job_offer_id' => $jobOffer->id,
            'user_id' => $user->id,
        ])->baseResponse->original[0];
        $response = $this->delete("api/v1/user_job_offer/$userJobOffer->id");
        $response->assertStatus(200);
    }
}
