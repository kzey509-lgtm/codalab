<?php

namespace App\Http\Controllers;

use App\Models\Tutorial;
use Illuminate\View\View;

class TutorialController extends Controller
{
    public function index(): View
    {
        $tutorials = Tutorial::query()
            ->latest()
            ->paginate(12);

        return view('tutorial.index', [
            'tutorials' => $tutorials,
        ]);
    }
}

