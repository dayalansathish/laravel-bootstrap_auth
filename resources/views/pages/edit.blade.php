@extends('layouts.edit')

@section('title', 'Update Customer')

@section('content-page')
<div class="container" ng-app="customerApp" ng-controller="CustomerController">
    <h2 class="text-center w-100">Update Customer</h2>

    <div class="col-md-6">
    <form name="customerForm" ng-submit="updateCustomer(customerForm.$valid)" enctype="multipart/form-data">
            @csrf
            <input type="hidden" ng-model="customer.id" ng-init="customer.id='{{ $customer->id }}'" />
            <div class="row my-3">
                <div class="col-md-12">
                    <label for="name" class="form-label">Customer Name</label>
                    <input type="text" name="name" class="form-control"id="name" placeholder="Enter Customer Name" value="{{ $customer->name }}" required />
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control"  id="email" placeholder="Enter Email" value="{{ $customer->email }}" required />
                </div>
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" value="{{ $customer->password }}" id="password" placeholder="Enter Password" />
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-12">
                    <label for="description" class="form-label">Bio</label>
                    <textarea name="description" id="description" class="form-control"  placeholder="Enter Description" required>{{ $customer->description }}</textarea>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-12">
                    <label for="image" class="form-label">Customer Image</label>
                    <input type="file" name="image" id="image" file-model="customer.image" class="form-control">
                    <h6 class="m-2">{{$customer->image}}</h6>
                </div>
            </div>
            <div class="mb-5">
                <button type="submit" class="btn btn-sm btn-success">Update Customer</button>
                <button type="button" class="btn btn-sm btn-danger" ng-click="cancelForm()">Cancel</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('page-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
<script src="{{ asset('assets/js/controllers/customer.js') }}"></script>
@endsection
