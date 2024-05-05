<?php
// Copyright Chaziz and Bittoco 2024, all rights reserved.

namespace Qobo\Framework;

class DateUtilities {
    private int $year;

    // NOTE: unix timestamps in the db should always be the *actual* date.
    // so stuff "from 2004" should still be listed in the db as being from 2024.
    public function currentTimeToQoboTime() {
        return strtotime('-20 year', time());
    }

    public function qoboTimeToActualTime($time) {
        return strtotime('+20 year', $time);
    }

    public function actualTimeToQoboTime($time) {
        return strtotime('-20 year', $time);
    }
}