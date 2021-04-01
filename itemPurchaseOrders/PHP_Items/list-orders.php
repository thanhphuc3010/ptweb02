<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    $sql = "SELECT `orderDate`,`poId`,`poNumber`,a.supplierId, b.supplierNumber,`staffId`, a.remark, a.status, a.billingStatus FROM itempurchaseorders a, suppliers b WHERE a.supplierId = b.supplierId";
    $query = mysqli_query($connect,$sql);
?>

    <div class="wrapper">
        <!-- Lưới Grid -->
        <header>
            <div class="grid">
                <div class="navbar">
                    <div class="search">
                        <form action="#" class="search__box">
                            <a class="search__link" href="#"><i class="fas fa-search search__icon"></i></a>
                            <input type="text" class="search__input" placeholder="Search here...">
                        </form>
                    </div>
                    <div class="account">
                        <ul class="account__list">
                            <li  class="account__items language">
                                <a id ="btn_lang" class="language__link" href="#">
                                    <img src="./assets/img/vietnam_flag.jpg" alt="vietnam flag">
                                    Vi
                                </a>
                            </li>
                            <li class="account__items user__icon "><i class="far fa-envelope"></i></li>
                            <li class="account__items user__icon "><i class="far fa-bell"></i></li>
                            <li class="account__items">
                                <a href="#" class="account__link">
                                    <img class="account__img" src="./assets/img/user.png" alt="user">
                                </a>
                            </li>
                        </ul>
                        <!-- Drop_box_Language -->
                        <div id="dropbox" class="dropbox">
                            <ul class="dropbox__list">
                                <li class="dropbox__items">
                                    <a class="dropbox__link" href="#">
                                        <img src="./assets/img/vietnam_flag.jpg" alt="vietnam flag">
                                        Vietnamese
                                    </a>
                                </li>
                                <li class="dropbox__items">
                                    <a class="dropbox__link" href="#">
                                        <img src="./assets/img/england_flag.png" alt="england flag">
                                        English
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main -->
        <div class="app">
            <div class="grid">
                <div class="container">
                    <div class="items">
                        <div class="items__infor">
                            <h1 class="items__title">
                                Orders List
                            </h1>
                            <p class="items__detail">
                                Đây là nơi bạn theo dõi thông tin các đơn đặt hàng của mình và thực hiện các chức năng có liên quan.
                            </p>
                        </div>
                        <div class="btn__genernal">
                            <button onclick="window.location.href='index.php?page_layout=add-order';" class="items__add item__add--list">
                                <i class="fas fa-plus items__icon "></i>
                                <p>Tạo mới</p>
                            </button>
                            <button class="items__add item__add--list">
                                <i class="fas fa-download items__icon"></i>
                                <p>In danh sách</p>
                            </button>
                        </div>
                    </div>

                    <div class="content">
                        <table class="content-table" id="content-table">
                            <thead class="data__title">
                                <tr class="table__title">
                                    <th class="col_1">Ngày đặt hàng</th>
                                    <th class="col_1">Mã đơn hàng</th>
                                    <th class="col_1-2">Mã nhân viên</th>
                                    <th class="col_1-2">Mã nhà cung cấp</th>
                                    <th class="col_3">Mô tả</th>
                                    <th class="col_1">Trạng thái đơn hàng</th>
                                    <th class="col_3">Trạng thái hóa đơn</th>
                                    <th class="col_5">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="data_content">
                                <?php
                                while ($row = mysqli_fetch_assoc($query)) { ?>
                                    <tr class="table__content">
                                        <td class="orders--Date"><?php echo $row['orderDate']; ?> </td>
                                        <td class="orders--poNumber"><?php echo $row['poNumber']; ?></td>
                                        <td class="orders--staffId"><?php echo $row['staffId']; ?> </td>
                                        <td class="orders--supplierId"><?php echo $row['supplierNumber']; ?></td>
                                        <td style="text-align:justify">
                                            <p class="orders__description"><?php echo $row['remark']; ?></p>
                                        </td>
                                        <td class="status-check">
                                            <div class="btn-style orders--status"><?php echo $row['status']; ?></div>
                                        </td>
                                        <td>
                                            <div class="btn-style orders--billingStatus"><?php echo $row['billingStatus']; ?></div>
                                        </td>
                                        <td>
                                            <div class="btn">
                                                <div class="btn__view">
                                                    <a href="index.php?page_layout=view&id=<?php echo $row['poNumber'];?>" class="btn__link">
                                                        <i class="btn_icon far fa-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="btn__edit">
                                                    <a onclick="Del('<?php echo $row['poNumber'];?>','<?php echo $row['status'];?>')" class="btn__link">
                                                        <i class="btn_icon fas fa-pencil-alt"></i>
                                                    </a>
                                                </div>
                                                <div class="btn__delete">
                                                    <a onclick="return Del('<?php echo $row['poNumber'];?>','<?php echo $row['status'];?>')" href="index.php?page_layout=delete&id=<?php echo $row['poId'];?>" class="btn__link">
                                                        <i class="btn_icon far fa-trash-alt"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- Pagination -->
                    <ul class="pagi">
                        <li class="pagi__item pagi__action pagi__prev is-disabled">
                        <i class="pagi__icon fal fa-angle-left"></i>
                        </li>
                        <li class="pagi__item is-active">1</li>
                        <li class="pagi__item">2</li>
                        <li class="pagi__item">3</li>
                        <li class="pagi__item">4</li>
                        <li class="pagi__item">5</li>
                        <li class="pagi__item pagi__action pagi__next">
                        <i class="pagi__icon fal fa-angle-right"></i>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="grid">
                <div class="footer__box">
                    <div class="footer__detail">
                        <p class="footer__policy">
                            <a href="#" class="policy__link"> Privacy Policy</a>
                        </p>
                        <p class="footer__use">
                            <a href="#" class="use__link">Terms of Use</a>
                        </p>
                    </div>
                    <div class="footer__copyright">
                        <p>Copyright &#169; by NHTT</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js">
    </script>
    <script>

        $(document).ready(function() {
            $(".search__input").keyup(function() {
                var txt = $(".search__input").val();
                $.post("./PHP_Items/search-order.php", {data: txt}, function(data) {
                    $(".data_content").html(data);
                });
            });
        });
        document.getElementById("btn_lang").addEventListener("click",function()
        {
            var drbox = document.getElementById("dropbox");
            if (drbox.style.display == "block")
            {
                drbox.style.display = "none";
            }
            else 
            {
                drbox.style.display = "block";
            }
        })


        function Del(name,status) {
            if(status === 'DONE') {
                alert('Đơn hàng đã ở trạng thái Hoàn thành. Bạn không thể xoá đơn hàng này');
                return false;
            } else return confirm("Bạn có chắc chắn muốn xoá đơn hàng: " + name + " không?");
        }
    </script>
