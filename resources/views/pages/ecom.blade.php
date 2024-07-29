@extends('layouts.userlist')

@section('title', 'User List')

@section('page-styles')
@endsection

@section('content-page')
<div class="container" ng-app="customerApp" ng-controller="CustomerController">
    <div class="d-flex justify-content-end my-3">
        <a href="{{ route('create-customer') }}" class="btn btn-sm btn-primary">Create Customer</a>
    </div>
    <hr>
    <!-- <div class="row">
        <div class="col-6 my-5" ng-repeat="customer in customers">
            <div class="card">
                <div class="card-body d-flex">
                    <div>
                    <img ng-src="/images/@{{ customer.image }}" width="200px" height="200px" class="rounded" alt="Customer Image">

                    </div>
                    <div class="d-flex flex-column mx-5 p-5">
                        <h4 class="card-title fs-3 mb-5">@{{ customer.name }}</h4>
                        <h5 class="card-title">Email: <span class="text-muted">@{{ customer.email }}</span></h5>
                        <p class="text-muted">@{{ customer.description }}</p>
                        <div class="d-flex justify-content-end mt-5">
                            <button class="btn btn-sm btn-warning mx-1" ng-click="editCustomer(customer.id)">Edit</button>
                            <button class="btn btn-sm btn-danger mx-1" ng-click="deleteCustomer(customer.id)">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <div class="d-flex flex-column justify-content-center align-items-center mt-5">
        <div class="card mb-3" ng-repeat="customer in customers" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img ng-src="/images/@{{ customer.image }}" class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">@{{ customer.name }}</h5>
                        <p class="card-text">@{{ customer.email }}</p>
                        <p class="card-text"><small class="text-muted">@{{ customer.description }}</small></p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-secondary btn-sm me-md-2" type="button"
                                ng-click="editCustomer(customer.id)">Edit</button>
                            <button class="btn btn-danger btn-sm" type="button"
                                ng-click="deleteCustomer(customer.id)">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@section('page-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
<script src="assets/js/controllers/customer.js"></script>
@endsection