<?php

namespace Deployer;

use App\Utility\StringUtility;

desc("Update env");

task('custom:update_env', function () {
    $env_string = file_get_contents('.env.production');
    if (StringUtility::isEmpty($env_string)) {
        echo "Empty env file";
        exit(1);
    }
    set('env_string', $env_string);
//    dd(get('env_string'));
    run("cd {{release_path}} && rm -f .env && echo \"$env_string\" > .env");
    invoke("artisan:config:clear");
});
