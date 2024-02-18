#!/bin/bash

command=$1
common_arguments="--style expanded --no-source-map --load-path ./"

if [ "$command" = "dev" ]; then
    common_arguments+=" --watch"
fi

case "$(uname -s)" in
    CYGWIN*|MINGW*|MSYS*)
        sass_executable="sass.bat"
        ;;
    *)
        sass_executable="sass"
        ;;
esac

$sass_executable $common_arguments scss/:site/img/