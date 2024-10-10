<?php

namespace App\Http\Controllers;
use App\Models\CustomerOrder;
use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function getNotifications()
    {
        $newOrders = CustomerOrder::where('created_at', '>=', now()->subDay())->get();
        $newRegistrations = User::where('created_at', '>=', now()->subDay())->get();

        $newOrdersCount = $newOrders->count();
        $newUsersCount = $newRegistrations->count();

        return [
            'newOrdersCount' => $newOrdersCount,
            'newUsersCount' => $newUsersCount,
            'totalNotifications' => $newOrdersCount + $newUsersCount,
            'newOrders' => $newOrders,
            'newRegistrations' => $newRegistrations,
        ];
    }
}
