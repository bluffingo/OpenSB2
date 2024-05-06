#!/bin/bash

# Copyright Chaziz Multimedia Entertainment and Bittoco 2024, all rights reserved.

command=$1
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

case "$(uname -s)" in
    CYGWIN*|MINGW*|MSYS*)
        sass_executable="sass.bat"
        ;;
    *)
        sass_executable="sass"
        ;;
esac

$sass_executable $common_arguments scss/:public/img/
