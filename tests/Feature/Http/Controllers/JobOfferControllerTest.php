<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\JobOffer;
class JobOfferControllerTest extends TestCase
{
    use RefreshDatabase;
    public function testJobOfferList()
    {
        $this->withoutMiddleware();
        $response = $this->get('api/v1/job_offer');
        $response->assertStatus(200);
    }
    public function testJobOffer()
    {
        $jobOffer = JobOffer::factory()->create();
        $this->withoutMiddleware();
        $response = $this->get("api/v1/job_offer/$jobOffer");
        $response->assertStatus(200);
    }
    public function testJobOfferValidation()
    {
        $this->withoutMiddleware();
        //Create
        $this->post("api/v1/job_offer", [
            'description' => 'Backend Developer PHP',
            'status' => 1,
        ])->assertStatus(200);
        
        //Duplicate
        /*
        $this->post("api/v1/job_offer", [
            'description' => 'Backend Developer PHP',
            'status' => 1,
        ])->assertStatus(422);
        */
        //Empty
        $this->post("api/v1/job_offer", [
            'description' => '',
            'status' => null,
        ])
        ->assertSessionHasErrors('description')
        ->assertSessionHasErrors('status');
    }
    public function testJobOfferDestroy()
    {
        $jobOffer = JobOffer::factory()->create();
        $this->withoutMiddleware();
        $response = $this->delete("api/v1/job_offer/$jobOffer->id");
        $response->assertStatus(200);
    }
}
