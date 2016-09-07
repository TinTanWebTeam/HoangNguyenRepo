/*Menu */
var user = $("nav.navbar.navbar-default.navbar-static-top > div.navbar-default.sidebar > div.sidebar-nav.navbar-collapse > ul#side-menu.nav >li");
user.click(function () {
    if ($(this).find("a").text().trim() === "Quản lý người dùng") {
        $.get(url + "admin/getUserManagement", function (data) {
             $("div#page-wrapper").empty().append(data);
        })
     }
    if ($(this).find("a").text().trim() === "Quản lý danh mục") {

        $.get(url + "admin/getListManagement", function (data) {
            $("div#page-wrapper").empty().append(data);
        })
    }

    if($(this).find("a").text().trim()==="Quản lý cước phí"){
        $.get(url+"admin/getPostageManager",function(data){
            $("div#page-wrapper").empty().append(data);
        })
    }

    if($(this).find("a").text().trim()==="Phân tài"){
        $.get(url+"admin/getDivisiveDriver",function(data){
            $("div#page-wrapper").empty().append(data);
        })
    }
    if($(this).find("a").text().trim()==="Báo cáo"){
        $.get(url+"admin/getReport",function(data){
            $("div#page-wrapper").empty().append(data);
        })
    }

})




/*Menu Sub*/
var user = $("nav.navbar.navbar-default.navbar-static-top > div.navbar-default.sidebar > div.sidebar-nav.navbar-collapse > ul#side-menu.nav > li > ul.nav.nav-second-level>li");
user.click(function () {
    if ($(this).find("a").text().trim() === "Khách hàng") {
        $.get(url + "admin/getCustomer", function (data) {
            $("div#page-wrapper").empty().append(data);
        })
    }
    if ($(this).find("a").text().trim() === "Yêu cầu giao hàng") {
        $.get(url + "admin/getDeliRequirement", function (data) {
            $("div#page-wrapper").empty().append(data);
        })
    }

    if($(this).find("a").text().trim()==="Xe công ty"){
        $.get(url+"admin/getVehicleCompany",function(data) {
            $("div#page-wrapper").empty().append(data);
        })
    }
    if($(this).find("a").text().trim()==="Xe ngoài"){
        $.get(url+"admin/getVehicleOutSite",function(data) {
            $("div#page-wrapper").empty().append(data);
        })
    }
    if($(this).find("a").text().trim() === "Công nợ khách hàng" ){
        $.get(url+"admin/getDebtCustomer",function(data){
            $("div#page-wrapper").empty().append(data);
        } )
    }
    if($(this).find("a").text().trim() === "Nhà xe ngoài" ){
        $.get(url+"admin/getHouseVehicleOutSite",function(data){
            $("div#page-wrapper").empty().append(data);
        } )
    }



    if($(this).find("a").text().trim() === "Nhiên liệu" ){
        $.get(url+"admin/getFuel",function(data){
            $("div#page-wrapper").empty().append(data);
        } )
    }
    if($(this).find("a").text().trim() === "Thay nhớt" ){
        $.get(url+"admin/getBoil",function(data){
            $("div#page-wrapper").empty().append(data);
        } )
    }
    if($(this).find("a").text().trim() === "Đậu bãi" ){
        $.get(url+"admin/getPackingLot",function(data){
            $("div#page-wrapper").empty().append(data);
        } )
    }
    if($(this).find("a").text().trim() === "Khác" ){
        $.get(url+"admin/getOther",function(data){
            $("div#page-wrapper").empty().append(data);
        } )
    }





})