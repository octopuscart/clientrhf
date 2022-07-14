/* 
 Producrt list controllers
 */

App.controller('newsLetterController', function ($scope, $http, $timeout, $interval) {


    $scope.newsalertDict = {'listdata': {
            'Full Experience': {'title': 'Full Experience', 'description': 'I want the full Nita Fashions Experience.'},
            'Sales Or Promotion': {'title': 'Sales Or Promotion', 'description': 'I would like to only know about products that are on Sales/Promotion.'},
            'New Arrival': {'title': 'New Arrival', 'description': 'I would like to only know about products that are New/Trending.'},
            'Monthly Subscription': {'title': 'Monthly Subscription', 'description': 'I would like to receive monthly newsletters subscription from Nita Fashions.'},
            'Unsubscribe': {'title': 'Unsubscribe', 'description': 'I would like to unsubscribe newsletters from Nita Fashions.'},

        },
        'user_subscription': {"has_subscription": "no", "subscription_data": {}},
        'selected': "",
    };

    $scope.getUserSubscription = function () {
        var url = adminurl + "Api/getUserSubscription/" + user_id;
        $http.get(url).then(function (rdata) {
            $scope.newsalertDict.user_subscription.has_subscription = rdata.data.has_subscription;
            $scope.newsalertDict.user_subscription.subscription_data = rdata.data.subscription_data;
        });
    };
    $scope.getUserSubscription();

    $scope.openModal = function () {
        $scope.newsalertDict.selected = "";
        $("#changeSubcription").modal("show");

    }



    $scope.askForSubscription = function (object) {
        $("#changeSubcription").modal("hide");

        swal({
            title: object.title,
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#000',
            cancelButtonColor: 'red',
            confirmButtonText: 'Yes, Update',
            cancelButtonText: 'No, Cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
//            title: 'Adding to Cart',
            allowEscapeKey: false,
            allowOutsideClick: false,
            text: object.description,

            preConfirm: function (result) {

                swal({
                    title: 'Updating your settings.',
                    onOpen: function () {
                        swal.showLoading();
                    }
                });
                console.log($scope.newsalertDict.selected);

                $http.get(adminurl + "Api/setUserSubscription/" + user_id + "/"+$scope.newsalertDict.selected).then(function (rdata) {
                    swal.close();
                    swal({
                        title: 'Subscription Updated',
                        type: 'success',
                        text: 'Your newsletter subcription has updated to '+$scope.newsalertDict.selected,
                        imageWidth: 100,
                        timer: 1500,
                        imageAlt: 'Custom image',
                        showConfirmButton: false,
                        animation: true,
                        onClose: function () {
                           $scope.getUserSubscription();
                        }
                    })
                }, function () {
                    swal.close();
                    swal({
                        title: 'Something Wrong..',
                    })
                });
            },

        })
    }




})


