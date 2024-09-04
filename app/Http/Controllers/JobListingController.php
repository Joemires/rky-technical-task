<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
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

        return $query->paginate();
    }
}
