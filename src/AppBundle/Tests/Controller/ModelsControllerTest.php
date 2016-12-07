<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ModelsControllerTest extends WebTestCase
{
    public function testModelspopup()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/ModelsPopup');
    }

}
