<?php

require_once 'app/autoload.php';

try {
    $kernel = new AppKernel('test', false);
    $kernel->boot();

    if (null == $kernel->getContainer()->get('doctrine')->getRepository('\AppBundle\Entity\User')->findByEmail('test@example.com')) {
        shell_exec('php bin/console fos:user:create test test@example.com test');
    }

    shell_exec('php bin/console fos:user:activate test');
    shell_exec('php bin/console fos:user:promote test ROLE_ADMIN');
} finally {
    $kernel->shutdown();
    register_shutdown_function(function () {
        shell_exec('php bin/console fos:user:deactivate test');
        shell_exec('php bin/console fos:user:demote test ROLE_ADMIN');
    });
}

class TestClient
{
    private static $client;
    private $username;
    private $password;

    /**
     * TestClient constructor.
     *
     * @param $username
     * @param $password
     */
    public function __construct($username = 'test', $password = 'test')
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function auth()
    {
        if (null == self::$client) {
            self::$client = $this->client();
        }

        return self::$client;
    }

    private function client()
    {
        $kernel = new AppKernel('test', false);
        $kernel->boot();
        $client = $kernel->getContainer()->get('test.client');
        $crawler = $client->request('GET', '/login');
        $form = $crawler->filter('form')->form(array(
            '_username' => $this->username,
            '_password' => $this->password,
        ));
        $client->submit($form);
        $client->followRedirect();

        return $client;
    }

    public function logout()
    {
        self::$client->request('GET', '/logout');
        self::$client->followRedirect();
        self::$client = null;
    }
}
