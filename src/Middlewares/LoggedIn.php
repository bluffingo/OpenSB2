<?php
/*
 * SPDX-License-Identifier: AGPL-3.0-only
 */

namespace OpenSB2\Middlewares;

use OpenSB2\App;
use OpenSB2\Framework\Auth;
use OpenSB2\Framework\Middleware;

class LoggedIn extends Middleware {
    public function handle($uri, $method) {
        $authService = App::container()->get(Auth::class);

        if (!$authService->isLoggedIn()) {
            header("Location: /signin");
            return;
        }
    }
}
