<?php

namespace App\Http\Controllers;

use App\Models\OrganizationMember;
use Illuminate\Http\Request;

class OrganizationMemberController extends Controller
{
    //
    public function get($id) {
        $data = OrganizationMember::where('organization_id', $id)->get();
        return response()->json([
            'code' => 200,
            'message' => 'success',
            'data' => $data
        ], 200);
    }

    public function edit_role(Request $request, $id)
    {
        try {
            $member = OrganizationMember::where('user_id', $request->input('user_id'))->where('role_id', $request->input('role_id'))->first();
            if($member === null) {
                $member = new OrganizationMember;
                $member->organization_id = $id;
                $member->user_id = $request->input('user_id');
                $member->role_id = $request->input('role_id');
                $member->save();
                return response()->json([
                    'code ' => 201,
                    'message' => 'registered',
                    'data' => $member
                ], 201);
            } else {
                return response()->json([
                    'code' => 200,
                    'message' => 'success',
                    'data' => $member
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'error',
                'data' => $e->getMessage()
            ], 500);
        }
    }
}
