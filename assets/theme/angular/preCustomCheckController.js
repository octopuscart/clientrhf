/* 
 Producrt list controllers
 */

App.controller('PreCustomCheck', function ($scope, $http, $timeout, $interval) {

    $scope.customizationDict = {'prestyle': {}, "has_pre_design": false};



    $scope.getUserDesings = function () {
        var url = adminurl + "Api/getUserPreDesingByItem/" + user_id + "/" + item_id;
        $http.get(url).then(function (rdata) {
            $scope.customizationDict.prestyle = rdata.data.designs;
            console.log(rdata.data);
            $scope.customizationDict.has_pre_design = rdata.data.has_pre_design;
        });
    };
    $scope.getUserDesings();

    $scope.askForEmail = function (design_id) {
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
            text: "Are you sure want to mail this design?",

            preConfirm: function () {

                swal({
                    title: 'Sending design on your email.',
                    onOpen: function () {
                        swal.showLoading()
                    }
                });

                $http.get(adminurl + "Order/selectPreviouseProfilesReport/" + design_id + "/0").then(function (rdata) {
                    swal.close();
                    swal({
                        title: 'Email Sent',
                        type: 'success',
                        text: 'Desing profile has been sent on your mail.',
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

    $scope.setAsFavorite = function (design_id, status) {
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
            text: status === 'f' ? "Are you sure want to remove this design from  favorite?" : "Are you sure want to mark as favorite this design?",

            preConfirm: function () {

                swal({
                    title: status === 'f' ? "Removing from favorite" : 'Setting as your favorite design.',
                    onOpen: function () {
                        swal.showLoading()
                    }
                });
                var url = adminurl + "Api/favoriteUserPreDesing/" + design_id + "/" + status;

                $http.get(url).then(function (rdata) {
                    swal.close();
                    swal({
                        title: status === 'f' ? "Removed from favorite" : 'Marked as favorite',
                        type: 'success',
                        text: status === 'f' ? "Desing profile has been removed from favorite." : 'Desing profile has been marked as favorite.',
                        imageWidth: 100,
                        timer: 1500,
                        imageAlt: 'Custom image',
                        showConfirmButton: false,
                        animation: true,
                        onClose: function () {
                            $scope.getUserDesings();
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

    $scope.askForDelete = function (design_id) {
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
            text: "Are you sure want to delete this design?",

            preConfirm: function () {

                swal({
                    title: 'Deleting your design.',
                    onOpen: function () {
                        swal.showLoading()
                    }
                });
                var url = adminurl + "Api/deleteUserPreDesing/" + design_id;

                $http.get(url).then(function (rdata) {
                    swal.close();
                    swal({
                        title: 'Desing Deleted',
                        type: 'success',
                        text: 'Desing profile has been deleted.',
                        imageWidth: 100,
                        timer: 1500,
                        imageAlt: 'Custom image',
                        showConfirmButton: false,
                        animation: true,
                        onClose: function () {
                            $scope.getUserDesings();
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


    $scope.addToCartCustomeFromPre = function (selected_id, is_shop_stored = false, is_previouse = true) {
        var customhtmlarray = [];
        var form = new FormData()
        if (is_shop_stored) {
            var ks = "Design Type";
            var kv = "Shop Stored";
            form.append("customekey[]", ks);
            form.append("customevalue[]", kv);
            console.log(ks, kv);
            var summaryhtml = "<tr><th>" + ks + "</th><td>" + kv + "</td></tr>";
            customhtmlarray.push(summaryhtml);
        } else {
            var summerydata = $scope.customizationDict.prestyle[selected_id].style;

            for (i in summerydata) {
                var ks = summerydata[i].style_key;
                var kv = summerydata[i].style_value;
                form.append("customekey[]", ks);
                form.append("customevalue[]", kv);
                console.log(ks, kv);
                var summaryhtml = "<tr><th>" + ks + "</th><td>" + kv + "</td></tr>";
                customhtmlarray.push(summaryhtml);
            }
        }

        customhtmlarray = customhtmlarray.join("");
        var customdiv = "<div class='custome_summary_popup'><table class='table'>" + customhtmlarray + "</table></div>"

        swal({
            title: 'Confirm Design',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#000',
            cancelButtonColor: 'red',
            confirmButtonText: 'Yes, Add To Cart',
            cancelButtonText: 'No, Cancel!',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
//            title: 'Adding to Cart',
            allowEscapeKey: false,
            allowOutsideClick: false,
            html: customdiv,
            preConfirm: function () {

                swal({
                    title: 'Appling design',
                    onOpen: function () {
                        swal.showLoading()
                    }
                });
                var globlecart = baseurl + "Api/cartOperationCustom";

//                var form = new FormData()
                form.append('product_id', product_id);
                form.append('quantity', 1);
                form.append('custome_id', item_id);
                form.append('extra_price', 0);
                form.append("is_shop_stored", is_shop_stored ? 1 : 0);
                form.append("is_previous", is_previouse ? 1 : 0);
                form.append("profile_name", is_previouse ? 1 : 0);
                form.append("desing_profile_id", is_previouse ? 1 : 0);
                form.append("desing_profile", is_previouse ? 1 : 0);
                $http.post(globlecart, form).then(function (rdata) {
                    swal.close();
                    $scope.getCartData();
                    swal({
                        title: 'Added To Cart',
                        type: 'success',
                        html: "<p class='swalproductdetail'><span>" + rdata.data.title + "</span><br>" + "Quantity: " + rdata.data.quantity + "</p>",
                        imageUrl: rdata.data.file_name,
                        imageWidth: 100,
                        timer: 1500,
                        imageAlt: 'Custom image',
                        showConfirmButton: false,
                        animation: true,
                        onClose: function () {
                            window.location = baseurl + "Cart/details";
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


    $scope.getSingleDesing = function (design_id) {
        var url = adminurl + "Api/getUserPreDesingByItem/" + design_id;
        $http.get(url).then(function (rdata) {
            $scope.customizationDict.prestyle = rdata.data.designs;
            console.log(rdata.data);
            $scope.customizationDict.has_pre_design = rdata.data.has_pre_design;
        });
    }


})


App.controller('EditDesing', function ($scope, $http, $timeout, $interval) {

    $scope.customizationDict = {'prestyle': {}, "desingElements": {}, "designKeys": {}};

    $scope.getSingleDesing = function (design_id) {
        var url = adminurl + "Api/getSingleDesing/" + design_id;
        $http.get(url).then(function (rdata) {
            $scope.customizationDict.prestyle = rdata.data;
        });
    }
    $scope.getSingleDesing(design_id);

    $scope.createDesingBlock = function (stindex, desingkey, desingvalue, elementlist) {
        var elementlistdata = {};
        for (ele in elementlist) {
            var eleobj = elementlist[ele];
            elementlistdata[eleobj.title] = eleobj.title;
        }
        console.log('#styleelement' + stindex);
        if ($scope.customizationDict.designKeys[desingkey] == 'yes') {
            $('#styleelement' + stindex).editable({
                source: elementlistdata
            });
        } else {
            $('#styleelement' + stindex).parents("tr").hide();
        }
    }

    $scope.getDesingElementByItem = function (item_id) {
        var url = customurl;
        $http.get(url).then(function (rdata) {
            $scope.customizationDict.desingElements = rdata.data.data;
            var customdictkey = rdata.data.keys;
            for (kind in customdictkey) {
                var tempkey = customdictkey[kind];
                $scope.customizationDict.designKeys[tempkey.title] = tempkey.editable;
            }

            for (stindex in $scope.customizationDict.prestyle.style) {
                var desingkeyobj = $scope.customizationDict.prestyle.style[stindex];
                var desingkey = desingkeyobj.style_key;
                var desingvalue = desingkeyobj.style_value;
                console.log(desingkey, desingvalue);
                $scope.createDesingBlock(stindex, desingkey, desingvalue, $scope.customizationDict.desingElements[desingkey]);
            }
        });
    }
    $scope.getDesingElementByItem(item_id);


})

