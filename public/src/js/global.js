(function(){
    languageOptions = {
        "decimal": "",
        "emptyTable": "Không có dữ liệu trên bảng",
        "info": "Hiển thị từ _START_ đến _END_ trong _TOTAL_ hàng",
        "infoEmpty": "Hiển thị từ 0 đến 0 trong 0 hàng",
        "infoFiltered": "(Lọc từ _MAX_ hàng)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Hiển thị _MENU_ hàng",
        "loadingRecords": "Đang tải ...",
        "processing": "Đang xử lý ...",
        "search": "Tìm Kiếm:",
        "zeroRecords": "Không tìm thấy hàng phù hợp",
        "paginate": {
            "first": "Đầu",
            "last": "Cuối",
            "next": "Tiếp",
            "previous": "Lùi"
        },
        "aria": {
            "sortAscending": ": Nhấp vào để xếp cột tăng dần",
            "sortDescending": ": Nhấp vào để xếp cột giảm dần"
        }
    };
})();

function getContentByUrl(element){
    $.get(url + $(element).attr('data-url'), function(view) {
        $("div#page-wrapper").empty().append(view);
    });
}





