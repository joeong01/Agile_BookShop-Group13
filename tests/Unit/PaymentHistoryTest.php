<?php

namespace Tests\Unit;

use Tests\TestCase;

class PaymentHistoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */    
    public function test_paymentHistory()
    {
        session(['id' => "123"]);
        $response = $this->get('/paymentHistory');

        $response->assertStatus(302);
    }
}