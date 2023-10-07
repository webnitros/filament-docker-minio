<?php

namespace App\Http\Controllers;

use App\Http\Resources\Links\LinkCollection;
use App\Http\Resources\Links\LinkResource;
use App\Models\Link;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{

    public function index(\Illuminate\Http\Request $request)
    {

        $data = [
            'sites' =>[]
        ];
        return !app()->environment('testing')
            ? view('welcome', $data)
            : response()->json($data);
    }
}
