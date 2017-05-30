<?php

require_once "vendor/autoload.php";

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;


try {
    $kernel = new AppKernel('prod', false);
    $kernel->boot();

    $dbConnection = $kernel->getContainer()->get('database_connection');
    $dbConnection->ping();


    $out = '';
    $rv = 0;

    // exec('php bin/console doctrine:database:create --if-not-exists', $out, $rv);
    // if (0 !== $rv) {
    //     throw new \RuntimeException();
    // }

    // $out = '';
    // $rv = 0;

    // @exec('php bin/console doctrine:schema:create', $out, $rv);
    // if (0 !== $rv) {
    //     throw new \RuntimeException();
    // }

    $process = new Process('php bin/console fos:user:create --super-admin');
    $process->run();

    $process = new Process('bower install');
    $process->run();

    foreach ($process as $type => $data) {
        if ($process::OUT === $type) {
            echo "\nRead from stdout: ".$data;
        } else { // $process::ERR === $type
            echo "\nRead from stderr: ".$data;
        }
    }

} catch(\Doctrine\DBAL\Exception\ConnectionException $e) {

    printf("Ping to database server failed: %s\n", $e->getMessage());
    exit(1);
    
} finally {
    
    $kernel->shutdown();   

}