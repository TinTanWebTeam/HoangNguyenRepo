<style>
    .menu-open .menu-side {
        right: 0;
    }
    .btn-del-edit{
        float: left;padding-right: 5px
    }
    .menu-side {
        -webkit-transition: right 0.5s ease;
        -moz-transition: right 0.5s ease;
        transition: right 0.5s ease;
    }

    .menu-side {
        background-color: #333;
        border-left: 1px solid #000;
        color: #fff;
        position: fixed;
        top: 0;
        right: -431px;
        width: 400px;
        height: 100%;
        padding: 70px 10px 10px 10px;
        z-index:2;
    }
</style>

<div class="row" onwheel="mouseScroll()">
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-12">
                <h5 style="color:#2196f3">Quản lý khách hàng
                    <div class="pull-right menu-toggle">
                        <button type="button" class="btn btn-primary btn-ms">Thêm mới</button>
                    </div>
               </h5>
                <hr style="margin-top: 0px;">
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <header>
            <nav class="menu-side">
                <div class="menu-toggle">
                    <i class="glyphicon glyphicon-remove"></i>
                </div>
              <form>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" id="exampleInputFile">
                        <p class="help-block">Example block-level help text here.</p>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Check me out
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
            </nav>
        </header>


        <div class="table-responsive">
            <table class="table table-bordered table-hover order-column" id="tableUserList"
                   style="margin-bottom: 0px;">
                <thead>
                <tr class="active">
                    <th>Số xe</th>
                    <th>Thời gian đổ dầu</th>
                    <th>Số lít</th>
                    <th>Đơn giá</th>
                    <th>Tổng chi phí</th>
                    <th>Xóa / Sửa</th>
                </tr>
                </thead>
                <tbody id="tbodyUserList">
                <tr>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>
                        <div class="menu-toggle btn-del-edit">
                            <div class="btn btn-danger btn-circle">
                                <i class="glyphicon glyphicon-remove"></i>
                            </div>
                        </div>
                        <div class="menu-toggle">
                            <div class="btn btn-danger  btn-circle">
                                <i class="glyphicon glyphicon-pencil"></i>
                            </div>
                        </div>
                    </td>
                  </tr>
                </tbody>
        </table>
    </div>
</div>
</div>
<script>
    (function () {
        var header = $('header');
        $('.menu-toggle').bind('click', function () {
            header.toggleClass('menu-open');
            return false;
        });
    })();

    function mouseScroll() {
        if (document.body.scrollTop > 70) {
            $('nav.menu-side').css('padding-top', '0px');
        } else {
            $('nav.menu-side').css('padding-top', '50px');
        }
    }
</script>