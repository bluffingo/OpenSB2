#!/bin/bash

# Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

# /c/xampp/bitqobo/tools/compile-scss.sh true dev
# 1st parameter: if true, this loads sass.bat instead of sass. this is for me (chaziz)
# 2nd parameter: enables "--watch" in sass. i guess.

command=$2
executable=$1
common_arguments="--style expanded --no-source-map --load-path ./"

if [ "$command" = "dev" ]; then
    # include source maps for development, they're pretty useful for debugging
    common_arguments="--style expanded --watch --load-path ./"
fi

# check if SASS is in path.
if [ ! command -v sass &> /dev/null ]; then
    echo "ERROR: sass is not installed on this system. check if it's in your PATH"
    exit 1
fi

# load sass.bat on windows because when you download a windows build of dart-sass,
# the filename for it is "sass.bat".

sass_executable="sass"

if [ "$executable" = "true" ]; then
    # for those on windows who installed dart-sass via a zip on github and not scoop/choco/whatever
    sass_executable="sass.bat"
fi

$sass_executable $common_arguments scss/:public/img/
