<?php
/**
 * Created by PhpStorm.
 * User: czaro_000
 * Date: 05/12/2016
 * Time: 22:50
 */

class TestLoginRedirect extends TestCase {

    public function test_displays_home_page_after_login(){
       $this->call('POST', '/login');
        $this->assertRedirectedTo('/');


    }

}