<?php

namespace Tests\Unit;

use Tests\TestCase;

class TransactionTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */    
    public function test_transaction()
    {
        $response = $this->get('/transaction');

        $response->assertStatus(200);
    }
}