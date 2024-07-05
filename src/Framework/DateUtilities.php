<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace OpenSB2\Framework;

class DateUtilities {
    private int $year;

    // NOTE: unix timestamps in the db should always be the *actual* date.
    // so stuff "from 2004" should still be listed in the db as being from 2024.
    public function currentTimeToQoboTime() {
        return strtotime('-20 year', time());
    }

    // how should these be named?
    public function currentQoboTimeToWaybackMachineURLDate() {
        $currentQoboTime = strtotime('-20 year', time());
        return date('Ymd', $currentQoboTime);
    }

    public function qoboTimeToActualTime($time) {
        return strtotime('+20 year', $time);
    }

    public function actualTimeToQoboTime($time) {
        return strtotime('-20 year', $time);
    }
}
