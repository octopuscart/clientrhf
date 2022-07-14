/* 
 Producrt list controllers
 */

App.controller('PreMeasurementCheck', function ($scope, $http, $timeout, $interval) {

    $scope.customizationDict = {'premeasurements': {}, "has_pre_measurement": false};

    $scope.viewMeasurementOnly = function (style_name, custom_dict) {
        var styleobj = custom_dict;
        var customhtmlarray = [];
        for (i in styleobj) {
            var ks = styleobj[i].measurement_key;
            var kv = styleobj[i].measurement_value;
            var checkspace = kv.split(" ")[1];
            if (checkspace) {
                kv = " " + kv.replace(" ", "<span class='inchvaluemes'>") + "</span>";
            }

            var summaryhtml = "<tr><th>" + ks + "</th><td>" + kv + ' Inch</td></tr>';

            customhtmlarray.push(summaryhtml);
        }
        customhtmlarray = customhtmlarray.join("");
        var customdiv = "<div class='custome_summary_popup'><table>" + customhtmlarray + "</table></div>";
        swal({
            title: style_name,
            html: customdiv,

            confirmButtonClass: 'btn btn-default',
        });
    }

    $scope.getUserMeasurement = function () {
        var url = adminurl + "Api/getUserPreMeasurementByItem/" + user_id + "/" + itemarrays;
        console.log(url);
        $http.get(url).then(function (rdata) {
            $scope.customizationDict.premeasurements = rdata.data.measurement;
            console.log(rdata.data);
            $scope.customizationDict.has_pre_measurement = rdata.data.has_pre_measurement;
        });
    };
    $scope.getUserMeasurement();

    $scope.askForEmail = function (measurements_id) {
        swal({
            title: 'Please Confirm',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#000',
            cancelButtonColor: 'red',
            confirmButtonText: 'Yes, Send Mail',
            cancelButtonText: 'No, Cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
//            title: 'Adding to Cart',
            allowEscapeKey: false,
            allowOutsideClick: false,
            text: "Are you sure want to mail this measurements?",

            preConfirm: function () {

                swal({
                    title: 'Sending measurements on your email.',
                    onOpen: function () {
                        swal.showLoading()
                    }
                });

                $http.get(adminurl + "Order/selectPreviouseMeasurementProfilesReport/" + measurements_id + "/0").then(function (rdata) {
                    swal.close();
                    swal({
                        title: 'Email Sent',
                        type: 'success',
                        text: 'Measurements profile has been sent on your mail.',
                        imageWidth: 100,
                        timer: 1500,
                        imageAlt: 'Custom image',
                        showConfirmButton: false,
                        animation: true,
                        onClose: function () {
//                            window.location = baseurl + "Cart/details";
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

    $scope.setAsFavorite = function (measurements_id, status) {
        swal({
            title: 'Please Confirm',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#000',
            cancelButtonColor: 'red',
            confirmButtonText: 'Yes, Do It.',
            cancelButtonText: 'No, Cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
//            title: 'Adding to Cart',
            allowEscapeKey: false,
            allowOutsideClick: false,
            text: status === 'f' ? "Are you sure want to remove this measurements from  favorite?" : "Are you sure want to mark as favorite this measurements?",

            preConfirm: function () {

                swal({
                    title: status === 'f' ? "Removing from favorite" : 'Setting as your favorite measurements.',
                    onOpen: function () {
                        swal.showLoading()
                    }
                });
                var url = adminurl + "Api/favoriteUserPreMeasurement/" + measurements_id + "/" + status;

                $http.get(url).then(function (rdata) {
                    swal.close();
                    swal({
                        title: status === 'f' ? "Removed from favorite" : 'Marked as favorite',
                        type: 'success',
                        text: status === 'f' ? "Measurements profile has been removed from favorite." : 'Measurements profile has been marked as favorite.',
                        imageWidth: 100,
                        timer: 1500,
                        imageAlt: 'Custom image',
                        showConfirmButton: false,
                        animation: true,
                        onClose: function () {
                            $scope.getUserMeasurement();
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

    $scope.askForDelete = function (measurements_id) {
        swal({
            title: 'Please Confirm',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#000',
            cancelButtonColor: 'red',
            confirmButtonText: 'Yes, Delete',
            cancelButtonText: 'No, Cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
//            title: 'Adding to Cart',
            allowEscapeKey: false,
            allowOutsideClick: false,
            text: "Are you sure want to delete this measurements?",

            preConfirm: function () {

                swal({
                    title: 'Deleting your measurements.',
                    onOpen: function () {
                        swal.showLoading()
                    }
                });
                var url = adminurl + "Api/deleteUserPreMeasurement/" + measurements_id;

                $http.get(url).then(function (rdata) {
                    swal.close();
                    swal({
                        title: 'Measurements Deleted',
                        type: 'success',
                        text: 'Measurements profile has been deleted.',
                        imageWidth: 100,
                        timer: 1500,
                        imageAlt: 'Custom image',
                        showConfirmButton: false,
                        animation: true,
                        onClose: function () {
                            $scope.getUserMeasurement();
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


    $scope.applyMessurements = function (selected_id, style_name, custom_dict) {
        var styleobj = custom_dict;
        var customhtmlarray = [];
        for (i in styleobj) {
            var ks = styleobj[i].measurement_key;
            var kv = styleobj[i].measurement_value;
            var checkspace = kv.split(" ")[1];
            if (checkspace) {
                kv = " " + kv.replace(" ", "<span class='inchvaluemes'>") + "</span>";
            }

            var summaryhtml = "<tr><th>" + ks + "</th><td>" + kv + ' Inch</td></tr>';

            customhtmlarray.push(summaryhtml);
        }
        customhtmlarray = customhtmlarray.join("");
        var customdiv = "<div class='custome_summary_popup'><table>" + "<tr><th colspan=2 class='text-center'>Profile: " + style_name + "</th></tr>" + customhtmlarray + "</table></div>";

        swal({
            title: 'Confirm Measurements',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#000',
            cancelButtonColor: 'red',
            confirmButtonText: 'Yes, Apply',
            cancelButtonText: 'No, Cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
//            title: 'Adding to Cart',
            allowEscapeKey: false,
            allowOutsideClick: false,
            html: customdiv,
            preConfirm: function () {

                swal({
                    title: 'Appling Measurements',
                    onOpen: function () {
                        swal.showLoading();
                    }
                });

                $http.get(baseurl + "Cart/setPreviouseMeausrement/" + selected_id).then(function (rdata) {
                    swal.close();
                    swal({
                        title: 'Measurements Applied',
                        type: 'success',
                        text: "Your selected measurements applied for your order.",
                        showConfirmButton: true,
                        animation: true,
                        timer: 1500,
                        onClose: function () {
                            window.location = baseurl + "Cart/checkoutShipping";
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




App.controller('EditMeasurement', function ($scope, $http, $timeout, $interval) {

    $scope.customizationDict = {'prestyle': {}, "measurementData": {}, "designKeys": {}};

    $scope.getSingleDesing = function (measurement_id) {
        var url = adminurl + "Api/getSingleMeasurementById/" + measurement_id;
        $http.get(url).then(function (rdata) {
            console.log(rdata.data);
            $scope.customizationDict.prestyle = rdata.data;
        });
    }
    $scope.getSingleDesing(measurement_id);

    $scope.createDesingBlock = function (stindex, desingkey, desingvalue, elementlist) {
        var elementlistdata = {};

        console.log(desingvalue, desingkey, elementlist.min_value, elementlist.max_value);

        for (i = elementlist.min_value; i <= elementlist.max_value; i++) {
            elementlistdata[i+" "] = i+" ";
        }


        $('#styleelement' + stindex).editable();

    }

    $scope.getDesingElementByItem = function () {
        var url = adminurl + "Api/getMeausrementData";
        $http.get(url).then(function (rdata) {

            $scope.customizationDict.measurementData = rdata.data;

            for (stindex in $scope.customizationDict.prestyle.measurements) {
                var desingkeyobj = $scope.customizationDict.prestyle.measurements[stindex];
                var desingkey = desingkeyobj.measurement_key;
                var desingvalue = desingkeyobj.measurement_value;

                $scope.createDesingBlock(stindex, desingkey, desingvalue, $scope.customizationDict.measurementData[desingkey]);
            }
        });
    }
    $scope.getDesingElementByItem();


})



