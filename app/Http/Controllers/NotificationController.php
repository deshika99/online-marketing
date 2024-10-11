<?php

namespace App\Http\Controllers;
use App\Models\CustomerOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class NotificationController extends Controller
{
  

    public function getNotifications()
    {
        $newOrders = CustomerOrder::where('created_at', '>=', now()->subDay())->get();
        $newRegistrations = User::where('created_at', '>=', now()->subDay())->get();
    
        // Merge orders and registrations into a single collection
        $allNotifications = $newOrders->merge($newRegistrations);
    
        // Sort by created_at in descending order
        $sortedNotifications = $allNotifications->sortByDesc('created_at');
    
        // Count the number of new orders and registrations
        $newOrdersCount = $newOrders->count();
        $newUsersCount = $newRegistrations->count();
    
        return [
            'newOrdersCount' => $newOrdersCount,
            'newUsersCount' => $newUsersCount,
            'totalNotifications' => $newOrdersCount + $newUsersCount,
            'sortedNotifications' => $sortedNotifications->values(), // Re-index the collection
        ];
    }
    


}
