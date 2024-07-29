@extends('layouts.userlist')

@section('title', 'Customer Details')

@section('page-styles')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
@endsection

@section('content-page')
<div class="container" ng-app="customerApp" ng-controller="CustomerController">
    <div class="d-flex justify-content-end my-3">
        <button class="btn btn-sm btn-primary" ng-click="openCreateModal()">Create Customer</button>

    </div>
    <hr>
    <div class="d-flex flex-column justify-content-center align-items-center mt-5">
        <div class="card mb-3" ng-repeat="customer in customers" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img ng-src="/images/@{{ customer.image }}" class="img-fluid rounded-end" alt="Customer Image">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">@{{ customer.name }}</h5>
                        <p class="card-text">@{{ customer.email }}</p>
                        <p class="card-text"><small class="text-muted">@{{ customer.description }}</small></p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-secondary btn-sm me-md-2" type="button"
                                ng-click="openEditModal(customer)">Edit</button>
                            <button class="btn btn-danger btn-sm" type="button"
                                ng-click="openDeleteModal(customer, $index)">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Modal -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">Create Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="cancelEdit()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="customerForm" ng-submit="createCustomer(customerForm.$valid)">
                        <div class="form-group">
                            <label for="create-name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="create-name" ng-model="customer.name" required>
                        </div>
                        <div class="form-group">
                            <label for="create-email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="create-email" ng-model="customer.email"
                                required>
                        </div>
                        <div class="form-group">
                            <label for="create-password">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="create-password"
                                ng-model="customer.password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirmPassword"> Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="confirmPassword"
                                ng-model="customer.confirmPassword" required>
                        </div>
                        <div class="form-group">
                            <label for="create-description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="create-description" ng-model="customer.description"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="create-image">Image</label>
                            <input type="file" class="form-control" id="create-image" file-model="customer.image">
                        </div>
                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="cancelEdit()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form name="customerForm" ng-submit="updateCustomer(customerForm.$valid)">
                        <div class="form-group">
                            <label for="edit-name">Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="edit-name" ng-model="customer.name" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-email">Email <span class="text-danger">*</span></label>
                            <input type="email" class="form-control" id="edit-email" ng-model="customer.email" required>
                        </div>
                        <div class="form-group">
                            <label for="edit-password">Password (leave blank to keep unchanged)</label>
                            <input type="password" class="form-control" id="edit-password" ng-model="customer.password">
                        </div>
                        <div class="form-group">
                            <label for="edit-description">Description <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="edit-description" ng-model="customer.description"
                                required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="edit-image">Image</label>
                            <input type="file" class="form-control" id="edit-image" file-model="customer.image">
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Delete Customer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" ng-click="cancelEdit()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete this customer?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        ng-click="cancelEdit()">Cancel</button>
                    <button type="button" class="btn btn-danger" ng-click="confirmDelete()">Delete</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.8.2/angular.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="assets/js/controllers/modal.js"></script>
@endsection