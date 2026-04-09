<?php

use App\Models\Log;

function system_log($action, $description = null)
{
    Log::create([
        'user_id' => auth()->id(),
        'action' => $action,
        'description' => $description,
        'ip_address' => request()->ip(),
    ]);
}