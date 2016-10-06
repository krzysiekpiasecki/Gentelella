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
 * @see TopNavController
 */
class TopNavControllerTest extends WebTestCase
{
    public function testProfile()
    {
        $client = new \WebTestClient();
        $authClient = $client->logIn();
        $crawler = $authClient->request('GET', '/profile');
        $this->assertEquals(200, $authClient->getResponse()->getStatusCode());
    }
}
