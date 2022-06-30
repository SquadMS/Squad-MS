@echo off

:: Configure environment (if it is not already configured)
IF "!" "-f" "%CD%env" (
  COPY  "%CD%env.example" "%CD%env"
)

:: Install Packagist dependencies (without post-* scripts)
docker "run" "--rm" "-u" "%undefined%:%undefined%" "-v" "%undefined%:\var\www\html" "-w" "\var\www\html" "laravelsail\php81-composer:latest" "composer" "install" "--no-scripts" "--ignore-platform-reqs"