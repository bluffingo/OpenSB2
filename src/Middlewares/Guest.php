<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace OpenSB2\Middlewares;

use OpenSB2\App;
use OpenSB2\Framework\Auth;
use OpenSB2\Framework\Middleware;

class Guest extends Middleware {
    public function handle($uri, $method) {
        $authService = App::container()->get(Auth::class);

        if ($authService->isLoggedIn()) {
            header("Location: /");
        }
    }
}
