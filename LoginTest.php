<?php

namespace Tests\Unit;

use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }


    public function test_user_exist_in_database()
    {
        $con = mysqli_connect("localhost", "root", "", "bookstore");
        $user1 = [
            'userID' => 'test1',
            'password' => 'testing1'
        ];

        $query = mysqli_query($con, "SELECT userID FROM users WHERE userID='test1' AND password='testing1' ");
        $ret = mysqli_fetch_array($query);

        if ($ret > 0) {
            $boolean = true;
        } else {
            $boolean = false;
        }

        $this->assertTrue($boolean);
    }
}
