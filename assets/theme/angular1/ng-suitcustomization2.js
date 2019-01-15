


App.controller('customizationShirt', function ($scope, $http, $location, $filter) {
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
                "extraprice": {},
                "totalextracost": 0,
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
            case "TuxedoPant":
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


    $scope.fabricCartData = {};//cart data

    $scope.getCartDataFabric = function () {
        $http.get(globlecart).then(function (rdata) {
            console.log(rdata.data)
            $scope.fabricCartData = [rdata.data];
            $scope.cartFabrics = [rdata.data];
            console.log($scope.fabricCartData)
            $scope.fabricCartData['grand_total'] = $scope.fabricCartData['total_price'];

            $scope.shirtimplement()
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
        $('.images-slider').flexslider({
            animation: "fade",
            controlNav: "thumbnails"
        });


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


    $scope.monogramSetting = function () {
        if ($scope.selecteElements[$scope.screencustom.fabric]['Monogram'].title != 'No') {
            var monoposition = $scope.selecteElements[$scope.screencustom.fabric]['Monogram'].title;
            var monograminit = $scope.selecteElements[$scope.screencustom.fabric]['Monogram Initial'];
            var monocolor = $scope.selecteElements[$scope.screencustom.fabric]['Monogram ColorBack'];
            var monostyle = $scope.selecteElements[$scope.screencustom.fabric]['Monogram Style']
            $scope.selecteElements[$scope.screencustom.fabric]['summary']['Monogram'] = [monoposition, monograminit, monocolor, monostyle].join(", ");
        }
        else {
            $scope.selecteElements[$scope.screencustom.fabric]['summary']['Monogram'] = "No";
        }
    }


    //collar cuff summary setting

    $scope.collarCuffSetting = function () {
        //collar insert
        var collar = $scope.selecteElements[$scope.screencustom.fabric]['Collar'];
        var collarinsert = $scope.selecteElements[$scope.screencustom.fabric]['Collar Insert'];
        var collarinsertfull = $scope.selecteElements[$scope.screencustom.fabric]['Collar Insert Full'];
        collarinsert = collarinsert == 'No' ? '' : ", " + collarinsert;
        collarinsertfull = collarinsertfull == 'No' ? '' : ", " + collarinsertfull;
        $scope.selecteElements[$scope.screencustom.fabric]['summary']['Collar'] = collar.title + collarinsert + collarinsertfull;
        //

        //cuff insert
        var cuffsleeve = $scope.selecteElements[$scope.screencustom.fabric]['Cuff & Sleeve'];
        var cuffinsert = $scope.selecteElements[$scope.screencustom.fabric]['Cuff Insert'];
        var cuffinsertfull = $scope.selecteElements[$scope.screencustom.fabric]['Cuff Insert Full'];
        cuffinsert = cuffinsert == 'No' ? '' : ", " + cuffinsert;
        cuffinsertfull = cuffinsertfull == 'No' ? '' : ", " + cuffinsertfull;
        $scope.selecteElements[$scope.screencustom.fabric]['summary']['Cuff & Sleeve'] = cuffsleeve.title + cuffinsert + cuffinsertfull;
        //
    }


    //monogram style color
    $scope.monogramColor = function (monoobj) {
        $scope.selecteElements[$scope.screencustom.fabric]['Monogram Background'] = monoobj.backcolor;
        $scope.selecteElements[$scope.screencustom.fabric]['Monogram Color'] = monoobj.color;
        $scope.selecteElements[$scope.screencustom.fabric]['Monogram ColorBack'] = monoobj.title;

        $scope.monogramSetting();
    }

    $scope.monogramFont = function (mfobj) {
        $scope.selecteElements[$scope.screencustom.fabric]['Monogram Font'] = mfobj;
        $scope.selecteElements[$scope.screencustom.fabric]['Monogram Style'] = mfobj.title;
        $scope.monogramSetting();
    }

    // monogram style 
    $scope.extracostcalculation = function () {
        var array = $scope.selecteElements[$scope.screencustom.fabric]['extraprice'];
        $scope.selecteElements[$scope.screencustom.fabric].totalextracost = 0;
        for (i in array) {
            var prc = array[i];
            $scope.selecteElements[$scope.screencustom.fabric].totalextracost += Number(prc);
        }
    }


    $scope.selectElement = function (obj, element) {


        $scope.screencustom.view_type = obj.viewtype;
        $scope.selecteElements[$scope.screencustom.fabric][obj.title] = element;
        if (element.extracost) {
            $scope.selecteElements[$scope.screencustom.fabric]['summary'][obj.title] = element.title + " ($" + element.extracost + ")";
        }
        else {
            $scope.selecteElements[$scope.screencustom.fabric]['summary'][obj.title] = element.title;
        }

        if (element.extracost) {
            $scope.selecteElements[$scope.screencustom.fabric]['extraprice'][obj.title] = element.extracost;
        }
        else {
            $scope.selecteElements[$scope.screencustom.fabric]['extraprice'][obj.title] = 0;
        }

        $scope.extracostcalculation();

        if (obj.title == 'Cuff & Sleeve') {
            $scope.selecteElements[$scope.screencustom.fabric].sleeve = element.sleeve;

        }
        if (obj.title == 'Collar') {
            $scope.selecteElements[$scope.screencustom.fabric].collar_buttons = element.buttons;
        }
        if (obj.title == 'Front') {
            $scope.selecteElements[$scope.screencustom.fabric].show_buttons = element.show_buttons;
        }
        if (element.monogram_change_css) {
            if ($scope.selecteElements[$scope.screencustom.fabric]['Monogram'].title != 'No') {
                $scope.selecteElements[$scope.screencustom.fabric]['Monogram'] = element.monogram_position;
            }
        }

        if (obj.title == 'Waistband') {
            if ($scope.selecteElements[$scope.screencustom.fabric]['Waistband'].wbtype == 'long') {
                var longele = $scope.selecteElements[$scope.screencustom.fabric]['Waistband'].longele;
                $scope.selecteElements[$scope.screencustom.fabric]['Waistband Adjustment'] = longele;
                $scope.selecteElements[$scope.screencustom.fabric]['summary']['Waistband Adjustment'] = longele.title;
            }
            else {
                var wbsummary = $scope.selecteElements[$scope.screencustom.fabric]['Waistband Adjustment'];
                console.log(wbsummary);
                if (wbsummary.wbtype == 'long') {
                    var longele = $scope.selecteElements[$scope.screencustom.fabric]['Waistband'].longele;
                    console.log(longele);
                    $scope.selecteElements[$scope.screencustom.fabric]['Waistband Adjustment'] = longele;
                    $scope.selecteElements[$scope.screencustom.fabric]['summary']['Waistband Adjustment'] = longele.title;

                }
                else {

                }
            }
        }

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


    $scope.selectCollarCuffInsertType = function (cctype, insfab) {
        $scope.selecteElements[$scope.screencustom.fabric][cctype] = insfab;
        $scope.collarCuffSetting();
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
        var extraprice = $scope.selecteElements[product_id].totalextracost;

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
                form.append('extra_price', extraprice);
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







    setTimeout(function () {
        $('.custom_block_slide').owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 3
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        })


        $('.custom_block_elements').owlCarousel({
            loop: false,
            margin: 10,
            nav: false,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                }
            }
        });

        $('#accordion1').on('shown.bs.collapse', function () {
            $("[aria-controls=" + ($(".elementItemBox.in")[0].id) + "] i").removeClass("fa-plus").addClass("fa-minus")
        })


        $('#accordion1').on('hidden.bs.collapse', function () {
            $(".button-expand i").removeClass("fa-minus").addClass("fa-plus")
        })

    }, 1500)




});



App.controller('customizationSuitMulti', function ($scope, $http, $location, $timeout, $filter) {
    $scope.fabricurl = "http://api.octopuscart.com/output/";
    var currencyfilter = $filter('currency');

    var globlecart = baseurl + "ApiMulti/cartOperationSuit/" + gcustome_id;
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
                "extraprice": {},
                "totalextracost": 0,
            };
        }
        var viewtype = "front";
        switch (gcustome_id) {
            case 4:
                viewtype = "front";
                break;
            case 3:
                viewtype = "pant";
                break;

            case 7:
                viewtype = "pant";
                break;

            default:
                viewtype = "front";
        }
        var custometype = defaut_view;

//        switch (gcustome_id) {
//            case 4:
//                custometype = "Jacket";
//                break;
//            case 3:
//                custometype = "Pant";
//                break;
//            case 2:
//                custometype = "Suit";
//                break;
//            default:
//                custometype = "Suit";
//        }


        $scope.screencustom = {
            'view_type': viewtype,
            "fabric": $scope.cartFabrics[0].product_id,
            "productobj": $scope.cartFabrics[0],
            "sku": $scope.cartFabrics[0].sku,
        };
        var url = baseurl + "customApi/customeElements" + custometype;
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
            $scope.fabricCartData = rdata.data;
            console.log($scope.fabricCartData)
            $scope.fabricCartData['grand_total'] = $scope.fabricCartData['total_price'];
            for (pd in $scope.fabricCartData.products) {
                var pds = $scope.fabricCartData.products[pd];
                $scope.cartFabrics.push(pds);

            }
            $scope.shirtimplement()
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
        console.log(fabric)
        $scope.screencustom.fabric = fabric.product_id;
        $scope.screencustom.sku = fabric.sku;
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






    $scope.extracostcalculation = function () {
        var array = $scope.selecteElements[$scope.screencustom.fabric]['extraprice'];
        $scope.selecteElements[$scope.screencustom.fabric].totalextracost = 0;
        for (i in array) {
            var prc = array[i];
            $scope.selecteElements[$scope.screencustom.fabric].totalextracost += Number(prc);
        }
    }


    $scope.selectElement = function (obj, element) {

        $scope.screencustom.view_type = obj.viewtype;
        $scope.selecteElements[$scope.screencustom.fabric][obj.title] = element;
        console.log($scope.selecteElements);

        if (element.extracost) {
            $scope.selecteElements[$scope.screencustom.fabric]['summary'][obj.title] = element.title + " ($" + element.extracost + ")";
        }
        else {
            $scope.selecteElements[$scope.screencustom.fabric]['summary'][obj.title] = element.title;

        }
        if (element.extracost) {
            $scope.selecteElements[$scope.screencustom.fabric]['extraprice'][obj.title] = element.extracost;
        }
        else {
            $scope.selecteElements[$scope.screencustom.fabric]['extraprice'][obj.title] = 0;
        }
        $scope.extracostcalculation();

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
        var summerydata = $scope.selecteElements;
        var customarray = [];

        for (i in summerydata) {
            var form = new FormData()
            var ks = i;
            var kv = summerydata[i];
            console.log(kv.summary)
            var extraprice = kv.totalextracost;
            for (kvk in kv.summary) {
                var kvv = kv.summary[kvk];
                form.append("customekey[]", kvk);
                form.append("customevalue[]", kvv);
            }
            form.append('product_id', ks);
            form.append('quantity', 1);
            form.append('custome_id', 1);
            form.append('extra_price', extraprice);
            console.log(form)
//            console.log(ks, kv);
//            var summaryhtml = "<tr><th>" + ks + "</th><td>" + kv + "</td></tr>";
            customarray.push(form);
        }
        console.log(customarray);

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
            allowEscapeKey: false,
            allowOutsideClick: false,
//            html: customdiv,
            preConfirm: function () {

                swal({
                    title: 'Adding to Cart',
                    onOpen: function () {
                        swal.showLoading()
                    }
                });
                var globlecart = baseurl + "Api/cartOperationCustomMulti";

                function setData(flist, ind) {
                    var nd = ind;
                    var fll = flist.length;
                    console.log(fll, nd)
                    if (nd == fll) {
                        window.location = baseurl + "Cart/detailsc";
                    }
                    else {

                        var nform = flist[ind];
                        $http.post(globlecart, nform).then(function (rdata) {
                            swal.close();
                            var count = ind + 1;
                            setData(flist, count)
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

                                }
                            })
                        }, function () {
                            swal.close();
                            var count = ind + 1;
                            setData(flist, count)
                            swal({
                                title: 'Something Wrong..',
                            })
                        });



                    }
                }

                setData(customarray, 0)
                swal.close();




            },
        })
    }



});


