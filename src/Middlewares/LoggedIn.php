<?php
// Copyright Chaziz and Bittoco 2024, all rights reserved.

namespace Qobo\Middlewares;

use Qobo\App;
use Qobo\Framework\Auth;
use Qobo\Framework\Middleware;

class LoggedIn extends Middleware {
    public function handle($uri, $method) {
        $authService = App::container()->get(Auth::class);

        if (!$authService->isLoggedIn()) {
            header("Location: /signin.php");
            return;
        }
    }
}