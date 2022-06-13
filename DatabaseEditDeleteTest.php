<?php

namespace Tests\Unit;

use Tests\TestCase;

class DatabaseEditDeleteTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_edit_book()
    {
        $response = $this->get('/edit_book');
        $response->assertStatus(500);
    }

    public function test_edit_change_in_database(){
        $con = mysqli_connect("localhost", "root", "", "bookstore");

        $query = mysqli_query($con, "UPDATE book SET bookName='test2.1', publicationDate='$2022-10-17', bookDescription='test2.3', retailPrice='test2.4', tradePrice='test2.5' WHERE ISBN_13='4598657482153'");

        $test = mysqli_query($con, "SELECT ISBN_13 FROM book WHERE ISBN_13='4598657482153' AND bookName='test2.1'");
        $ret = mysqli_fetch_array($test);

        if ($ret > 0) {
            $boolean = true;
        } else {
            $boolean = false;
        }

        $this->assertTrue($boolean);
    }

    public function test_delete_change_in_database(){
        $con = mysqli_connect("localhost", "root", "", "bookstore");

        $delete1 = mysqli_query($con,"DELETE FROM stock WHERE ISBN_13='4598657482153'");

        $query = mysqli_query($con, "DELETE FROM book WHERE ISBN_13='4598657482153'");

        $test = mysqli_query($con, "SELECT ISBN_13 FROM book WHERE ISBN_13='4598657482153'");
        $ret = mysqli_fetch_array($test);

        if ($ret == 0) {
            $boolean = true;
        } else {
            $boolean = false;
        }

        $this->assertTrue($boolean);
    }

}
