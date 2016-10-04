<?php

require_once "app/autoload.php";

shell_exec('php bin/console fos:user:activate test');

register_shutdown_function(function(){
    shell_exec('php bin/console fos:user:deactivate test');
});