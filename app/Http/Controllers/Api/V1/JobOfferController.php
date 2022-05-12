<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobOffer;

use App\Http\Resources\V1\JobOfferResource;
use App\Http\Resources\V1\JobOfferCollection;
class JobOfferController extends Controller
{
    public function index()
    {
        return new JobOfferCollection(JobOffer::latest()->paginate());
    }
    public function show(JobOffer $jobOffer)
    {
        return new JobOfferCollection(array($jobOffer));
    }
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string|max:100',
            'status' => 'required|in:1,0',
        ]);
        $jobOffer = JobOffer::create([
            'description' => $request['description'],
            'status' => $request['status'],
        ]);
        return new JobOfferCollection(array($jobOffer));
    }
    public function destroy($jobOffer)
    {
        $jobOffer = JobOffer::find($jobOffer);
        if($jobOffer == null)
        {
            return response()->json([
                'message' => "Job offer doesn't exist",
                'errors' => '',
            ], 422);
        }
        $jobOffer->delete();
        return new JobOfferCollection(array());
    }
}
