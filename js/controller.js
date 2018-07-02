var myApp = angular.module("myApp", []);


myApp.controller("userController", function ($scope, $http) {
    $scope.bName = 'Add';

    $scope.insertData = function () {
        $http.post(
            "insert.php",
            {
                'name': $scope.name,
                'age': $scope.age,
                'email': $scope.email,
                'id': $scope.id,
                'bName': $scope.bName,
            })
            .then(function (response) {
                alert(response.data);
                $scope.name = null;
                $scope.age = null;
                $scope.email = null;
                $scope.bName = 'Add';
                $scope.displayData();
            });
    }

    $scope.displayData = function () {
        $http.get(
            "select.php"
        ).then(function (response) {
            $scope.users = response.data;

        });
    }

    $scope.updateData = function (id, name, age, email) {
        $scope.id = id;
        $scope.name = name;
        $scope.age = age;
        $scope.email = email;
        $scope.bName = 'Update';

    }

    $scope.delet = function (id) {

        if (confirm("Are You Sure !!")) {
            $http.post(
                "delet.php",
                {
                    'id': id,
                })
                .then(function (response) {
                    alert(response.data);
                    $scope.displayData();
                });
        }else{
            return false;
        }
    }

});