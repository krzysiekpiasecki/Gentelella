<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Smoke test.
 */
class SmokeTest extends WebTestCase
{
    /**
     * Logged client.
     */
    private static $client = null;

    /**
     * Set up before class.
     */
    public static function setUpBeforeClass()
    {
        if (is_null(self::$client)) {
            $client = static::createClient();
            $crawler = $client->request('GET', '/login');
            $form = $crawler->filter('form')->form(array(
                '_username' => 'test',
                '_password' => 'test',
            ));
            $client->submit($form);
            $crawler = $client->followRedirect();
            self::$client = $client;
        }
    }

    /**
     * Tear down after class.
     */
    public static function tearDownAfterClass()
    {
        $client = self::$client;
        $client->request('GET', '/logout');
    }

    /**
     * @dataProvider provideUrl
     */
    public function testUrl($url)
    {
        $client = self::$client;
        $crawler = $client->request('GET', $url);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    /**
     * @return array
     */
    public function provideUrl()
    {
        return [
            ['/'],
            ['/profile'],
            ['/gentelella'],
            ['/gentelella'],
            ['/gentelella/calendar'],
            ['/gentelella/chartjs'],
            ['/gentelella/chartjs2'],
            ['/gentelella/contacts'],
            ['/gentelella/e_commerce'],
            ['/gentelella/echarts'],
            ['/gentelella/fixed_footer'],
            ['/gentelella/fixed_sidebar'],
            ['/gentelella/form'],
            ['/gentelella/form_advanced'],
            ['/gentelella/form_buttons'],
            ['/gentelella/form_upload'],
            ['/gentelella/form_validation'],
            ['/gentelella/form_wizards'],
            ['/gentelella/general_elements'],
            ['/gentelella/glyphicons'],
            ['/gentelella/icons'],
            ['/gentelella/inbox'],
            ['/gentelella/index'],
            ['/gentelella/index2'],
            ['/gentelella/index3'],
            ['/gentelella/invoice'],
            ['/gentelella/level2'],
            ['/gentelella/login'],
            ['/gentelella/map'],
            ['/gentelella/media_gallery'],
            ['/gentelella/morisjs'],
            ['/gentelella/other_charts'],
            ['/gentelella/page_403'],
            ['/gentelella/page_404'],
            ['/gentelella/page_500'],
            ['/gentelella/plain_page'],
            ['/gentelella/pricing_tables'],
            ['/gentelella/profile'],
            ['/gentelella/project_detail'],
            ['/gentelella/projects'],
            ['/gentelella/tables'],
            ['/gentelella/tables_dynamic'],
            ['/gentelella/typography'],
            ['/gentelella/widgets'],
            ['/gentelella/xx'],
        ];
    }
}
