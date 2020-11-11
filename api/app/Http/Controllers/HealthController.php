<?php

namespace App\Http\Controllers;

class HealthController extends Controller
{
    public function getAction()
    {
        return response()->json(['name' => 'Levi', 'province' => 'AB', 'DOB' => 'June, 12 1991' ]);
    }
}