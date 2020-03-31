<?php

namespace Kan\Hive\Tests\Service;

use Kan\Hive\Service\Credentials;
use Kan\Hive\Tests\AbstractTestCase;

class CredentialsTest extends AbstractTestCase
{
    public function testDefaultsProvided()
    {
        $credentials = new Credentials(
            'name@email.com',
            'password'
        );

        $this->assertEquals(
            [
                'username' => 'name@email.com',
                'password' => 'password',
                'devices' => true,
                'products' => true,
                'actions' => true,
                'homes' => true,
            ],
            $credentials->toArray()
        );
    }

    public function testUnique()
    {
        $credentials = new Credentials(
            'name@email.com',
            'password',
            false,
            false,
            false,
            false
        );

        $this->assertEquals(
            [
                'username' => 'name@email.com',
                'password' => 'password',
                'devices' => false,
                'products' => false,
                'actions' => false,
                'homes' => false,
            ],
            $credentials->toArray()
        );
    }
}
