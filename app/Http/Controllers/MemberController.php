<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMember;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMember $request)
    {
        Member::query()->create([
            'project_id' => $request->post('project_id'),
            'user_id' => $request->post('user_id')
        ]);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        $member->delete();
        return redirect()->back();
    }
}
