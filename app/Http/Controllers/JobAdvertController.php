<?php

namespace App\Http\Controllers;

use App\Models\JobAdvert;
use Illuminate\Http\Request;

class JobAdvertController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $query = JobAdvert::query()
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
