<?php
// Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

namespace OpenSB2\Framework;

interface Storage {
    public function processVideo($new, $target_file);
    public function processImage($new, $target_file);
    public function processMusic($new, $target_file);
    public function processFlash($new, $target_file);

    public function uploadProfilePicture($temp_name, $new);
}
