<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        // Nombre total d'albums
        $totalAlbums = Album::count();
        // Nombre total de commades
        $totalOrders = Order::count();
        // les 5 dernieres commandes
        $latestOrders = Order::latest()->take(5)->get();
        return view('admin.dashboard', compact('totalAlbums', 'totalOrders', 'latestOrders'));
    }
    // Affiche la liste complète des albums(admin)
    public function manageAlbums(){
        $albums = Album::latest()->get();
        return view('admin.albums.index', compact('albums'));
    }
    // Affiche la liste complète des commandes(admin)
    public function manageOrders(){
        $orders = Order::with('album')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }


}
