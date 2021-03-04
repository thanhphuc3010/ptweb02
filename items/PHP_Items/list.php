<?php
    $sql = "SELECT `itemNo`,`image`,`itemName`, `description`,`qty_available`, `qtyOnOrder`,`price` FROM `items`";
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
                                Product List
                            </h1>
                            <p class="items__detail">
                                Đây là nơi bạn theo dõi thông tin các sản phẩm của mình và thực hiện các chức năng có liên quan.
                            </p>
                        </div>
                        <div class="btn__genernal">
                            <button onclick="window.location.href='index.php?page_layout=add';" class="items__add">
                                <i class="fas fa-plus items__icon "></i>
                                <p>Tạo mới</p>
                            </button>
                            <button class="items__add">
                                <i class="fas fa-download items__icon"></i>
                                <p>In danh sách</p>
                            </button>
                        </div>
                    </div>

                    <div class="content">
                        <table class="data">
                            <thead class="data__title">
                                <tr class="table__title">
                                    <th class="col_1">Mã sản phẩm</th>
                                    <th class="col_2">Hình ảnh</th>
                                    <th class="col_3">Tên sản phẩm</th>
                                    <th class="col_4">Mô tả</th>
                                    <th class="col_5 ">Số lượng</th>
                                    <th class="col_6">Đang đặt</th>
                                    <th class="col_7" style="text-align: right">Giá bán</th>
                                    <th class="col_3">Thao tác</th>
                                </tr>
                            </thead>
                            <tbody class="data_content">
                                <!-- <tr class="table__content">
                                    <td class="">ITEM00001</td>
                                    <td class="items__img"> 
                                        <div class="items__image">
                                            <img src="./image/quantaynam.jpg" alt="">
                                        </div>
                                    </td>
                                    <td class="">Điện thoại Iphone 12 Pro Max 512GB Chính hãng</td>
                                    <td>
                                        <p class="items__decription">
                                            iPhone 12 Pro Max 512GB - đẳng cấp từ tên gọi đến từng chi tiết. Ngay từ khi chỉ là tin đồn thì chiếc smartphone này đã làm đứng ngồi không yên bao “fan cứng” nhà Apple.
                                        </p>
                                    </td>
                                    <td class="items__quantity">20</td>
                                    <td class="items__orders">40</td>
                                    <td class="items__price">33000000</td>
                                    <td>
                                        <div class="btn">
                                            <div class="btn__view">
                                                <a href="#" class="view__link">
                                                    <i class="btn_icon far fa-eye"></i>
                                                </a>
                                            </div>
                                            <div class="btn__edit">
                                                <a href="#" class="edit__link">
                                                    <i class="btn_icon fas fa-pencil-alt"></i>
                                                </a>
                                            </div>
                                            <div class="btn__delete">
                                                <a href="#" class="delete__link">
                                                    <i class="btn_icon far fa-trash-alt"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr> -->
                                <?php
                                while($row = mysqli_fetch_row($query)){?>
                                        <tr class="table__content">
                                        <td class="items__id"><?php echo $row[0]; ?> </td>
                                        <td class="items__img"> 
                                            <div class="items__image">
                                                <img src="image/<?php echo $row[1]; ?>" alt="">
                                            </div>
                                        </td>
                                        <td class=""><?php echo $row[2]; ?> </td>
                                        <td>
                                            <p class="items__decription">
                                            <?php echo $row[3]; ?>
                                            </p>
                                        </td>
                                        <td class="items__quantity"><?php echo $row[4]; ?></td>
                                        <td class="items__orders"><?php echo $row[5]; ?></td>
                                        <td class="items__price"><?php echo number_format($row[6])." VND"; ?></td>
                                        <td>
                                            <div class="btn">
                                                <div class="btn__view">
                                                    <a href="./index.php?page_layout=view&id=<?php echo $row[0];?>" class="btn__link">
                                                        <i class="btn_icon far fa-eye"></i>
                                                    </a>
                                                </div>
                                                <div class="btn__edit">
                                                    <a href="./index.php?page_layout=edit&id=<?php echo $row[0];?>" class="btn__link">
                                                        <i class="btn_icon fas fa-pencil-alt"></i>
                                                    </a>
                                                </div>
                                                <div class="btn__delete">
                                                    <a onclick="return Del('<?php echo $row[2];?>')" href="./index.php?page_layout=delete&id=<?php echo $row[0];?>" class="btn__link">
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
                        <p>Copyright &#169; by PTP</p>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script >
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


        function Del(name) {
            return confirm("Bạn có chắc chắn muốn xoá sản phẩm: " + name + " không?");
        }
    </script>
