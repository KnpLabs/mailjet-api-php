<?php

namespace Mailjet\Tests\Api;

use Mailjet\Api\Client;

class ClientTest extends \PHPUnit_Framework_TestCase
{
    private $client;

    public function testGetOutputFormat()
    {
        $this->client->setOutputFormat(Client::FORMAT_CSV);
        $this->assertEquals(Client::FORMAT_CSV, $this->client->getOutputFormat());
        $this->assertEquals(Client::FORMAT_CSV, $this->client->getRealOutputFormat());

        $this->client->setOutputFormat(Client::FORMAT_ARRAY);
        $this->assertEquals(Client::FORMAT_ARRAY, $this->client->getOutputFormat());
        $this->assertEquals(Client::FORMAT_JSON,  $this->client->getRealOutputFormat());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetWrongOutputFormat()
    {
        $this->client->setOutputFormat('bogusformat');
    }

    public function testSetConnectionMode()
    {
        $this->client->setConnectionMode(Client::CONNECTION_NORMAL);
        $this->assertEquals(Client::CONNECTION_NORMAL, $this->client->getConnectionMode());

        $this->client->setConnectionMode(Client::CONNECTION_SECURE);
        $this->assertEquals(Client::CONNECTION_SECURE, $this->client->getConnectionMode());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testSetWrongConnectionMode()
    {
        $this->client->setConnectionMode('bogusmode');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWrongGetQuery()
    {
        $this->client->get('bogusquery');
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testWrongPostQuery()
    {
        $this->client->post('bogusquery');
    }

    public function setUp()
    {
        $this->client = new Client('root', 'password');
    }
}