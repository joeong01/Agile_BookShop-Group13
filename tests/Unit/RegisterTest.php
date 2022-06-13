<?php

namespace Tests\Unit;

use Tests\TestCase;

class RegisterTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */    
    public function test_register_form()
    {
        $response = $this->get('/register');

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

    public function test_add_user_to_database()
    {
        $con = mysqli_connect("localhost", "root", "", "bookstore");
        $user1 = [
            'userID' => 'test1',
            'userType' => 'customer',
            'password' => 'testing1'
        ];

        $query = mysqli_query($con, "INSERT INTO users(userID, userType, password) value('test2', 'customer', 'testing2')");

        if ($query) {
            $boolean = true;
            $delete = mysqli_query($con, "DELETE FROM users WHERE userID='test2'");
        } else {
            $boolean = false;
        }

        $this->assertTrue($boolean);
    }
}
