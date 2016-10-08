<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * TopNavControllerTest.
 *
 * @coversDefaultClass \AppBundle\Controller\TopNavController
 */
class TopNavControllerTest extends WebTestCase
{
    /**
     * @Test
     * @covers :: profileAction
     */
    public function testProfile()
    {
        $authClient = (new \TestClient('test', 'test'))->auth();
        $crawler = $authClient->request('GET', '/profile');
        $this->assertSame('Profile', trim($crawler->filter('.title_left h3')->text()));
    }

    /**
     * @Test
     */
    public function testLogoutAction()
    {
        $client = new \TestClient('test', 'test');

        $authClient = $client->auth();
        $link = $authClient->getCrawler()->filter('a[href="/logout"]')->link();
        $authClient->click($link);
        $authClient->followRedirect();
        $authClient->followRedirect(); // Logout makes 2 redirects
        $crawler = $authClient->getCrawler();
        $this->assertSame('Login Form', trim($crawler->filter('h1')->text()));
        $client->logout();
    }
}
