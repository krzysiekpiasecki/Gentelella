<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace AppBundle;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Test template pages.
 */
class GentelellaTest extends WebTestCase
{
    /**
     * Provides non extra pages.
     *
     * @return array
     */
    public static function provideNonExtraPages()
    {
        return [
        ['/gentelella'],
        ['/gentelella/index'],
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
        ['/gentelella/media_gallery'],
        ['/gentelella/morisjs'],
        ['/gentelella/other_charts'],
        ['/gentelella/plain_page'],
        ['/gentelella/pricing_tables'],
        ['/gentelella/profile'],
        ['/gentelella/project_detail'],
        ['/gentelella/projects'],
        ['/gentelella/tables'],
        ['/gentelella/tables_dynamic'],
        ['/gentelella/typography'],
        ['/gentelella/widgets'],
        ];
    }

    /**
     * @Test
     *
     * Test 'Back to the application' button
     *
     * @param string $url
     * @dataProvider \AppBundle\GentelellaTest::provideNonExtraPages()
     */
    public function testBackToApp($url)
    {
        $client = (new \TestClient('test', 'test'))->auth();
        $client->request('GET', $url);

        $link = $client->getCrawler()->selectLink('Back to the application')->link();

        $crawler = $client->click($link);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
