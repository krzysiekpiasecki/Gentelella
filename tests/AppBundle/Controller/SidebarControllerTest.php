<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * SidebarControllerTest.
 *
 * @coversDefaultClass \AppBundle\Controller\SidebarController
 */
class SidebarControllerTest extends WebTestCase
{
    /**
     * @Test
     */
    public function testLogo()
    {
        $authClient = (new \TestClient('test', 'test'))->auth();

        $link = $authClient->getCrawler()->filter('.site_title')->link();
        $crawler = $authClient->click($link);
        $this->assertSame('Network Activities Graph title sub-title', trim($crawler->filter('.right_col h3')->text()));
    }

    /**
     * @Test
     */
    public function testDashboard()
    {
        $client = (new \TestClient('test', 'test'))->auth();

        $link = $client->getCrawler()->selectLink('Dashboard')->link();
        $crawler = $client->click($link);
        $this->assertSame('Network Activities Graph title sub-title', trim($crawler->filter('.right_col h3')->text()));
    }

    /**
     * @Test
     */
    public function testGoTemplateReturnApp()
    {
        $client = (new \TestClient('test', 'test'))->auth();

        // Go to the template
        $link = $client->getCrawler()->selectLink('Template')->link();
        $crawler = $client->click($link);

        // Return to the application
        $linkBack = $crawler->selectLink('Back to the application');
        $this->assertSame('Back to the application', $linkBack->text());
        $crawler = $client->click($linkBack->link());
        $this->assertSame('Network Activities Graph title sub-title', trim($crawler->filter('.right_col h3')->text()));
    }

    /**
     * @covers :: gentelellaAction
     */
    public function testPageNotFound()
    {
        $client = (new \TestClient('test', 'test'));
        $authClient = $client->auth();
        $crawler = $authClient->request('GET', 'fake-page');
        $this->assertSame('404', $crawler->filter('.error-number')->text());
        $client->logout();
    }

    /**
     * @Test
     */
    public function testLogoutAction()
    {
        $client = new \TestClient('test', 'test');

        $authClient = $client->auth();
        $link = $authClient->getCrawler()->filter('div.sidebar-footer a')->last()->link();
        $authClient->click($link);
        $authClient->followRedirect();
        $authClient->followRedirect(); // Logout makes 2 redirects
        $crawler = $authClient->getCrawler();
        $this->assertSame('Login Form', trim($crawler->filter('h1')->text()));
        $client->logout();
    }
}
