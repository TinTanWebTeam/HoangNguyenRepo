<style>
    .menu-open .menu-side {
        right: 0;
    }

    .menu-side {
        -webkit-transition: right 0.2s ease;
        -moz-transition: right 0.2s ease;
        transition: right 0.2s ease;
    }

    .menu-side {
        background-color: #333;
        border-left: 1px solid #000;
        color: #fff;
        position: fixed;
        top: 0;
        right: -431px;
        width: 410px;
        height: 100%;
        padding: 53px 10px 10px 10px;
    }
</style>

<div class="row" onwheel="mouseScroll()">
    <div class="col-md-12">
        <h1>Quản lý khách hàng</h1>
        <header>
            <div class="menu-toggle">
                <div class="btn btn-primary btn-circle">
                    <i class="fa fa-plus"></i>
                </div>
            </div>
            <nav class="menu-side">
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
                <tr>
                    <th>Số xe</th>
                    <th>Thời gian đổ dầu</th>
                    <th>Số lít</th>
                    <th>Đơn giá</th>
                    <th>Tổng chi phí</th>
                </tr>
                </thead>
                <tbody id="tbodyUserList">
                <tr>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                </tr>
                <tr>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                </tr>
                <tr>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                    <td>aaaa</td>
                </tr>
                </tbody>
            </table>

        </div>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus hic nostrum officiis possimus
            praesentium
            quo ut. Ab, dolorum error, id, illo in ipsam maiores molestiae obcaecati quasi sapiente sint soluta?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, rem soluta. Animi aperiam architecto, autem consequuntur cupiditate deleniti ducimus ea eligendi id impedit nesciunt odio quaerat quam quisquam totam velit?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, rem soluta. Animi aperiam architecto, autem consequuntur cupiditate deleniti ducimus ea eligendi id impedit nesciunt odio quaerat quam quisquam totam velit?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, rem soluta. Animi aperiam architecto, autem consequuntur cupiditate deleniti ducimus ea eligendi id impedit nesciunt odio quaerat quam quisquam totam velit?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, rem soluta. Animi aperiam architecto, autem consequuntur cupiditate deleniti ducimus ea eligendi id impedit nesciunt odio quaerat quam quisquam totam velit?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, rem soluta. Animi aperiam architecto, autem consequuntur cupiditate deleniti ducimus ea eligendi id impedit nesciunt odio quaerat quam quisquam totam velit?</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illo, rem soluta. Animi aperiam architecto, autem consequuntur cupiditate deleniti ducimus ea eligendi id impedit nesciunt odio quaerat quam quisquam totam velit?</p>
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
        if(document.body.scrollTop > 53){
            $('nav.menu-side').css('padding-top', '0px');
        } else {
            $('nav.menu-side').css('padding-top', '53px');
        }
    }
</script>