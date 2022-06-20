/* 
 Producrt list controllers
 */

App.controller('PreCustomCheck', function ($scope, $http, $timeout, $interval) {

    $scope.customizationDict = {'prestyle': {}, "has_pre_desing":false};



    $scope.askPriceSelected = function () {
        var url = baseurl + "Api/getUserPreDesingByItem/" + user_id + "/" + item_id;
        $http.get(url).then(function (rdata) {
            $scope.customizationDict.prestyle = rdata.data.designs;
            $scope.customizationDict.has_pre_desing = rdata.data.has_pre_design;
        });
    };
    $scope.askPriceSelected();
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
                    title: 'Appling desing',
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




})


