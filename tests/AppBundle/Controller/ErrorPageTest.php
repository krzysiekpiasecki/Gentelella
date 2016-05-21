<?php

namespace tests\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test error pages:.
 *
 * - 403 (Access denied)
 * - 404 (Not found)
 * - 500 (Server error)
 */
class ErrorPageTest extends WebTestCase
{
    /**
     * Test 404 page.
     */
    public function test404Page()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/_error/404');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSame(
            '404',
            $crawler->filter('h1.error-number')->text()
        );
    }

    /**
     * Test 500 page.
     */
    public function test500Page()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/_error/500');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSame(
            '500',
            $crawler->filter('h1.error-number')->text()
        );
    }

    /**
     * Test 403 page.
     */
    public function test403Page()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/_error/403');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSame(
            '403',
            $crawler->filter('h1.error-number')->text()
        );
    }

    /**
     * Test custom error page.
     */
    public function testCustomPage()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/_error/800');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertSame(
            '800',
            $crawler->filter('h1.error-number')->text()
        );
    }
}
