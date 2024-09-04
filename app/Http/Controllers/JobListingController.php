<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Exception;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $query = JobListing::query()
            ->when($request->title, fn ($query, $search) =>
                $query->where('title', 'like', '%' . $search . '%')
            )
            ->when($request->location, fn ($query, $search) =>
                $query->where('location', 'like', '%' . $search . '%')
            )
            ->when($request->category, fn ($query, $search) =>
                $query->where('category', 'like', '%' . $search . '%')
            )
            ->latest();

        try {
            return $query->paginate();
        } catch (Exception $th) {
            // Handle any error that may occur internally, example casting issue, etc
            $data = [
                'error' => true,
                'message' => 'We are sorry an error occurred from our end while trying to retrieve jobs, please try again later',
                'data' => []
            ];

            return response()->json(data: $data, status: 503);
        }
    }
}
