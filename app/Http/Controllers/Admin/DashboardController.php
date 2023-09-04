<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function user()
    {
        return view ('alluser',[
            'users'=>User::all(),
        ]);
    }

    public function product()
    {
        return view ('allproduct',[
            'products'=>Product::latest()->paginate(10),
        ]);
    }

    public function product_true()
    {
        return view ('approvedproduct',[
            'products'=>Product::where('approved', '=', true)->get(),
        ]);
    }

    public function product_false()
    {
        return view ('unapprovedproduct',[
            'products'=>Product::where('approved', '=', false)->get(),
        ]);
    }

    public function approve(Product $product)
    {
        Product::where('id', $product->id)
                    ->update(['approved'=>true]);

        return redirect('/admin/unapproved-products')->with('success', 'Data berhasil di approve !');
    }

    public function unapprove(Product $product)
    {
        Product::where('id', $product->id)
                ->update(['approved'=>false]);

        return redirect('/admin/unapproved-products')->with('success', 'Data berhasil di unapprove !');
    }
}
