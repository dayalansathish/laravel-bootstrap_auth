var app = angular.module("customerApp", []);

app.directive("fileModel", [
    "$parse",
    function ($parse) {
        return {
            restrict: "A",
            link: function (scope, element, attrs) {
                var model = $parse(attrs.fileModel);
                var modelSetter = model.assign;

                element.bind("change", function () {
                    scope.$apply(function () {
                        modelSetter(scope, element[0].files[0]);
                    });
                });
            },
        };
    },
]);

app.controller("CustomerController", [
    "$scope",
    "$http",
    "$window",
    function ($scope, $http, $window) {

        $scope.customers = [];
        $scope.customer = {};

        var token = $window.localStorage.getItem('token');
        // Fetch all customers
        $scope.fetchCustomers = function () {
            $http.get("/customers", {
                headers: {
                    'Authorization': 'Bearer ' + token
                }
            }).then(function(response) {
                $scope.customers = response.data;
                console.log(response.data);
            }).catch(function(error) {
                console.error("Error fetching customers:", error);
            });
        };

        // Initialize by fetching customers
        $scope.fetchCustomers();

        // Open Create Modal
        $scope.openCreateModal = function () {
            $scope.customer = {};
            $("#createModal").modal("show");
        };

        // Open Edit Modal
        $scope.openEditModal = function (customer) {
            $scope.customer = angular.copy(customer);
            $scope.customer.password = ""; // Ensure password field is empty
            $("#editModal").modal("show");
        };

        // Open Delete Modal
        $scope.openDeleteModal = function (customer, index) {
            $scope.customer = customer;
            $scope.customerIndex = index;
            $("#deleteModal").modal("show");
        };

        // Create customer
        $scope.createCustomer = function (isValid) {
            if (isValid) {
                if (
                    $scope.customer.password !== $scope.customer.confirmPassword
                ) {
                    // alert("Passwords do not match!");
                    toastr.error("Passwords do not match!");
                    return;
                }
                var formData = new FormData();
                formData.append("name", $scope.customer.name);
                formData.append("email", $scope.customer.email);
                formData.append("password", $scope.customer.password);
                formData.append(
                    "password_confirmation",
                    $scope.customer.confirmPassword
                );
                formData.append("description", $scope.customer.description);

                var imageFile =
                    document.getElementById("create-image").files[0];
                if (imageFile) {
                    formData.append("image", imageFile);
                }

                $http
                    .post("/store/customers", formData, {
                        transformRequest: angular.identity,
                        headers: { "Content-Type": undefined },
                    })
                    .then(
                        function (response) {
                            console.log(response);
                            toastr.success("Customer created successfully");
                            $scope.fetchCustomers();
                            $("#createModal").modal("hide");
                        },
                        function (error) {
                            console.error("Error creating customer:", error);
                        }
                    );
            }
        };

        // Update customer
        $scope.updateCustomer = function (isValid) {
            if (isValid) {
                var formData = new FormData();
                formData.append("name", $scope.customer.name);
                formData.append("email", $scope.customer.email);
                formData.append("description", $scope.customer.description);

                if ($scope.customer.password) {
                    formData.append("password", $scope.customer.password);
                }

                var imageFile = document.getElementById("edit-image").files[0];
                if (imageFile) {
                    formData.append("image", imageFile);
                }

                $http
                    .post(
                        "/customer/" + $scope.customer.id + "/update",
                        formData,
                        {
                            transformRequest: angular.identity,
                            headers: { "Content-Type": undefined },
                        }
                    )
                    .then(
                        function (response) {
                            toastr.success("Customer updated successfully");
                            $scope.fetchCustomers();
                            $("#editModal").modal("hide");
                        },
                        function (error) {
                            console.error("Error updating customer:", error);
                        }
                    );
            }
        };

        //Delete Customer
        $scope.confirmDelete = function () {
            var customerId = $scope.customer.id;
            $http.post("/customers/" + customerId).then(
                function (response) {
                    toastr.success("Customer deleted successfully");
                    $scope.customers.splice($scope.customerIndex, 1);
                    $("#deleteModal").modal("hide");
                },
                function (error) {
                    toastr.error("Error deleting customer: " + error.data.message);
                    console.error("Error deleting customer:", error);
                }
            );
        };

        // Cancel Edit
        $scope.cancelEdit = function () {
            $scope.customer = {};
            $("#editModal").modal("hide");
            $("#createModal").modal("hide");
            $("#deleteModal").modal("hide");
        };
    },
]);
