<?php
/**
 * Created by PhpStorm.
 * User: czaro_000
 * Date: 30/11/2016
 * Time: 14:50
 */

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
}