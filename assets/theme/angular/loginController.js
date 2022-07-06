/* 
 Producrt list controllers
 */

App.controller('LoginController', function ($scope, $http, $timeout, $interval) {





    $scope.requestPasswordReset = function () {

        swal({
            title: "Forget Password",
            input: 'email',
            showCancelButton: true,
            confirmButtonColor: '#000',
            cancelButtonColor: 'red',
            confirmButtonText: 'Reset Now',
            cancelButtonText: 'No, Cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            allowEscapeKey: false,
            allowOutsideClick: false,
            text: "Please enter your email id.",

            preConfirm: function (result) {

                swal({
                    title: 'Checking your account',
                    onOpen: function () {
                        swal.showLoading();
                    }
                });
         
                var form = new FormData()
                form.append('email', result);
                $http.post(adminurl + "Api/resetPassword", form).then(function (rdata) {
                    var returndata = rdata.data;
                    swal.close();
                    if(returndata.status == "200"){
                        swal({
                            title: 'Link Sent',
                            type: 'success',
                            text: 'Password reset link has been sent on your email.',
                            imageWidth: 100,
                            timer: 1500,
                            showConfirmButton: false,
                            animation: true,
                            onClose: function () {
                               
                            }
                        });
                    }
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


