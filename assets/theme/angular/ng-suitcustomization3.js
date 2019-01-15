


App.controller('customizationShirt', function ($scope, $http, $location, $timeout, $filter) {
    $scope.fabricurl = "http://api.octopuscart.com/output/";
    var currencyfilter = $filter('currency');

    var globlecart = baseurl + "customApi/cartOperationSingle/" + product_id + "/" + gcustome_id;
    $scope.product_quantity = 1;


    $scope.cartFabrics1 = [
        {"sku": "AM697"},
        {"sku": "AM661"},
        {"sku": "AM64A"},
        {"sku": "WF81"},
        {"sku": "D1576"},
        {"sku": "L884"}
    ];


    $scope.cartFabrics = [];





    $scope.shirtimplement = function () {
        for (i in $scope.cartFabrics) {
            var fb = $scope.cartFabrics[i];
            $scope.selecteElements[fb.product_id] = {'sleeve': ["back_full_sleeve_cuff0001.png", "back_full_sleeve0001.png", ],
                'collar_buttons': 'buttonsh1.png',
                'show_buttons': 'true',
                "Monogram Initial": "ABC",
                "Collar Insert": "No",
                "Collar Insert Full": "No",
                "Cuff Insert": "No",
                "Cuff Insert Full": "No",
                "Monogram ColorBack": "White-Black",
                "Monogram Color": "white",
                "Monogram Background": "black",
                "Monogram Style": "Style 1",
                "summary": {},
            };
        }
        var viewtype = "front";
        switch (defaut_view) {
            case "Jacket":
                viewtype = "front";
                break;
            case "Pant":
                viewtype = "pant";
                break;
            default:
                viewtype = "front";
        }


        $scope.screencustom = {
            'view_type': viewtype,
            "fabric": $scope.cartFabrics[0].product_id,
            "productobj": $scope.cartFabrics[0],
            "sku": $scope.cartFabrics[0].sku,
        };
        var url = baseurl + "customApi/customeElements" + defaut_view;
        $http.get(url).then(function (rdata) {
            $scope.data_list = rdata.data.data;
            $scope.cuff_collar_insert = rdata.data.cuff_collar_insert;
            $scope.keys = rdata.data.keys;
            $scope.monogram_colors = rdata.data.monogram_colors;
            $scope.monogram_style = rdata.data.monogram_style;
            $scope.category_item($scope.data_list[$scope.keys[0]])
            $scope.parents = 'Body Fit';
            for (i in $scope.keys) {
                var temp = $scope.data_list[$scope.keys[i].title];
                console.log(temp);
                for (j in temp) {
                    if (temp[j]['status'] == 1) {
                        for (f in $scope.cartFabrics) {
                            var fb = $scope.cartFabrics[f];
                            console.log(fb.product_id, temp[j], $scope.keys[i].title);
                            $scope.selecteElements[fb.product_id][$scope.keys[i].title] = temp[j];
                            $scope.selecteElements[fb.product_id]['summary'][$scope.keys[i].title] = temp[j].title;
                        }
                    }
                }
            }


            setTimeout(function () {


                //zoom plugin

                $(document).on('mousemove', '.frame', function () {

                    var element = {
                        width: $(this).width(),
                        height: $(this).height()
                    };

                    var mouse = {
                        x: event.pageX,
                        y: event.pageY
                    };

                    var offset = $(this).offset();

                    var origin = {
                        x: (offset.left + (element.width / 2)),
                        y: (offset.top + (element.height / 2))
                    };

                    var trans = {
                        left: (origin.x - mouse.x) / 2,
                        down: (origin.y - mouse.y) / 2
                    };

                    var transform = ("scale(2,2) translateX(" + trans.left + "px) translateY(" + trans.down + "px)");

                    $(this).children(".zoom").css("transform", transform);

                });

                $(document).on('mouseleave', '.frame', function () {
                    $(this).children(".zoom").css("transform", "none");
                });

                //end of zoom

            }, 1500)


        });
    }


    $scope.show_shirt = function (shirtstyle) {
        $scope.screencustom.style_select = shirtstyle;
    }




    //canvas 
    $scope.canvasCustom = {'product': '',
        'loading': '', 'counter': 100,
        'fixed': document.getElementById("customCanvas1"),
        'jacketstyler': document.getElementById("jacketstyler"),
        'jacketstylel': document.getElementById("jacketstylel"),
        'jacketstyleoverlay': document.getElementById("jacketstyleoverlay"),
        'jacketlaple': document.getElementById("customCanvas5"),
    };



    $scope.setImages = function (imagename, canvas) {
        console.log(canvas);
        $scope.canvasCustom.loading = "Loading..."
        img = new Image();
        img.src = imagename;
        img.onload = function () {
            $scope.canvasCustom.loading = '';
            var ctx = $scope.canvasCustom[canvas].getContext("2d");
            console.log(ctx);
            ctx.drawImage(img, 0, 0, 600, 600);
        }
    }



    $scope.setImageElements = function (imagelist, canvas) {
        console.log(canvas);
        var ctx = $scope.canvasCustom[canvas].getContext("2d");
        ctx.clearRect(0, 0, 600, 600);
        
        for (imgi in imagelist) {
            var img = imagelist[imgi];
            $scope.images1 = customeimageserver + '/jacket/output/' + $scope.screencustom.productobj.folder + '/' + img;
            $scope.setImages($scope.images1, canvas);
        }
    }


    $scope.setImageElementsOverlayDirect = function (image, canvas) {
        var ctx = $scope.canvasCustom[canvas].getContext("2d");
        ctx.clearRect(0, 0, 600, 600);
        $scope.images1 = customeimageserver + '/jacket/overlay/' + image;
        $scope.setImages($scope.images1, canvas);
    }

    $scope.setImageElementsDirect = function (image, canvas) {
        var ctx = $scope.canvasCustom[canvas].getContext("2d");
        ctx.clearRect(0, 0, 600, 600);
        ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
        $scope.images1 = customeimageserver + '/jacket/output/' + $scope.screencustom.productobj.folder + '/' + image;

        $scope.setImages($scope.images1, canvas);
    }

    $scope.setImageElementsOverlay = function (imagelist, canvas) {
        var ctx = $scope.canvasCustom[canvas].getContext("2d");
        ctx.clearRect(0, 0, 600, 600);
        for (imgi in imagelist) {
            var img = imagelist[imgi];
            console.log(img);
            $scope.images1 = customeimageserver + '/jacket/overlay/' + img;
            $scope.setImages($scope.images1, canvas);
        }
    }

    $scope.setCanvasPant = function () {
        var pleat = $scope.selecteElements[$scope.canvasCustom.product]['Number of Pleat'].elements;
        $timeout(function () {
            $scope.setImageElements(pleat);
        }, 100)

        var waistband = $scope.selecteElements[$scope.canvasCustom.product]['Waistband'].elements;
        $timeout(function () {
            $scope.setImageElements(waistband);
        }, 200)

        var front_pocket = $scope.selecteElements[$scope.canvasCustom.product]['Front Pocket Style'].elements;
        $timeout(function () {
            $scope.setImageElementsOverlay(front_pocket);
        }, 300)

        var cuff = $scope.selecteElements[$scope.canvasCustom.product]['Cuff'].elements;
        $timeout(function () {
            $scope.setImageElementsOverlay(cuff);
        }, 400)

        var zipper = ['zipper.png'];
        $timeout(function () {
            $scope.setImageElementsOverlay(zipper);
        }, 600)

    }

    $scope.setCanvasJacket = function () {


        var shirt = 'shirtoverlay.png';
        $timeout(function () {
            $scope.setImageElementsDirect(shirt, 'fixed');
        }, 100)


        var sleeve = 'sleeve_20001.png'
        $timeout(function () {
            $scope.setImageElementsDirect(sleeve, 'fixed');
        }, 200)





        var laplejacket = $scope.selecteElements[$scope.canvasCustom.product]['Lapel Style'].laple_style[$scope.selecteElements[$scope.canvasCustom.product]['Jacket Style'].title].elements;
        $timeout(function () {
            $scope.setImageElements(laplejacket, 'jacketlaple');
        }, 500)

        var sleeve1 = 'sleeve_2_l0001.png'
        $timeout(function () {
            //     $scope.setImageElementsDirect(sleeve1);
        }, 700)



    }



    //end of canvas




    $scope.fabricCartData = {};//cart data

    $scope.getCartDataFabric = function () {
        $http.get(globlecart).then(function (rdata) {
            console.log(rdata.data)
            $scope.fabricCartData = [rdata.data];
            $scope.cartFabrics = [rdata.data];
            console.log($scope.fabricCartData)
            $scope.fabricCartData['grand_total'] = $scope.fabricCartData['total_price'];

            $scope.shirtimplement();
            $scope.canvasCustom.product = $scope.cartFabrics[0].product_id;



        }, function (r) {
        })
    }
    $scope.getCartDataFabric();






//shirt implementation

    $scope.parents = 'Body Fit';
    $scope.selecteElements = {};



    $scope.category_item = function (rdata, parents) {
        $scope.selectedProfile = "";
        $scope.parents = parents;
        $scope.category_data = rdata;
    }

//end of shirt implemantation

    setTimeout(function () {



        //zoom plugin

        $(document).on('mousemove', '.frame', function () {

            var element = {
                width: $(this).width(),
                height: $(this).height()
            };

            var mouse = {
                x: event.pageX,
                y: event.pageY
            };

            var offset = $(this).offset();

            var origin = {
                x: (offset.left + (element.width / 2)),
                y: (offset.top + (element.height / 2))
            };

            var trans = {
                left: (origin.x - mouse.x) / 2,
                down: (origin.y - mouse.y) / 2
            };

            var transform = ("scale(2,2) translateX(" + trans.left + "px) translateY(" + trans.down + "px)");

            $(this).children(".zoom").css("transform", transform);

        });

        $(document).on('mouseleave', '.frame', function () {
            $(this).children(".zoom").css("transform", "none");
        });

        //end of zoom

    }, 500)





    //select fabric
    $scope.selectFabric = function (fabric) {
        $scope.screencustom.fabric = fabric.folder;
        $scope.screencustom.productobj = fabric;
    }
    //

    function setJacketBody() {
        console.log("hello check1");
        var jacketleft = $scope.selecteElements[$scope.canvasCustom.product]['Jacket Style'].left;
        
        $timeout(function () {
            $scope.setImageElementsDirect(jacketleft, 'jacketstylel');
        }, 100) 

        var jacketstyleoverlay = $scope.selecteElements[$scope.canvasCustom.product]['Jacket Style'].overlay;
        $timeout(function () {
            $scope.setImageElementsOverlay(jacketstyleoverlay, 'jacketstyleoverlay');
        }, 1000)
        

        var jacketright = $scope.selecteElements[$scope.canvasCustom.product]['Jacket Style'].right;
        $timeout(function () {
            $scope.setImageElementsDirect(jacketright, 'jacketstyler');
        }, 300)
    }









    $scope.selectElement = function (obj, element) {

        $scope.screencustom.view_type = obj.viewtype;
        $scope.selecteElements[$scope.screencustom.fabric][obj.title] = element;
        $scope.selecteElements[$scope.screencustom.fabric]['summary'][obj.title] = element.title;
        if (element.function) {
            console.log(element);
            eval(element.function)();
        }
        $timeout(function () {
//            $scope.setImageElements(element.elements, element.canvas_m)
        }, 100);



//        $("html, body").animate({scrollTop: 0}, "slow")
    }

    $scope.pullUp = function () {
        $("html, body").animate({scrollTop: 0}, "slow")
    }


    $scope.laple_button_hole_contrast = function (insfab) {

        $scope.selecteElements[$scope.screencustom.fabric]['Contrast Lapel Button Hole'] = insfab;

    }

    $scope.sleeve_button_hole_contrast = function (insfab) {

        $scope.selecteElements[$scope.screencustom.fabric]['Button Thread'] = insfab;

    }



    $scope.rotateModel = function () {
        if ($scope.screencustom.view_type == "front") {
            $scope.screencustom.view_type = "back";
        }
        else {
            $scope.screencustom.view_type = "front";
        }
    }

    $scope.changeViews = function (viewtype) {

        $scope.screencustom.view_type = viewtype;

    }

    //add to cart
    $scope.addToCartCustome = function () {
        var summerydata = $scope.selecteElements[product_id].summary;
        var customhtmlarray = [];
        var form = new FormData()
        for (i in summerydata) {
            var ks = i;
            var kv = summerydata[i];
            form.append("customekey[]", ks);
            form.append("customevalue[]", kv);
            console.log(ks, kv);
            var summaryhtml = "<tr><th>" + ks + "</th><td>" + kv + "</td></tr>";
            customhtmlarray.push(summaryhtml);
        }
        ;
        customhtmlarray = customhtmlarray.join("");
        var customdiv = "<div class='custome_summary_popup'><table>" + customhtmlarray + "</table></div>"

        swal({
            title: 'Confirm Design',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#000',
            cancelButtonColor: 'red',
            confirmButtonText: 'Yes, Add To Cart',
            cancelButtonText: 'Cancel',
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
//            title: 'Adding to Cart',
            allowEscapeKey: false,
            allowOutsideClick: false,
            html: customdiv,
            preConfirm: function () {

                swal({
                    title: 'Adding to Cart',
                    onOpen: function () {
                        swal.showLoading()
                    }
                });
                var globlecart = baseurl + "Api/cartOperationCustom";

//                var form = new FormData()
                form.append('product_id', product_id);
                form.append('quantity', 1);
                form.append('custome_id', gcustome_id);
                $http.post(globlecart, form).then(function (rdata) {
                    swal.close();
                    $scope.getCartData();
                    swal({
                        title: 'Added To Cart',
                        type: 'success',
                        html: "<p class='swalproductdetail'><span>" + rdata.data.title + "</span><br>" + "Total Price: " + currencyfilter(rdata.data.total_price, globlecurrency) + ", Quantity: " + rdata.data.quantity + "</p>",
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



});

