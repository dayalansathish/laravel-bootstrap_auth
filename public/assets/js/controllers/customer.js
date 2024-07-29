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
    "$location",
    function ($scope, $http, $window, $location) {
        $scope.customers = [];
        $scope.customer = {};
        $scope.editMode = false;
        // $scope.isEditing = false;

        // Fetch all customers
        // $scope.fetchCustomers = function () {
        //     $http.get("/api/customers").then(
        //         function (response) {
        //             $scope.customers = response.data;
        //         },
        //         function (error) {
        //             console.error("Error fetching customers:", error);
        //         }
        //     );
        // };

        $scope.fetchCustomers = () => {
            $http
              .get("/customers")
              .then((res) => {
                $scope.customers = res.data;
                console.log(res.data);
              })
              .catch((err) => {
                console.log(err);
              });
          };

        // Initialize by fetching customers
        $scope.fetchCustomers();

        //create customer
        $scope.createCustomer = function (isValid) {
            if (isValid) {
                var formData = new FormData();
                formData.append("name", document.getElementById("name").value);
                formData.append(
                    "email",
                    document.getElementById("email").value
                );
                formData.append(
                    "password",
                    document.getElementById("password").value
                );
                formData.append(
                    "description",
                    document.getElementById("description").value
                );
                var imageFile = document.getElementById("image").files[0];

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
                            alert("Customer created successfully");
                            $scope.fetchCustomers();
                            $scope.resetForm();
                            $window.location.href = "/user-list";
                        },
                        function (error) {
                            console.error("Error creating customer:", error);
                        }
                    );
            }
        };

        //update customer
        $scope.updateCustomer = function (isValid) {
            if (isValid) {
                var formData = new FormData();
                formData.append("name", document.getElementById("name").value);
                formData.append(
                    "email",
                    document.getElementById("email").value
                );
                formData.append(
                    "description",
                    document.getElementById("description").value
                );
                formData.append(
                    "password",
                    document.getElementById("password").value
                );

                var imageFile = document.getElementById("image").files[0];
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
                            alert("Customer updated successfully");
                            $scope.fetchCustomers();
                            $scope.resetForm();
                            $window.location.href = "/user-list";
                        },
                        function (error) {
                            console.error("Error updating customer:", error);
                        }
                    );
            }
        };

        //edit customer
        $scope.editCustomer = function (id) {
            $http.get("/customers/" + id).then(
                function (response) {
                    $scope.customer = response.data;
                    // $scope.isEditing = true;
                    $window.location.href = "/customers/" + id + "/edit";
                },
                function (error) {
                    console.error(
                        "Error fetching customer for editing:",
                        error
                    );
                }
            );
        };

        //delete customer
        $scope.deleteCustomer = function (id) {
            if (confirm("Are you sure you want to delete this customer?")) {
                $http.post("/customers/" + id).then(
                    function (response) {
                        alert("Customer deleted successfully");
                        $scope.fetchCustomers();
                    },
                    function (error) {
                        console.error("Error deleting customer:", error);
                    }
                );
            }
        };

        //reset form
        $scope.resetForm = function () {
            $scope.customer = {};
            // $scope.isEditing = false;
        };

        //cancel form
        $scope.cancelForm = function () {
            // $scope.isEditing = false;
            $window.location.href = "/user-list";
        };

        // Check if editing and load the customer data
        var customerId = $location.absUrl().split("/").pop();
        if (customerId && !isNaN(customerId)) {
            $scope.editCustomer(customerId);
        }
    },
]);
