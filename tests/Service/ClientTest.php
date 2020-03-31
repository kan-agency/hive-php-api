<?php

namespace Kan\Hive\Tests\Service;

use Kan\Hive\Service\Client;
use Kan\Hive\Tests\AbstractTestCase;

class ClientTest extends AbstractTestCase
{
    public function urlProvider()
    {
        return [
            ['global/login',     Client::ENDPOINT . 'global/login'],
            ['/my/url',          Client::ENDPOINT . 'my/url'],
            ['my/url   ',        Client::ENDPOINT . 'my/url'],
            ['my/url/is/here//', Client::ENDPOINT . 'my/url/is/here'],
            ['   my/url   ',     Client::ENDPOINT . 'my/url'],
            ['   /my/url/   ',   Client::ENDPOINT . 'my/url'],
        ];
    }

    /**
     * @dataProvider urlProvider
     */
    public function testUrlGeneration($endpoint, $expected)
    {
        $this->assertEquals(
            $expected,
            Client::url($endpoint)
        );
    }
}
