<?php

namespace App\Http\Controllers;

use App\Models\Perfume;
use Illuminate\Http\Request;

class PerfumeController extends Controller
{
    public function index(Request $request)
    {
        $query = Perfume::query();

        // dzimums filtrs
        if ($request->has('gender') && !empty($request->gender)) {
            $query->whereIn('gender', $request->gender);
        }

        // sezons filtrs
        if ($request->has('season') && !empty($request->season)) {
            $query->whereIn('season', $request->season);
        }

        // meklēšana filtrs
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = $request->search;
            $query->where(function($q) use ($searchTerm) {
                $q->where('name', 'like', "%{$searchTerm}%")
                  ->orWhere('brand', 'like', "%{$searchTerm}%");
            });
        }

        return response()->json($query->get());
    }
}