<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (!Auth::check()){
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        $userId = Auth::id();
        $customers = Customer::where('user_id', $userId)->get();
        // dd($customers);

        return response()->json($customers,200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8|confirmed',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'password', 'description']);
        $data['password'] = Hash::make($request->password);
        $data['user_id'] = auth()->id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $customer = Customer::create($data);
        // dd($customer);
        return response()->json(['message' => 'Customer created successfully', 'customer' => $customer], 201);
    }

    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return response()->json($customer);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers,email,' . $id,
            'password' => 'nullable|string|min:8',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'email', 'password', 'description']);

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        $customer = Customer::saveCustomer($data, $id);

        return response()->json(['message' => 'Customer updated successfully', 'customer' => $customer], 200);
    }

    public function destroy($id)
    {
        $customer = Customer::deleteCustomer($id);
        return response()->json(['message' => 'Customer deleted successfully', 'customer' => $customer], 200);
    }

    // public function edit($id)
    // {
    //     $customer = Customer::findOrFail($id);
    //     return view('pages.edit')->with('customer', $customer);
    // }

    public function edit($id)
    {
        $customer = Customer::findOrFail($id);

        // Check if the customer belongs to the currently authenticated user
        if ($customer->user_id !== Auth::id()) {
            // If not, return a 403 forbidden response
            abort(403, 'Unauthorized access.');
        }

        // Return the view with customer details
        return view('pages.edit')->with('customer', $customer);
    }

}
