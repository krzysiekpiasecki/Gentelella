<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

/**
 * Top navigation test
 */
class TopNavTest extends WebTestCase
{
    /**
     * Test profile page
     */
    public function testProfile()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/profile');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Test settings page
     */
    public function testSettings()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/settings');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Test help page
     */
    public function testHelp()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/help');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * Test logout page
     */
    public function testLogout()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/logout');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
    
}
