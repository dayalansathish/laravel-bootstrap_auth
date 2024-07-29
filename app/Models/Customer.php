<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'email', 'password', 'description', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function user(){
    //     return $this->belongsTo(User::class);
    // }

    // public static function createCustomer(array $data)
    // {
    //     $customer = self::create($data);
    //     return $customer;

    // }

    // public static function updateCustomer(array $data, $id)
    // {
    //     $customer = self::findOrFail($id);
    //     $customer->update($data);
    //     return $customer;
    // }

    // public static function saveCustomer(array $data, $id = null)
    // {
    //     // If an ID is provided, find the customer by ID, else use the email to update or create
    //     $attributes = $id ? ['id' => $id] : ['email' => $data['email']];
    //     // dd($attributes);
        
    //     // Using updateOrCreate to either update the existing customer or create a new one
    //     $customer = self::updateOrCreate($attributes, $data);

    //     return $customer;
    // }


    // public static function saveCustomer(array $data, $id = null)
    // {
    //     if ($id) {
    //         // Find the customer by ID and update it
    //         $customer = self::findOrFail($id);
            
    //         $customer->update($data);
    //     } else {
    //         // Create a new customer
    //         $customer = self::create($data);
    //         // dd($customer,$id);

    //     }

    //     return $customer;
    // }

    public static function saveCustomer(array $data, $id = null)
{
    // Using updateOrCreate to either update the existing customer by ID or create a new one
    $attributes =  ['id' => $id];
    // dd($attributes);
    $customer = self::updateOrCreate($attributes, $data);
    return $customer;
}


    public static function deleteCustomer($id)
    {
        $customer = self::findOrFail($id);
        $customer->delete();
        return $customer;
    }


    // Accessor for image URL
    // public function getImageUrlAttribute()
    // {
    //     $image = asset('images/' . $this->image);
    //     return $image;
    // }
  
}
