<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Traits\ApiTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use ApiTrait;
        public function index()
        {
            $user = Auth::user();
            return $this->ApiResponse(200,'success', null, $user);
        }

        public function changePassword(Request $request)
        {

        }




}
