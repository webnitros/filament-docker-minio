<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Support\Carbon;

class CompleteController extends Controller
{

    public function build(\Illuminate\Http\Request $request)
    {
        $Query = Log::query();
        $domain = trim($request->route('domain'));
        $log_id = $request->route('log_id');
        if (!empty($log_id)) {
            if (!$Log = Log::find($log_id)) {
                return response()->json([
                    'message' => 'Not found',
                    'status_code' => 404,
                    'domain' => null,
                    'site' => null,
                ], 404);
            }
        } else {
            if (!$domain) {
                return response()->json([
                    'message' => 'Not found',
                    'status_code' => 404,
                    'domain' => null,
                    'site' => null,
                ], 404);
            }

            if (!$Log = $Query->where('domain', $domain)->get()?->first()) {
                return response()->json([
                    'message' => 'Not found',
                    'status_code' => 404,
                    'domain' => $domain,
                    'site' => null,
                ], 404);
            }
        }

        $message = null;
        if ($running_info = $Log->runningInfo()) {
            $message = view('filament/resources/build-resource/progress', [
                'start_date' => Carbon::parse($Log->queued_date)->diffForHumans(),
                'leftSeconds' => $running_info['leftSeconds'],
                'percentageComplete' => $running_info['percentageComplete'],
            ])->render();
        }

        $status_code = $Log->status_code;
        return response()->json([
            'message' => $message,
            'domain' => $Log->domain(false),
            'site' => $Log->site(),
            'status_code' => $status_code,
            'status' => $Log->status,
            'state' => $Log->state,
            'running_info' => $running_info,
            'links' => [
                'state' => '/api/build/state/' . $Log->id,
                'rebuild' => '/api/build/run/' . $Log->id,
            ]
        ]);
    }

}
