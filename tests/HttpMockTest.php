<?php

namespace EasyHttp\MockBuilder\Tests;

use EasyHttp\MockBuilder\HttpMock;
use EasyHttp\MockBuilder\MockBuilder;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use PHPUnit\Framework\TestCase;

class HttpMockTest extends TestCase
{
    /**
     * @test
     */
    public function itMatchesSameMethod()
    {
        $builder = new MockBuilder();
        $builder
            ->when()
                ->methodIs('foo')
            ->then()
                ->body('bar');

        $mock = new HttpMock($builder);

        $client = new Client(['handler' => HandlerStack::create($mock)]);
        $response = $client->post('foo')->getBody()->getContents();

        $this->assertSame('bar', $response);
    }
}
