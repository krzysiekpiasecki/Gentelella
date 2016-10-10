<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Tests for dead links.
 *
 * @see DefaultController
 */
class URLTest extends WebTestCase
{
    /**
     * @Test
     * @dataProvider provideUrl
     *
     * @param string $url Relative page url
     */
    public function testResponseOK($url)
    {
        $authClient = (new \TestClient('test', 'test'))->auth();
        $authClient->request('GET', $url);
        $this->assertEquals(200, $authClient->getResponse()->getStatusCode());
    }

    /**
     * @return array
     */
    public function provideUrl()
    {
        return [
            ['/'],
            ['/profile'],
            ['/contacts'],
            ['/calendar'],
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
