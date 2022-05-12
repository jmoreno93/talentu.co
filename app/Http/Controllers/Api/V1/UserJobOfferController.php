<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobOffer;
use App\Models\User;
use App\Models\UserJobOffer;

use App\Http\Resources\V1\UserJobOfferResource;
use App\Http\Resources\V1\UserJobOfferCollection;

class UserJobOfferController extends Controller
{
    public function index()
    {
        $userJobOffer = UserJobOffer::join('job_offers', 'user_job_offers.job_offer_id', '=', 'job_offers.id')
            ->leftJoin('users', 'user_job_offers.user_id', '=', 'users.id')
            ->select('user_job_offers.job_offer_id','job_offers.description', 'user_job_offers.user_id','users.email','user_job_offers.id')
            ->orderBy('user_job_offers.job_offer_id', 'asc')
            ->get();
        $data = [];
        $i = 0;
        $users = [];
        foreach ($userJobOffer as $key => $value) {
            $users[] = [
                'job_offer_id' => $value->job_offer_id,
                'id' => $value->user_id,
                'email' => $value->email,
            ];
            if(@$data[$i-1]['job_offer_id'] != $value->job_offer_id)
            {
                $data[] = [
                    'id' => $value->id,
                    'job_offer_id' => $value->job_offer_id,
                    'description' => $value->description,
                ];
                $i++;
            }
        }
        for ($i=0; $i < count($data) -1; $i++) { 
            for ($x=0; $x < count($users) -1; $x++) { 
                if($users[$x]['job_offer_id'] == $data[$i]['job_offer_id'])
                    $data[$i]['users'][] = $users;
            }
        }
        return response()->json(paginateArray($data), 200);
        //return new UserJobOfferCollection($data);
    }
    public function show(UserJobOffer $userJobOffer)
    {
        return new UserJobOfferCollection(array($userJobOffer));
    }
    public function store(Request $request)
    {
        $request->validate([
            'job_offer_id' => 'required|integer|max:1000|min:1',
            'user_id' => 'required|integer|max:1000|min:1',
        ]);
        User::findOrFail($request['user_id']);
        JobOffer::findOrFail($request['job_offer_id']);
        $userJobOfferCheck = UserJobOffer::where('user_id', $request['user_id'])
            ->where('job_offer_id', $request['job_offer_id'])->first();
        if($userJobOfferCheck != null)
            return response()->json(['message' => 'Row duplicated', 'errors' => []], 422);
        $userJobOffer = UserJobOffer::create([
            'job_offer_id' => $request['job_offer_id'],
            'user_id' => $request['user_id'],
        ]);
        return new UserJobOfferCollection(array($userJobOffer));
    }
    public function destroy($userJobOffer)
    {
        $userJobOffer = UserJobOffer::find($userJobOffer);
        if($userJobOffer == null)
        {
            return response()->json([
                'message' => "User job offer doesn't exist",
                'errors' => '',
            ], 422);
        }
        $userJobOffer->delete();
        return new UserJobOfferCollection(array());
    }
}
