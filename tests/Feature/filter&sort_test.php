<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DatabaseTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_filter_sort()
    {
        $response = $this->get('/stocklevel');
        $response->assertStatus(200);

    }

}
