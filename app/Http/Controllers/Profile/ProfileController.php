<?php

namespace App\Http\Controllers\Profile;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\ProfileRequest;

class ProfileController extends Controller
{
    public function index(): View
    {
        return view('profile.index');
    }

    public function edit(): View
    {
        return view('profile.modal');
    }

    public function update(ProfileRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();

            auth()->user()->update($request->only([
                'name',
                'phone',
                'alt_phone',
                'address',
            ]));

            DB::commit();

            return $this->jsonResponse([
                'message' => 'Profile updated successfully.',
                'params' => [
                    'name' => auth()->user()->name,
                    'phone' => auth()->user()->phone,
                    'alt_phone' => auth()->user()->alt_phone,
                    'address' => addEllipsis(auth()->user()->address, 40),
                    'description' => addEllipsis(auth()->user()->description, 47),
                ]
            ], JsonResponse::HTTP_OK);
        } catch (\Exception $e) {
            DB::rollBack();
            return $this->jsonResponse($e->getMessage(), $e->getCode());
        }
    }
}
