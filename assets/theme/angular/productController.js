/* 
 Producrt list controllers
 */

App.controller('ProductController', function ($scope, $http, $timeout, $interval) {

    $scope.selectedProduct = {'product': {}};

    $scope.zoomProduct = function (product) {
        $scope.selectedProduct.product = product;
    }

    $scope.askPriceSelected = function () {
        var url = baseurl + "Api/priceAsk/" + custom_id;
        $http.get(url).then(function (rdata) {
            $scope.askpricedata = rdata.data;

        })
    }


    $scope.removePriceData = function (product_id) {
        var url = baseurl + "Api/priceAskDelete/" + custom_id + "/" + product_id;
        $http.get(url).then(function (rdata) {

            $scope.askPriceSelected();
        })
    }

    $scope.askPriceSelected();


    $scope.showPriceProducts = function () {
        $scope.askPriceSelected();
        $("#productprice").modal("show");
    }

    $scope.askPriceSelection = function (product_id) {
        var url = baseurl + "Api/priceAsk";
        var form = new FormData()
        form.append('product_id', product_id);
        form.append('item_id', custom_id);
        $http.post(url, form).then(function (rdata) {
            $scope.showPriceProducts();
        })
    }





    $scope.productResults = {};
    $scope.init = 0;
    $scope.checkproduct = 0;
    $scope.pricerange = {'min': 0, 'max': 0};
    $scope.productProcess = {'state': 1, 'pagination': {'paginate': [1, 12], 'perpage': 12}, 'products': []};

    $scope.getProducts = function (attrs) {
        $scope.productProcess.state = 1;
        var argsk = [];
        for (i in $scope.attribute_checked) {
            var at = $scope.attribute_checked[i];
            var argsv = [];
            for (t in at) {
                var tt = at[t];
                argsv.push(tt)
            }
            var ak = "a" + i + "=" + argsv.join("-");
            argsk.push(ak);
        }
        var pmm = $("#price-range-min").text().replace("$", "");
        var pmx = $("#price-range-max").text().replace("$", "");

        var elempm = "maxprice=" + pmx;
        var elempx = "minprice=" + pmm;

        if (searchdata) {
            var search = "search=" + searchdata;
            argsk.push(search);
        }

        if (pmm.trim()) {
            $scope.pricerange.max = pmx;
            $scope.pricerange.min = pmm;
            argsk.push(elempx);
            argsk.push(elempm);
        }


        var countdata = $(".info_text").text().split(" ")[1];
        if (Number(countdata[0])) {
            if (countdata) {
                countdata = countdata.split("-");
            }
        } else {
            countdata = [1, 12];
        }

        var paginationdata = "start=" + countdata[0] + "&end=" + countdata[1];

        argsk.push(paginationdata);

        var stargs = argsk.join("&");





        var url = baseurl + "Api/productListApi/" + category_id + "";

        if (stargs) {
            url = url + "?" + stargs;
        }

        $http.get(url).then(function (result) {
            if ($scope.productResults.products) {
                $scope.productResults.products = result.data.products;
            } else {
                $scope.productResults = result.data;
                if ($scope.productResults.products.length) {
                    $scope.checkproduct = 1;
                } else {
//                    $scope.productProcess.state = 2;
                }
            }

            var totalcountdata = result.data.product_count;
            var productscounter = [];
            for (i = 1; i <= totalcountdata; i++) {
                productscounter.push(i);
            }

            $scope.productResults['productscounter'] = productscounter;


            if ($scope.productResults.products.length) {
                $scope.productProcess.state = 2;
            } else {
                $scope.productProcess.state = 0;
            }


//            $timeout(function () {
//                $scope.productProcess.state = 2;
//            }, 2000)

            $timeout(function () {

                $('#paging_container1').pajinate({
                    items_per_page: 12,
                    num_page_links_to_display: 5,
                });

                $scope.checkProduct();

                $(".page_link").click(function () {
                    $("html, body").animate({scrollTop: 0}, "slow")
                })



                //  Price Filter ( noUiSlider Plugin)
                $("#price-range").noUiSlider({
                    range: {
                        'min': [Number($scope.productResults.price.minprice)],
                        'max': [Number($scope.productResults.price.maxprice)]
                    },
                    start: [Number($scope.productResults.price.minprice), Number($scope.productResults.price.maxprice)],
                    connect: true,
                    serialization: {
                        lower: [
                            $.Link({
                                target: $("#price-min")
                            })
                        ],
                        upper: [
                            $.Link({
                                target: $("#price-max")
                            })
                        ],
                        format: {
                            // Set formatting
                            decimals: 2,
                            prefix: '$'
                        }
                    }
                })


                $("#amount").val("$" + $("#price-range").slider("values", 0) + " - $" + $("#price-range").slider("values", 1));
            }, 1000)

            $scope.init = 1;
        }, function () {
            $scope.productProcess.state = 0;
        });
    }
    $scope.getProducts2 = function (attrs) {
        $scope.productProcess.state = 1;
        var argsk = [];
        for (i in $scope.attribute_checked) {
            var at = $scope.attribute_checked[i];
            var argsv = [];
            for (t in at) {
                var tt = at[t];
                argsv.push(tt)
            }
            var ak = "a" + i + "=" + argsv.join("-");
            argsk.push(ak);
        }
        var pmm = $("#price-range-min").text().replace("$", "");
        var pmx = $("#price-range-max").text().replace("$", "");

        var elempm = "maxprice=" + pmx;
        var elempx = "minprice=" + pmm;



        if (pmm.trim()) {
            $scope.pricerange.max = pmx;
            $scope.pricerange.min = pmm;
            argsk.push(elempx);
            argsk.push(elempm);
        }


        var countdata = $(".info_text").text().split(" ")[1];
        if (Number(countdata[0])) {
            if (countdata) {
                countdata = countdata.split("-");
            }
        } else {
            countdata = [1, 12];
        }

        var paginationdata = "start=" + countdata[0] + "&end=" + countdata[1];

        argsk.push(paginationdata);

        var stargs = argsk.join("&");





        var url = baseurl + "Api/productListApi/" + category_id + "";

        if (stargs) {
            url = url + "?" + stargs;
        }

        $http.get(url).then(function (result) {
            if ($scope.productResults.products) {
                $scope.productResults.products = result.data.products;
            } else {
                $scope.productResults = result.data;
                if ($scope.productResults.products.length) {
                    $scope.checkproduct = 1;
                } else {
//                    $scope.productProcess.state = 2;
                }
            }

            var totalcountdata = result.data.product_count;



            if ($scope.productResults.products.length) {
                $scope.productProcess.state = 2;
            } else {
                $scope.productProcess.state = 0;
            }






            $scope.init = 1;
        }, function () {
            $scope.productProcess.state = 0;
        });
    }

    $scope.attribute_checked = {};
    $scope.getProducts();

    $scope.attribute_checked_pre = {};

    $scope.attributeProductGet = function (atv) {

        //check attribute id
        if (atv.checked) {
            if ($scope.attribute_checked[atv.attribute_id]) {
                var attrlist = $scope.attribute_checked[atv.attribute_id];
                if (attrlist.indexOf(atv.id) > -1) {

                } else {
                    $scope.attribute_checked[atv.attribute_id].push(atv.id)
                }
            } else {
                $scope.attribute_checked[atv.attribute_id] = [atv.id];
            }
        } else {
            var attrlist = $scope.attribute_checked[atv.attribute_id];
            var ind = attrlist.indexOf(atv.id)
            $scope.attribute_checked[atv.attribute_id].splice(ind, 1);
            if ($scope.attribute_checked[atv.attribute_id].length == 0) {
                delete $scope.attribute_checked[atv.attribute_id];
            }
        }


        //check attribute lable
        if (atv.checked) {
            if ($scope.attribute_checked_pre[atv.attribute]) {
                var attrlist = $scope.attribute_checked_pre[atv.attribute];
                if (attrlist.indexOf(atv.id) > -1) {

                } else {
                    $scope.attribute_checked_pre[atv.attribute].push(atv)
                }
            } else {
                $scope.attribute_checked_pre[atv.attribute] = [atv];
            }
        } else {
            var attrlist = $scope.attribute_checked_pre[atv.attribute];
            var ind = attrlist.indexOf(atv.id)
            $scope.attribute_checked_pre[atv.attribute].splice(ind, 1);
            if ($scope.attribute_checked_pre[atv.attribute].length == 0) {
                delete $scope.attribute_checked_pre[atv.attribute];
            }
        }

        console.log($scope.attribute_checked_pre);


//        var stargs = encodeURIComponent(fargs);
        $scope.getProducts();




    }


    $scope.filterPrice = function () {
        $scope.getProducts();
    }

    $scope.checkProduct = function () {
        var countdata = $(".info_text").text().split(" ")[1];
        if (countdata) {
            var countdata1 = countdata.split("-");
            countdata = [Number(countdata1[0]), Number(countdata1[1])];
        } else {
            countdata = [1, 12];
        }
        console.log(countdata);



    }

    $(document).on("click", ".page_link", function () {
        $scope.productProcess.currentpage = $(this).attr("longdesc");
        $scope.getProducts2();
    });

    $(document).on("click", ".last_link", function () {
        $scope.productProcess.currentpage = "last";
        $scope.getProducts2();
    });
    $(document).on("click", ".first_link", function () {
        $scope.productProcess.currentpage = "last";
        $scope.getProducts2();
    });

    $(document).on("click", ".next_link", function () {
        $scope.productProcess.currentpage = Number($scope.productProcess.currentpage) + 1;
        $scope.getProducts2();
    });
    $(document).on("click", ".previous_link", function () {
        $scope.productProcess.currentpage = Number($scope.productProcess.currentpage) - 1;
        $scope.getProducts2();
    });





})


