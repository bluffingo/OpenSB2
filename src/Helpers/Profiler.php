<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace OpenSB2\Helpers;

// people: how bad of a profiler can you make
// me:
class Profiler {
    protected static $startTime;

    public static function start() {
        self::$startTime = microtime(true);
    }

    public static function getInfo() {
        if (self::$startTime === null) {
            throw new \Exception("You haven't started the timer!");
        }

        printf("rendered in %1.3fs with %dKB memory used.", microtime(true) - self::$startTime, memory_get_usage(false) / 1024);
    }
}
