<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ReporitoryInterface;

class MenuController extends Controller
{
    protected $app;
    
    public function __construct(ReporitoryInterface $app)
    {
        $this->app = $app;
    }

    public function index()
    {
        return $this->app->all();
    }
}
