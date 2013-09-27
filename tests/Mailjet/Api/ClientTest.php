<?php

namespace Mailjet\Tests\Api;

use Mailjet\Api\Client;
use Mailjet\Api\RequestApi;

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

    public function testGetQuery()
    {
        $data = array('status' => 200, 'added'  => 0);
        $responseMock = $this->getResponseMock(true, $data, 'json');
        $requestMock = $this->getRequestMock($responseMock);
        $apiMock = $this->getApiMock($requestMock, 'get');
        $this->client->setApi($apiMock);

        $response = $this->client->get(RequestApi::USER_DOMAIN_LIST, array(
            'domain' => 'http://example.com'
        ));

        $this->assertEquals($response, $data);
    }

    public function testGetQueryAnotherFormat()
    {
        $data = '<h1>Response body</h1>';
        $responseMock = $this->getResponseMock(true, $data, 'getBody');
        $requestMock = $this->getRequestMock($responseMock);
        $apiMock = $this->getApiMock($requestMock, 'get');
        $this->client->setApi($apiMock);
        $this->client->setOutputFormat(Client::FORMAT_HTML);

        $response = $this->client->get(RequestApi::USER_DOMAIN_LIST, array(
            'domain' => 'http://example.com'
        ));

        $this->assertEquals($response, $data);
    }

    /**
     * @expectedException \Mailjet\Exception\ApiServerException
     */
    public function testGetQueryNotSuccesful()
    {
        $responseMock = $this->getResponseMock(false, array(), 'json');
        $requestMock = $this->getRequestMock($responseMock);
        $apiMock = $this->getApiMock($requestMock, 'get');
        $this->client->setApi($apiMock);

        $this->client->get(RequestApi::USER_INFOS);
    }

    public function testPostQuery()
    {
        $data = array('status' => 200, 'apiKey'  => 123456, 'secretKey' => 654321);
        $responseMock = $this->getResponseMock(true, $data, 'json');
        $requestMock = $this->getRequestMock($responseMock);
        $apiMock = $this->getApiMock($requestMock, 'post');
        $this->client->setApi($apiMock);

        $response = $this->client->post(RequestApi::API_KEY_ADD, array(
            'name' => 'Secret Key'
        ));

        $this->assertEquals($response, $data);
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

    protected function getResponseMock($isSuccess, $data, $dataFetchMethod)
    {
        $responseMock = $this->getMockBuilder('Guzzle\Http\Message\Response')
            ->disableOriginalConstructor()
            ->getMock()
        ;
        $responseMock->expects($this->any())
            ->method('isSuccessful')
            ->will($this->returnValue($isSuccess))
        ;
        $responseMock->expects($this->any())
            ->method($dataFetchMethod)
            ->will($this->returnValue($data));
        ;

        return $responseMock;
    }

    protected function getRequestMock($response)
    {
        $query = new \Guzzle\Http\QueryString();
        $requestMock = $this->getMock('Guzzle\Http\Message\RequestInterface');
        $requestMock->expects($this->any())
            ->method('getQuery')
            ->will($this->returnValue($query))
        ;
        $requestMock->expects($this->any())
            ->method('send')
            ->will($this->returnValue($response))
        ;

        return $requestMock;
    }

    protected function getApiMock($request, $method)
    {
        $apiMock = $this->getMock('Guzzle\Http\ClientInterface');
        $apiMock->expects($this->any())
            ->method($method)
            ->will($this->returnValue($request))
        ;

        return $apiMock;
    }
}