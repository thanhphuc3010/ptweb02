<?php

function get_header()
{

?>

    <header>
        <div class="grid">
            <div class="navbar">
                <div class="search">
                    <form action="" class="search__box position-relative">
                        <a class="search__link" href="#"><i class="fas fa-search search__icon"></i></a>
                        <input type="text" class="search__input form-control" name="search" placeholder="Search here..." value="<?php echo $_GET["search"] ?? "" ?>">
                    </form>
                </div>
                <div class="account">
                    <ul class="account__list">
                        <li class="account__items language">
                            <a id="btn_lang" class="language__link" href="#">
                                <img src="img/vietnam_flag.jpg" alt="vietnam flag">
                                Vi
                            </a>
                        </li>
                        <li class="account__items user__icon "><i class="far fa-envelope"></i></li>
                        <li class="account__items user__icon "><i class="far fa-bell"></i></li>
                        <li class="account__items">
                            <a href="#" class="account__link">
                                <img class="account__img" src="img/user.png" alt="user">
                            </a>
                        </li>
                    </ul>
                    <!-- Drop_box_Language -->
                    <div id="dropbox" class="dropbox">
                        <ul class="dropbox__list">
                            <li class="dropbox__items">
                                <a class="dropbox__link" href="#">
                                    <img src="img/vietnam_flag.jpg" alt="vietnam flag">
                                    Vietnamese
                                </a>
                            </li>
                            <li class="dropbox__items">
                                <a class="dropbox__link" href="#">
                                    <img src="img/england_flag.png" alt="england flag">
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

<?php

}
