<?php


function isSpam($request, $unique_session_name) {
    $request->session()->regenerateToken();

    if($request->session()->has($unique_session_name)) {
        // if smaller than delay - redirect back with error
        if((time() - $request->session()->get($unique_session_name)) < 10) {
            return true;
        }
    }
    $request->session()->put($unique_session_name, time());
    return false;
}