App.controller('ProductSearchController', function ($scope, $http, $timeout, $interval) {

    $scope.productResults = {};
    $scope.init = 0;
    $scope.checkproduct = 0;
    $scope.pricerange = {'min': 0, 'max': 0};



    $scope.getProducts = function (attrs) {


        var argsk = [];
        for (i in $scope.attribute_checked) {
            var at = $scope.attribute_checked[i];
            var argsv = [];
            for (t in at) {
                var tt = at[t];
                argsv.push(tt)
            }
            var ak = "a" + i + "=" + argsv.join("-");
            argsk.push(ak);
        }
        var pmm = $("#price-min").text().replace("$", "");
        var pmx = $("#price-max").text().replace("$", "");

        var elempm = "maxprice=" + pmx;
        var elempx = "minprice=" + pmm;



        if (pmm.trim()) {
            $scope.pricerange.max = pmx;
            $scope.pricerange.min = pmm;
            argsk.push(elempx);
            argsk.push(elempm);
        }
        var stargs = argsk.join("&");



        var url = baseurl + "Api/productListSearchApi/" + keywords + "";

        if (stargs) {
            url = url + "?" + stargs;
        }

        $http.get(url).then(function (result) {


            if ($scope.productResults.products) {
                $scope.productResults.products = result.data.products;
            } else {
                $scope.productResults = result.data;
                if ($scope.productResults.products.length) {
                    $scope.checkproduct = 1;
                }
            }
            if ($scope.init == 0) {


            }
            $scope.init = 1;
        }, function () {
        });
    }

    $scope.attribute_checked = {};
    $scope.getProducts();

    $scope.attribute_checked_pre = {};

    $scope.attributeProductGet = function (atv) {

        //check attribute id
        if (atv.checked) {
            if ($scope.attribute_checked[atv.attribute_id]) {
                var attrlist = $scope.attribute_checked[atv.attribute_id];
                if (attrlist.indexOf(atv.id) > -1) {

                } else {
                    $scope.attribute_checked[atv.attribute_id].push(atv.id)
                }
            } else {
                $scope.attribute_checked[atv.attribute_id] = [atv.id];
            }
        } else {
            var attrlist = $scope.attribute_checked[atv.attribute_id];
            var ind = attrlist.indexOf(atv.id)
            $scope.attribute_checked[atv.attribute_id].splice(ind, 1);
            if ($scope.attribute_checked[atv.attribute_id].length == 0) {
                delete $scope.attribute_checked[atv.attribute_id];
            }
        }


        //check attribute lable
        if (atv.checked) {
            if ($scope.attribute_checked_pre[atv.attribute]) {
                var attrlist = $scope.attribute_checked_pre[atv.attribute];
                if (attrlist.indexOf(atv.id) > -1) {

                } else {
                    $scope.attribute_checked_pre[atv.attribute].push(atv)
                }
            } else {
                $scope.attribute_checked_pre[atv.attribute] = [atv];
            }
        } else {
            var attrlist = $scope.attribute_checked_pre[atv.attribute];
            var ind = attrlist.indexOf(atv.id)
            $scope.attribute_checked_pre[atv.attribute].splice(ind, 1);
            if ($scope.attribute_checked_pre[atv.attribute].length == 0) {
                delete $scope.attribute_checked_pre[atv.attribute];
            }
        }

        console.log($scope.attribute_checked_pre);


//        var stargs = encodeURIComponent(fargs);
        $scope.getProducts();




    }


    $scope.filterPrice = function () {
        $scope.getProducts();

    }


})
