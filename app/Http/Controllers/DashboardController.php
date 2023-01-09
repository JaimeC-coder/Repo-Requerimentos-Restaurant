<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return "admin";
    }
    public function receptionist()
    {
        return "receptionist";
    }
    public function warehouse_manager()
    {
        return "warehouse_manager";
    }
    public function waiter()
    {
        return "waiter";
    }
    public function cook()
    {
        return "cook";
    }
}
