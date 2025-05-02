<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    // Display the product upload form
    public function product()
    {
        return view('admin.product');
    }
                
    

    // Handle product upload
    public function uploadproduct(Request $request)
    {
        $request->validate([
            'file' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
            'title' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'des' => 'nullable|string',
            'quantity' => 'required|integer|min:1',
        ]);

        // Handle image upload
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('productimage'), $imagename);

            // Save the product
            $data = new Product;
            $data->image = $imagename;
            $data->title = $request->title;
            $data->price = $request->price;
            $data->description = $request->des;
            $data->quantity = $request->quantity;
            $data->save();

            return redirect()->back()->with('message', 'Product uploaded successfully!');
        } else {
            return redirect()->back()->with('error', 'Image upload failed.');
        }
    }

    // Show all products
    public function showproduct()
    {
        $data = Product::all(); // Retrieve all products from the database
        return view('admin.showproduct', compact('data'));
    }

    // Delete a product
    public function deleteproduct($id)
    {
        $data = Product::find($id);
        if ($data) {
            $data->delete();
            return redirect()->back()->with('message', 'Product deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'Product not found.');
        }
    }

    // Display product update form
    public function updateview($id)
    {
        $data = Product::find($id);
        if ($data) {
            return view('admin.updateview', compact('data'));
        } else {
            return redirect()->back()->with('error', 'Product not found.');
        }
    }

    // Update product
    public function updateproduct(Request $request, $id)
    {
        $data = Product::find($id);
        if ($data) {
            // Handle image upload if a new image is provided
            if ($request->hasFile('file')) {
                $image = $request->file('file');
                $imagename = time() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('productimage'), $imagename);
                $data->image = $imagename;
            }

            // Update product details
            $data->title = $request->title;
            $data->price = $request->price;
            $data->description = $request->des;
            $data->quantity = $request->quantity;
            $data->save();

            return redirect()->back()->with('message', 'Product updated successfully!');
        } else {
            return redirect()->back()->with('error', 'Product not found.');
        }
    }

    public function showorder()
    {
        $order=order::all();
        return view('admin.showorder',compact('order'));
    }

    public function updatestatus($id){
        $order=order::find($id);
        $order->status="delivered";
        $order->save();
        return redirect()->back();
    }
}
