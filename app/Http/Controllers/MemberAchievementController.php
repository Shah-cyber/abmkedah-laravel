<?php

namespace App\Http\Controllers;

use App\Models\Joinevent;
use Illuminate\Http\Request;
use App\Models\AllocatedMerit;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MemberAchievementController extends Controller
{
    
    public function index(Request $request)
    {
        $memberId = auth()->user()->member_id;
    
        $data = DB::table('joinevent')
            ->join('abmevent', 'joinevent.event_id', '=', 'abmevent.event_id')
            ->leftJoin('allocated_merit', function ($join) use ($memberId) {
                $join->on('allocated_merit.event_id', '=', 'joinevent.event_id')
                     ->where('allocated_merit.member_id', '=', $memberId);
            })
            ->select(
                'abmevent.event_name',
                'allocated_merit.merit_point'
            )
            ->where('joinevent.member_id', $memberId)
            ->paginate(10); // Paginate with 10 records per page
    
        return view('member.achievement-list', compact('data'));
    }
    


    
}
