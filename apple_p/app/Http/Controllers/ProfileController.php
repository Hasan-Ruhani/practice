<?php

namespace App\Http\Controllers;

use App\Helper\ResponseHelper;
use App\Models\CustomerProfile;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function CreateProfile(Request $request): JsonResponse {
        $user_id = $request -> header('id');
        $request -> merge(['user_id' => $user_id]);
        $data = CustomerProfile::updateOrCreate(
            ['user_id', $user_id],
            $request -> input());
            return ResponseHelper::Out('success', $data, 200);
    }
}
