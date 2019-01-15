/* 
 Shop Cart product controllers
 */
App.controller('ShopController', function ($scope, $http, $timeout, $interval, $filter) {
    $scope.tonumber = function (numberx) {
        return Number(numberx);
    }


    var searchProducts = new Bloodhound({
        datumTokenizer: Bloodhound.tokenizers.obj.whitespace('title'),
        queryTokenizer: Bloodhound.tokenizers.whitespace,
        remote: {
            url: baseurl + "Api/SearchSuggestApi/" + '%QUERY',
            wildcard: '%QUERY'
        }
    });
    $('#remote .typeahead').typeahead(null, {
        name: 'search-products',
        display: 'title',
        source: searchProducts,
        templates: {
            empty: [
                '<div class="empty-message">',
                "Can't Find!, Try Something Else",
                '</div>'
            ].join('\n'),
            suggestion: Handlebars.compile('<div class="searchholder"><div class="product_image_back serachbox-image" style="background:url(' + imageurlg + '{{file_name}});"></div><strong>{{title}}</strong></div>')
        }
    });
    $('.typeahead').bind('typeahead:open', function () {
        $(".tt-menu").css({"left": $(".search-input").position().left + "px"})
    });
    $('.typeahead').bind('typeahead:select', function (ev, suggestion) {
        window.location = baseurl + "Product/ProductDetails/" + suggestion.id;
    });
    //search data
    $(function () {
//        function log(message) {
//            $("<div>").text(message).prependTo("#log");
//            $("#log").scrollTop(0);
//        }
//
//        $("#searchdata").autocomplete({
//            source: function (request, response) {
//                $.ajax({
//                    url: baseurl + "Api/SearchSuggestApi",
//                    dataType: "jsonp",
//                    data: {
//                        term: request.term
//                    },
//                    success: function (data) {
//                        response(data);
//                    }
//                });
//            },
//            minLength: 2,
//            select: function (event, ui) {
//                console.log(ui.item)
////                log("Selected: " + ui.item.value + " aka " + ui.item.id);
//            }
//        });
    });
    //searchdata 
    //cart general
    $scope.gcheckcart = {'status': 1};
    var globlecart = baseurl + "Api/cartOperation";
    $scope.product_quantity = 1;
    var currencyfilter = $filter('currency');
    $scope.globleCartData = {'total_quantity': 0}; //cart data
    //get cart data
    $scope.getCartData = function () {
        $scope.gcheckcart.status = 1;
        $http.get(globlecart).then(function (rdata) {
            $scope.gcheckcart.status = 2;
            $scope.globleCartData = rdata.data;
            $scope.globleCartData['grand_total'] = $scope.globleCartData['total_price'];

            if ($scope.globleCartData.total_quantity == 0) {
                $scope.gcheckcart.status = 0;
            }

            $(".cartquantity").text($scope.globleCartData.total_quantity);
        }, function (r) {
            $scope.gcheckcart.status = 0;
        })
    }
    $scope.getCartData();
    //general cart


    //cart non custome
    $scope.gcheckcartnc = {'status': 1};
    var globlecartnc = baseurl + "Api/cartOperationNoCustom";
    $scope.product_quantitync = 1;
    var currencyfilter = $filter('currency');
    $scope.globleCartDatanc = {'total_quantity': 0}; //cart data
    //get cart data
    $scope.getCartDatanc = function () {
        $scope.gcheckcartnc.status = 1;
        $http.get(globlecartnc).then(function (rdata) {
            $scope.gcheckcartnc.status = 2;
            $scope.globleCartDatanc = rdata.data;
            $scope.globleCartDatanc['grand_total'] = $scope.globleCartDatanc['total_price'];



            if ($scope.globleCartDatanc.total_quantity == 0) {
                $scope.gcheckcartnc.status = 0;
            }


        }, function (r) {
            $scope.gcheckcartnc.status = 0;
        })
    }
    $scope.getCartDatanc();
    //general non custome


    //cart  custome
    $scope.gcheckcartc = {'status': 1};
    var globlecartc = baseurl + "Api/cartOperationCustom";
    $scope.product_quantitync = 1;
    var currencyfilter = $filter('currency');
    $scope.globleCartDatac = {'total_quantity': 0}; //cart data
    //get cart data
    $scope.getCartDatac = function () {
        $scope.gcheckcartc.status = 1;
        $http.get(globlecartc).then(function (rdata) {
            $scope.gcheckcartc.status = 2;
            $scope.globleCartDatac = rdata.data;
            $scope.globleCartDatac['grand_total'] = $scope.globleCartDatac['total_price'];

            if ($scope.globleCartDatanc.total_quantity == 0) {
                $scope.gcheckcartc.status = 0;
            }


        }, function (r) {
            $scope.gcheckcartc.status = 0;
        })
    }
    $scope.getCartDatac();
    //general  custome







    //remove cart data
    $scope.removeCart = function (product_id) {
        $http.get(globlecart + "Delete" + "/" + product_id).then(function (rdata) {

            $scope.getCartData();
            $scope.getCartDatac();
            $scope.getCartDatanc();
        }, function (r) {
        })
    }

//update cart
    $scope.updateCart = function (productobj, oper) {
        if (oper == 'sub') {
            if (productobj.quantity == 1) {
            }
            else {
                productobj.quantity = Number(productobj.quantity) - 1;
            }
        }
        if (oper == 'add') {
            if (productobj.quantity > 5) {
            }
            else {
                productobj.quantity = Number(productobj.quantity) + 1;
            }
        }
        console.log(productobj.quantity)
        $http.get(globlecart + "Put" + "/" + productobj.product_id + "/" + productobj.quantity).then(function (rdata) {
            $scope.getCartData();
            $scope.getCartDatac();
            $scope.getCartDatanc();
        }, function (r) {
        })
    }

//add cart product
    $scope.addToCart = function (product_id, quantity, custome_id) {
        var productdict = {
            'product_id': product_id,
            'quantity': quantity,
            'custome_id': custome_id
        }
        var form = new FormData()
        form.append('product_id', product_id);
        form.append('quantity', quantity);
        form.append('custome_id', custome_id);
        swal({
            title: 'Adding to Cart',
            onOpen: function () {
                swal.showLoading()
            }
        });
        $http.post(globlecart, form).then(function (rdata) {
            swal.close();
            $scope.getCartData();
            $scope.getCartDatac();
            $scope.getCartDatanc();
            //custome model

            //

            swal({
                title: 'Added To Cart',
                type: 'success',
                html: "<p class='swalproductdetail'><span>" + rdata.data.title + "</span><br>" + "Total Price: " + currencyfilter(rdata.data.total_price, globlecurrency) + ", Quantity: " + rdata.data.quantity + "</p>",
                imageUrl: rdata.data.file_name,
                imageWidth: 100,
                timer: 1500,
//                 background: '#fff url(//bit.ly/1Nqn9HU)',
                imageAlt: 'Custom image',
                showConfirmButton: false,
                animation: true

            }).then(
                    function () {

                    },
                    function (dismiss) {
                        if (dismiss === 'timer') {
                            $("#productcustome").modal("show");
                        }
                    }
            )
        }, function () {
            swal.close();
            swal({
                title: 'Something Wrong..',
            })
        });
    }

    $scope.avaiblecredits = avaiblecredits;
    $scope.checkOrderTotal = function () {
        if ($scope.globleCartData.used_credit) {
            $scope.globleCartData.grand_total = $scope.globleCartData.total_price - $scope.globleCartData.used_credit;
        }
        else {
            $scope.globleCartData.used_credit = 0;
            $scope.globleCartData.grand_total = $scope.globleCartData.total_price;
            alert("Invalid Credit Entered.")
        }
    }

    function equalHeight() {
        $('.products-container').each(function () {
            var mHeight = 0;
            $(this).children('div').children('div').height('auto');
            $(this).children('div').each(function () {
                var itemHeight = $(this).height();
                if (itemHeight > mHeight) {
                    mHeight = itemHeight;
                }
                $(this).children('div').height(mHeight + 'px');
            });
        });
    }

//Get Menu data
    var globlemenu = baseurl + "Api/categoryMenu";
    $http.get(globlemenu).then(function (r) {
        $scope.categoriesMenu = r.data;
        //Define the maximum height for mobile menu
        $timeout(function () {
            equalHeight(); // Call Equal height function

//            $('nav#dropdown').meanmenu({siteLogo: "<a href='/' class='logo-mobile-menu'><img src='"+baseurl +"../assets/images/logo73.png' /></a>"});
            var wHeight = $(window).height();
            var mLogoH = $('a.logo-mobile-menu').outerHeight();
            wHeight = wHeight - 50;
            $('.mean-nav > ul').css('height', wHeight + 'px');
            $timeout(function () {
                var mhref = '<a href="#" class="meanmenu-reveal cartopen" style="right: 40px;left: auto;text-align: center;text-indent: 0px;font-size: 18px;"><i class="fa fa-shopping-cart"></i><b class="cartquantity">' + $scope.globleCartData.total_quantity + '</b></a>';
                $(".logo-mobile-menu").after(mhref);
                var mhref = '<a href="#" class="meanmenu-reveal search_open" style="right: 70px;left: auto;text-align: center;text-indent: 0px;font-size: 18px;"><i class="fa fa-search"></i></a>';
//                $(".logo-mobile-menu").after(mhref);
                $(".cartopen").click(function () {
                    $('#mobileModel').modal('show')
                })


                $(".search_open").click(function () {
                    $('#searchModel').modal('show');
                })


                $('.typeahead').typeahead(null, {
                    name: 'search-products',
                    display: 'title',
                    source: searchProducts,
                    templates: {
                        empty: [
                            '<div class="empty-message">',
                            "Can't Find!, Try Something Else",
                            '</div>'
                        ].join('\n'),
                        suggestion: Handlebars.compile('<div class="searchholder"><div class="product_image_back serachbox-image" style="background:url(' + imageurlg + '{{file_name}});"></div><strong>{{title}}</strong></div>')
                    }
                });
            }, 500);
        }, 500);
    }, function (e) {
    })

    $scope.projectDetailsModel = {'productobj': {}, 'quantity': 1, "link": ""};
    //get product detail model
    $scope.viewShortDetails = function (detailobj, link) {
        $scope.projectDetailsModel.productobj = detailobj;
        $scope.projectDetailsModel.link = link;
    }


    $scope.modelProductQuantity = function () {
        $timeout(function () {
            var quantity = $("#model_quantity").val();
            $scope.projectDetailsModel.quantity = quantity;
        })
    }

//style popup

    $scope.viewStyle = function (product) {
        var styleobj = product.custom_dict;
        var customhtmlarray = [];
        for (i in styleobj) {
            var ks = i;
            var kv = styleobj[i];
            console.log(kv);
            var checkdl = kv.indexOf("$");
            if(checkdl>-1){
                var brkstr = kv.split(" ");
                var brkstrl = brkstr.length;
                var prestr = brkstr.splice(0, brkstrl-1).join(" ");
                console.log(brkstr, brkstrl, prestr);
                var poststr = " <b class='extrapricesummry'>"+brkstr[0]+"</b>";
                console.log(poststr);
                var finalstr = prestr+poststr;
                 var summaryhtml = "<tr><th>" + ks + "</th><td>" + finalstr + "</td></tr>";
            }
            else{
            var summaryhtml = "<tr><th>" + ks + "</th><td>" + kv + "</td></tr>";
        }
            customhtmlarray.push(summaryhtml);
        }
        customhtmlarray = customhtmlarray.join("");
        var customdiv = "<div class='custome_summary_popup'><table>" + customhtmlarray + "</table></div>";
        swal({
            title: product.title + " - " + product.item_name,
            html: customdiv,
            imageUrl: product.file_name,
            imageWidth: 100,
            confirmButtonClass: 'btn btn-default',
        });
        
      
    }


})


App.controller('ProductDetails', function ($scope, $http, $timeout, $interval, $filter) {
    $scope.productver = {'quantity': 1};
    $scope.updateCartDetail = function (oper) {
        console.log(oper)
        if (oper == 'sub') {
            if ($scope.productver.quantity == 1) {
            }
            else {
                $scope.productver.quantity = Number($scope.productver.quantity) - 1;
            }
        }
        if (oper == 'add') {
            if ($scope.productver.quantity > 5) {
            }
            else {
                $scope.productver.quantity = Number($scope.productver.quantity) + 1;
            }
        }
    }

    $(function () {
        $(".select2").on('select2:select', function (e) {
            var data = e.params.data;
            var url = baseurl + "Product/ProductDetails/" + data.id + "";
            window.location = url;
        });
    })
})