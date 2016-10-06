<?php

require_once 'app/autoload.php';

shell_exec('php bin/console fos:user:activate test');

register_shutdown_function(function () {
    shell_exec('php bin/console fos:user:deactivate test');
});

class WebTestClient
{
    private $username;
    private $password;

    /**
     * WebTestClient constructor.
     *
     * @param $username
     * @param $password
     */
    public function __construct($username = 'test', $password = 'test')
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function logIn()
    {
        static $client = null;

        if ($client === null) {
            $kernel = new AppKernel('test', false);
            $kernel->boot();
            $client = $kernel->getContainer()->get('test.client');

            $crawler = $client->request('GET', '/logout');
            $crawler = $client->request('GET', '/login');

            $form = $crawler->filter('form')->form(array(
                '_username' => $this->username,
                '_password' => $this->password,
            ));
            $client->submit($form);
            $client->followRedirect();
        }

        return $client;
    }
}
