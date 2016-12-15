<?php
/**
 * Created by PhpStorm.
 * User: czaro_000
 * Date: 05/12/2016
 * Time: 22:50
 */

class ExTest extends TestCase {

    public function test_displays_home_page(){
        $response =$this->call('GET', '/');
       $this->assertEquals('Hello there', $response->getContent());

    }

}