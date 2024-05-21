<?php
	class phone
	{
		function connect(){
			$con = mysql_connect('localhost', 'root', '');
			if (!$con){
				die("Khong the ket noi co so du lieu");
				exit();	
			}else{
				mysql_select_db('phone_db');
				mysql_query('SET NAMES UTF8');
				return $con;
			}
		}	
		
		function xuatdanhsach($sql){
			$link = $this->connect();
			$ketqua = mysql_query($sql, $link);
			$n = mysql_num_rows($ketqua);
			
			if ($n > 0){
                echo '<div class="row popup-products blocks-spacer">';

				while($row = mysql_fetch_array($ketqua)){
                    $id = $row['id'];
					$tensp = $row['tensp'];
                    $title = $row['title'];
                    $gia = $row['gia'];
                    $hinh = $row['hinh'];
                    echo '<div class="span3">
                            <div class="product">
                                <div class="product-inner">
                                    <div class="product-img">
                                        <div class="picture">
                                            <a href="product.php?id='.$id.'&phanloai=moi"><img src="images/dummy/products/'. $hinh .'" alt="" width="540" height="374" /></a>
                                            <div class="img-overlay">
                                                <a href="shop.php" class="btn more btn-primary">More</a>
                                                <a href="product.php?id='.$id.'&phanloai=moi" class="btn buy btn-danger">Buy</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-titles no-margin">
                                        <h4 class="title">'. $gia .'$</h4>
                                        <h5 class="no-margin"><a href="product.php?id='.$id.'&phanloai=moi">'. $tensp .'</a></h5>
                                    </div>
                                    <p class="desc">'. $title .'</p>
                                    <div class="row-fluid hidden-line">
                                        <div class="span6">
                                            <a href="#" class="btn btn-small"><i class="icon-heart"></i></a>
                                            <a href="#" class="btn btn-small"><i class="icon-exchange"></i></a>
                                        </div>
                                        <div class="span6 align-right">
                                            <span class="icon-star stars-clr"></span>
                                            <span class="icon-star stars-clr"></span>
                                            <span class="icon-star stars-clr"></span>
                                            <span class="icon-star stars-clr"></span>
                                            <span class="icon-star stars-clr"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
				}
                echo '</div> ';

			}
			
			mysql_close($link);
		}

        function xuatdanhsachnoibat($sql){
			$link = $this->connect();
			$ketqua = mysql_query($sql, $link);
			$n = mysql_num_rows($ketqua);
			
			if ($n > 0){
                echo '<div class="row">';

				while($row = mysql_fetch_array($ketqua)){
                    $id = $row['id'];
					$tensp = $row['tensp'];
                    $title = $row['title'];
                    $gia = $row['gia'];
                    $hinh = $row['hinh'];
                    echo '<div class="span4">
                    <div class="product">
                        <div class="product-img featured">
                            <div class="picture">
                                <a href="product.php?id='.$id.'&phanloai=noibat"><img
                                        src="images/dummy/featured-products/'. $hinh .'" alt=""
                                        width="518" height="358" /></a>
                                <div class="img-overlay">
                                    <a href="shop.php" class="btn more btn-primary">More</a>
                                </div>
                            </div>
                        </div>
                        <div class="main-titles">
                            <h4 class="title">'. $gia .'$</h4>
                            <h5 class="no-margin"><a href="product.php?id='.$id.'&phanloai=noibat">'. $tensp .'</a></h5>
                        </div>
                        <p class="desc">'. $title .'</p>
                    </div>
                </div>';
				}
                echo    '</div>';

			}
			
			mysql_close($link);
		}

        function xuatdanhsachphobien($sql){
			$link = $this->connect();
			$ketqua = mysql_query($sql, $link);
			$n = mysql_num_rows($ketqua);
			
			if ($n > 0){
                echo '<div class="row popup-products">';

				while($row = mysql_fetch_array($ketqua)){
					$tensp = $row['tensp'];
                    $title = $row['title'];
                    $gia = $row['gia'];
                    $hinh = $row['hinh'];
                    $id = $row['id'];
                    echo '<div class="span3">
                    <div class="product">
                        <div class="product-inner">
                            <div class="product-img">
                                <div class="picture">
                                    <a href="product.php?id='.$id.'&phanloai=phobien"><img
                                            src="images/dummy/most-popular-products/'. $hinh .'" alt=""
                                            width="540" height="412" /></a>
                                    <div class="img-overlay">
                                        <a href="shop.php" class="btn more btn-primary">More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="main-titles no-margin">
                                <h4 class="title">'. $gia .'$</h4>
                                <h5 class="no-margin"><a href="product.php?id='.$id.'&phanloai=phobien">'. $tensp .'</a></h5>
                            </div>
                            <p class="desc">'. $title. '</p>
                            <div class="row-fluid hidden-line">
                                <div class="span6">
                                    <a href="#" class="btn btn-small"><i class="icon-heart"></i></a>
                                    <a href="#" class="btn btn-small"><i class="icon-exchange"></i></a>
                                </div>
                                <div class="span6 align-right">
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';
				}
                echo    '</div>';

			}
			
			mysql_close($link);
		}


        function themxoasua($sql){
            $link = $this->connect();
            if (mysql_query($sql, $link)){
                return 1;
            }else{
                return 0;
            }
            mysql_close($link);
        }

        function uploadfile($tmp_name, $folder, $name){
            $name = $folder.'/'.$name;
            if (move_uploaded_file($tmp_name, $name)){
                return 1;
            }else{
                return 0;
            }

        }

        function loadcongty($sql){
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $n = mysql_num_rows($ketqua);
            if ($n > 0){
                echo '<select name="thuonghieu" id="select">
                        <option>Mời chọn thương hiệu</option>';
                while ($row = mysql_fetch_array($ketqua)){
                    $id = $row['id'];
                    $tenhang = $row['tenhang'];
                echo 	'<option value="'. $tenhang .'">'. $tenhang .'</option>';
                }
                echo '</select>';
            }else{
                echo'Không có dữ liệu!';	
            }
            mysql_close($link);
        }

        function loadtheloai($sql){
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $n = mysql_num_rows($ketqua);
            if ($n > 0){
                echo '<select name="theloai" id="select">
                        <option>Mời chọn thể loại</option>';
                while ($row = mysql_fetch_array($ketqua)){
                    $id = $row['id'];
                    $tentheloai = $row['tentheloai'];
                echo 	'<option value="'. $tentheloai .'">'. $tentheloai .'</option>';
                }
                echo '</select>';
            }else{
                echo'Không có dữ liệu!';	
            }
            mysql_close($link);
        }

        function loadphobien($sql){
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $n = mysql_num_rows($ketqua);
            if ($n > 0){
                echo '<select name="phobien" id="select">
                        <option>Mời chọn mức độ phổ biến</option>';
                while ($row = mysql_fetch_array($ketqua)){
                    $id = $row['id'];
                    $mucphobien = $row['mucphobien'];
                echo 	'<option value="'. $mucphobien .'">'. $mucphobien .'</option>';
                }
                echo '</select>';
            }else{
                echo'Không có dữ liệu!';	
            }
            mysql_close($link);
        }

        function xuatdanhsach_shop($sql){
			$link = $this->connect();
			$ketqua = mysql_query($sql, $link);
			$n = mysql_num_rows($ketqua);
			
			if ($n > 0){
                echo '<div id="isotopeContainer" class="isotope-container">';

				while($row = mysql_fetch_array($ketqua)){
					$tensp = $row['tensp'];
                    $gia = $row['gia'];
                    $hinh = $row['hinh'];
                    $theloai = $row['theloai'];
                    $phobien = $row['phobien'];
                    $thuonghieu = $row['id_hang'];
                    $id = $row['id'];
                    echo '<div class="span3 isotope--target filter--'.$theloai.'" data-price="'.$gia.'" data-popularity="'.$phobien.'" data-brand="'.$thuonghieu.'">
                            <div class="product">
                                <div class="product-inner">
                                    <div class="stamp green">New</div>
                                    <div class="product-img">
                                        <div class="picture">
                                            <a href="product.php?id='.$id.'&phanloai=moi"><img width="540" height="374" alt=""
                                                    src="images/dummy/products/'. $hinh .'" /></a>
                                            <div class="img-overlay">
                                                <a class="btn more btn-danger" href="product.php?id='.$id.'&phanloai=moi">Buy</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-titles no-margin">
                                        <h4 class="title">'.$gia.'$</h4>
                                        <h5 class="no-margin isotope--title"><a href="product.php?id='.$id.'&phanloai=moi">'.$tensp.'</a></h5>
                                    </div>
                                    <div class="row-fluid hidden-line">
                                        <div class="span6">
                                            <a href="#" class="btn btn-small"><i class="icon-heart"></i></a>
                                            <a href="#" class="btn btn-small"><i class="icon-exchange"></i></a>
                                        </div>
                                        <div class="span6 align-right">
                                            <span class="icon-star stars-clr"></span>
                                            <span class="icon-star stars-clr"></span>
                                            <span class="icon-star"></span>
                                            <span class="icon-star"></span>
                                            <span class="icon-star"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>';
				}
                echo '</div>';

			}
			
			mysql_close($link);
		}

        function xuatdanhsach_list($sql){
			$link = $this->connect();
			$ketqua = mysql_query($sql, $link);
			$n = mysql_num_rows($ketqua);
			
			if ($n > 0){
                echo '<div id="isotopeContainer" class="isotope-container">';

				while($row = mysql_fetch_array($ketqua)){
					$tensp = $row['tensp'];
                    $gia = $row['gia'];
                    $hinh = $row['hinh'];
                    $theloai = $row['theloai'];
                    $phobien = $row['phobien'];
                    $thuonghieu = $row['id_hang'];
                    $title = $row['title'];
                    $id = $row['id'];
                    echo '<div class="span9 isotope--target filter--'.$theloai.'" data-price="'.$gia.'" data-popularity="'.$phobien.'" data-brand="'.$thuonghieu.'">
                                <div class="product">
                                    <div class="row">
                                        <div class="span3">
                                            <div class="product-img">
                                                <div class="picture">
                                                    <a href="product.php?id='.$id.'&phanloai=moi"><img width="540" height="374" alt=""
                                                            src="images/dummy/products/'.$hinh.'" /></a>
                                                    <div class="img-overlay">
                                                        <a class="btn more btn-danger" href="product.php?id='.$id.'&phanloai=moi">Buy</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div class="main-titles no-margin">
                                                <h5 class="isotope--title"><a href="product.php?id='.$id.'&phanloai=moi">'.$tensp.'</a>
                                                </h5>
                                                <div class="meta-data">
                                                    <span class="price">'.$gia.'$</span>
                                                    <a href="#" class="btn btn-small"><i class="icon-heart"></i></a>
                                                    <a href="#" class="btn btn-small"><i
                                                            class="icon-exchange"></i></a>
                                                    &nbsp;
                                                    <span class="icon-star stars-clr"></span>
                                                    <span class="icon-star stars-clr"></span>
                                                    <span class="icon-star stars-clr"></span>
                                                    <span class="icon-star"></span>
                                                    <span class="icon-star"></span>
                                                </div>
                                            </div>
                                            <p class="desc">'.$title.'</p>
                                        </div>
                                    </div>
                                </div>
                            </div>';
				}
                echo '</div>';

			}
			
			mysql_close($link);
		}

        function xuatdanhsach_full($sql){
			$link = $this->connect();
			$ketqua = mysql_query($sql, $link);
			$n = mysql_num_rows($ketqua);
			
			if ($n > 0){
                echo '<div id="isotopeContainer" class="isotope-container">';

				while($row = mysql_fetch_array($ketqua)){
					$tensp = $row['tensp'];
                    $gia = $row['gia'];
                    $hinh = $row['hinh'];
                    $theloai = $row['theloai'];
                    $phobien = $row['phobien'];
                    $thuonghieu = $row['id_hang'];
                    $id = $row['id'];
                    echo '<div class="span3 isotope--target filter--'.$theloai.'" data-price="'.$gia.'" data-popularity="'.$phobien.'"data-brand="'.$thuonghieu.'">
                                <div class="product">
                                    <div class="product-inner">
                                        <div class="product-img">
                                            <div class="picture">
                                                <a href="product.php?id='.$id.'&phanloai=moi"><img width="540" height="374" alt=""
                                                        src="images/dummy/products/'.$hinh.'" /></a>
                                                <div class="img-overlay">
                                                    <a class="btn more btn-danger" href="product.php?id='.$id.'&phanloai=moi">Buy</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="main-titles no-margin">
                                            <h4 class="title">'.$gia.'</h4>
                                            <h5 class="no-margin isotope--title"><a href="product.php?id='.$id.'&phanloai=moi">'.$tensp.'</a></h5>
                                        </div>
                                        <div class="row-fluid hidden-line">
                                            <div class="span6">
                                                <a href="#" class="btn btn-small"><i class="icon-heart"></i></a>
                                                <a href="#" class="btn btn-small"><i class="icon-exchange"></i></a>
                                            </div>
                                            <div class="span6 align-right">
                                                <span class="icon-star stars-clr"></span>
                                                <span class="icon-star stars-clr"></span>
                                                <span class="icon-star stars-clr"></span>
                                                <span class="icon-star stars-clr"></span>
                                                <span class="icon-star"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>';
				}
                echo '</div>';

			}
			
			mysql_close($link);
		}

        function getdetails ($sql){
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $n = mysql_num_rows($ketqua);

            if ($n > 0){
                echo '<div class="row blocks-spacer">';
                while ($row = mysql_fetch_array($ketqua)){
                    $tensp = $row['tensp'];
                    $gia = $row['gia'];
                    $title = $row['title'];
                    $hinh = $row['hinh'];
                    $id =$row['id'];
                    echo '<div class="span5">
                            <div class="product-preview">
                                <div class="picture">
                                    <img src="images/dummy/products/'.$hinh.'" alt="" width="940" height="940"
                                        id="mainPreviewImg" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="span7">
                            <div class="product-title">
                                <h1 class="name">'.$tensp.'</h1>
                                <div class="meta">
                                    <span class="tag">$ '.$gia.'</span>
                                    <span class="stock">
                                        <span class="btn btn-success">In Stock</span>
                                        <span class="btn btn-danger">Out of Stock</span>
                                        <span class="btn btn-warning">Ask for availability</span>
                                    </span>
                                </div>
                            </div>
                            <div class="product-description">
                                <p>'.$title.'</p>
                                <hr />



                                <form action="checkout-step-1.php?action=add" class="form form-inline clearfix" method="POST">
                                    <div class="numbered">
                                        <input type="text" name="quantity['.$id.']" value="1" class="tiny-size" />
                                        <span class="clickable add-one icon-plus-sign-alt"></span>
                                        <span class="clickable remove-one icon-minus-sign-alt"></span>
                                    </div>
                                    <input type="submit" value="Add To Cart" class="btn btn-danger pull-right" />
                                </form>
                                <hr />



                                <div class="share-item push-down-20">
                                    <div class="row-fluid">
                                        <div class="span5">
                                            Share this item with friends:
                                        </div>
                                        <div class="span7">
                                            <div class="social-networks">

                                                <div class="addthis_toolbox addthis_default_style ">
                                                    <a class="addthis_button_facebook_like"
                                                        fb:like:layout="button_count"></a>
                                                    <a class="addthis_button_tweet"></a>
                                                    <a class="addthis_button_pinterest_pinit"></a>
                                                    <a class="addthis_counter addthis_pill_style"></a>
                                                </div>
                                                <script type="text/javascript"
                                                    src="../../../s7.addthis.com/js/300/addthis_widget.js#pubid=xa-517459541beb3977"></script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="store-buttons">
                                    <i class="icon-heart"></i> <a href="#">Add to a wishlist</a> &nbsp;&nbsp; | &nbsp;&nbsp;
                                    <i class="icon-exchange"></i> <a href="#">Add to compare</a> &nbsp;&nbsp; | &nbsp;&nbsp;
                                    <i class="icon-envelope-alt"></i> <a href="#">Email to a friend</a>
                                </div>
                            </div>
                        </div>';
                }
                echo '</div>';
            }
            mysql_close($link);
        }

        function getdetails_nb ($sql){
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $n = mysql_num_rows($ketqua);

            if ($n > 0){
                echo '<div class="row blocks-spacer">';
                while ($row = mysql_fetch_array($ketqua)){
                    $tensp = $row['tensp'];
                    $gia = $row['gia'];
                    $title = $row['title'];
                    $hinh = $row['hinh'];
                    echo '<div class="span5">
                            <div class="product-preview">
                                <div class="picture">
                                    <img src="images/dummy/featured-products/'.$hinh.'" alt="" width="940" height="940"
                                        id="mainPreviewImg" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="span7">
                            <div class="product-title">
                                <h1 class="name">'.$tensp.'</h1>
                                <div class="meta">
                                    <span class="tag">$ '.$gia.'</span>
                                    <span class="stock">
                                        <span class="btn btn-success">In Stock</span>
                                        <span class="btn btn-danger">Out of Stock</span>
                                        <span class="btn btn-warning">Ask for availability</span>
                                    </span>
                                </div>
                            </div>
                            <div class="product-description">
                                <p>'.$title.'</p>
                                <hr />



                                <form action="#" class="form form-inline clearfix">
                                    <div class="numbered">
                                        <input type="text" name="num" value="1" class="tiny-size" />
                                        <span class="clickable add-one icon-plus-sign-alt"></span>
                                        <span class="clickable remove-one icon-minus-sign-alt"></span>
                                    </div>
                                    
                                    <button class="btn btn-danger pull-right"><i class="icon-shopping-cart"></i> &nbsp; Add
                                        To Cart</button>
                                </form>
                                <hr />



                                <div class="share-item push-down-20">
                                    <div class="row-fluid">
                                        <div class="span5">
                                            Share this item with friends:
                                        </div>
                                        <div class="span7">
                                            <div class="social-networks">

                                                <div class="addthis_toolbox addthis_default_style ">
                                                    <a class="addthis_button_facebook_like"
                                                        fb:like:layout="button_count"></a>
                                                    <a class="addthis_button_tweet"></a>
                                                    <a class="addthis_button_pinterest_pinit"></a>
                                                    <a class="addthis_counter addthis_pill_style"></a>
                                                </div>
                                                <script type="text/javascript"
                                                    src="../../../s7.addthis.com/js/300/addthis_widget.js#pubid=xa-517459541beb3977"></script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="store-buttons">
                                    <i class="icon-heart"></i> <a href="#">Add to a wishlist</a> &nbsp;&nbsp; | &nbsp;&nbsp;
                                    <i class="icon-exchange"></i> <a href="#">Add to compare</a> &nbsp;&nbsp; | &nbsp;&nbsp;
                                    <i class="icon-envelope-alt"></i> <a href="#">Email to a friend</a>
                                </div>
                            </div>
                        </div>';
                }
                echo '</div>';
            }
            mysql_close($link);
        }

        function getdetails_pb ($sql){
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $n = mysql_num_rows($ketqua);

            if ($n > 0){
                echo '<div class="row blocks-spacer">';
                while ($row = mysql_fetch_array($ketqua)){
                    $tensp = $row['tensp'];
                    $gia = $row['gia'];
                    $title = $row['title'];
                    $hinh = $row['hinh'];
                    echo '<div class="span5">
                            <div class="product-preview">
                                <div class="picture">
                                    <img src="images/dummy/most-popular-products/'.$hinh.'" alt="" width="940" height="940"
                                        id="mainPreviewImg" />
                                </div>
                            </div>
                        </div>
                        
                        <div class="span7">
                            <div class="product-title">
                                <h1 class="name">'.$tensp.'</h1>
                                <div class="meta">
                                    <span class="tag">$ '.$gia.'</span>
                                    <span class="stock">
                                        <span class="btn btn-success">In Stock</span>
                                        <span class="btn btn-danger">Out of Stock</span>
                                        <span class="btn btn-warning">Ask for availability</span>
                                    </span>
                                </div>
                            </div>
                            <div class="product-description">
                                <p>'.$title.'</p>
                                <hr />



                                <form action="#" class="form form-inline clearfix">
                                    <div class="numbered">
                                        <input type="text" name="num" value="1" class="tiny-size" />
                                        <span class="clickable add-one icon-plus-sign-alt"></span>
                                        <span class="clickable remove-one icon-minus-sign-alt"></span>
                                    </div>
                                    
                                    <button class="btn btn-danger pull-right"><i class="icon-shopping-cart"></i> &nbsp; Add
                                        To Cart</button>
                                </form>
                                <hr />



                                <div class="share-item push-down-20">
                                    <div class="row-fluid">
                                        <div class="span5">
                                            Share this item with friends:
                                        </div>
                                        <div class="span7">
                                            <div class="social-networks">

                                                <div class="addthis_toolbox addthis_default_style ">
                                                    <a class="addthis_button_facebook_like"
                                                        fb:like:layout="button_count"></a>
                                                    <a class="addthis_button_tweet"></a>
                                                    <a class="addthis_button_pinterest_pinit"></a>
                                                    <a class="addthis_counter addthis_pill_style"></a>
                                                </div>
                                                <script type="text/javascript"
                                                    src="../../../s7.addthis.com/js/300/addthis_widget.js#pubid=xa-517459541beb3977"></script>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="store-buttons">
                                    <i class="icon-heart"></i> <a href="#">Add to a wishlist</a> &nbsp;&nbsp; | &nbsp;&nbsp;
                                    <i class="icon-exchange"></i> <a href="#">Add to compare</a> &nbsp;&nbsp; | &nbsp;&nbsp;
                                    <i class="icon-envelope-alt"></i> <a href="#">Email to a friend</a>
                                </div>
                            </div>
                        </div>';
                }
                echo '</div>';
            }
            mysql_close($link);
        }

        function xuatdanhsachtuongtu($sql){
            $link = $this->connect();
			$ketqua = mysql_query($sql, $link);
			$n = mysql_num_rows($ketqua);
			
			if ($n > 0){
                echo '<div class="row popup-products">';

				while($row = mysql_fetch_array($ketqua)){
                    $id = $row['id'];
					$tensp = $row['tensp'];
                    $title = $row['title'];
                    $gia = $row['gia'];
                    $hinh = $row['hinh'];
                    echo '<div class="span3">
                            <div class="product">
                                <div class="product-inner">
                                    <div class="product-img">
                                        <div class="picture">
                                            <a href="product.php"><img src="images/dummy/products/'.$hinh.'" alt=""
                                                    width="540" height="374" /></a>
                                            <div class="img-overlay">
                                                <a href="shop.php" class="btn more btn-primary">More</a>
                                                <a href="product.php?id='.$id.'&phanloai=moi" class="btn buy btn-danger">Buy</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="main-titles no-margin">
                                        <h4 class="title"><span class="striked">1000$</span> <span class="red-clr">'.$gia.'$</span>
                                        </h4>
                                        <h5 class="no-margin">'.$tensp.'</h5>
                                    </div>
                                    <p class="desc">'.$title.'</p>
                                    <p class="center-align stars">
                                        <span class="icon-star stars-clr"></span>
                                        <span class="icon-star stars-clr"></span>
                                        <span class="icon-star stars-clr"></span>
                                        <span class="icon-star stars-clr"></span>
                                        <span class="icon-star"></span>
                                    </p>
                                </div>
                            </div>
                        </div>';
				}
                echo    '</div>';

			}
			
			mysql_close($link);
        }

        function xuatdonhang($sql){
            $link = $this->connect();
            $ketqua = mysql_query($sql, $link);
            $n = mysql_num_rows($ketqua);
            if ($n > 0){
                echo '<table width="891" border="1" align="center">
                        <tr>
                            <th width="65" height="53" scope="col">ID</th>
                            <th width="156" scope="col">Tên người nhận</th>
                            <th width="197" scope="col">Địa chỉ</th>
                            <th width="164" scope="col">Điện thoại</th>
                            <th width="184" scope="col">Ngày tạo</th>
                            <th width="85" scope="col">Inđơn</th>   
                        </tr>';
                while($row = mysql_fetch_array($ketqua)){
                    $id = $row['id'];
                    $name = $row['name'];
                    $phone = $row['phone'];
                    $address = $row['address'];
                    $ngaytao = date('d/m/Y H:i', $row['created_time']);
                    echo '<tr>
                            <td align="center" height="49">'.$id.'</td>
                            <td>'.$name.'</td>
                            <td>'.$address.'</td>
                            <td>'.$phone.'</td>
                            <td>'.$ngaytao.'</td>
                            <td align="center"><a href="inthongke.php?id='.$id.'">IN</a></td>
                        </tr>';
                }
                echo '</table>';
            }else {
                echo "<h3>Không có đơn hàng</h3>";
            }
            mysql_close($link);
        }

        function xuatprofile($sql)
        {
            $link = $this->connect();
			$ketqua = mysql_query($sql, $link);
			$n = mysql_num_rows($ketqua);

            if($n > 0)
            {
                 echo '<div class="row-fluid push-down-20" id="jaka">';
                    while($row = mysql_fetch_array($ketqua))
                    {
                        $tensp = $row['tensp'];
                        $hinh = $row['hinh'];
                        $mota = $row['mota'];
                          echo '
                          <div class = "row"></div>
                          <div class="span4">
                              <a href="#"><img src="images/dummy/post/'.$hinh.'" alt="person" width="550"
                                      height="660" /></a>
                          </div>
                          <div class="span4">
                              <h4><span class="light"></span>'.$tensp.'</h4>
                              <p></p>
                          </div>
                          <div class="span4">
                              <blockquote>
                                  <i class="icon-quote-left icon-5x"></i>
                                  <p>'.$mota.'</p>
                              </blockquote>
                          </div>
                          </div>'

                                ;
                    }
                    echo '</div>';
            }
        }
        function xuatdanhsachsanpham($sql){
			$link = $this->connect();
			$ketqua = mysql_query($sql, $link);
			$n = mysql_num_rows($ketqua);
			if($n > 0){
				echo '<table width="786" border="1" align="center">
						<tr>
						  <td width="60" align="center"><strong>STT</strong></td>
						  <td width="194" align="center"><strong>Tên Sản Phẩm</strong></td>
                          <td width="199" align="center"><strong>Mô Tả</strong></td>
						  <td width="79" align="center"><strong>Giá </strong></td>
                          <td width="79" align="center"><strong>Thương Hiệu </strong></td>
                          <td width="79" align="center"><strong>Thể Loại </strong></td>
                          <td width="79" align="center"><strong>Độ phổ biến</strong></td>
						  <td width="220" align="center"><strong>Hình Ảnh</strong></td>
                          
						</tr>';
				$dem = 1;
				while ($row = mysql_fetch_array($ketqua)){
					$id = $row['id'];
					$tensp = $row['tensp'];
                    $mota = $row['title'];
					$gia = $row['gia'];
					$hinh = $row['hinh'];
                    $thuonghieu = $row['id_hang'];
                    $theloai = $row['theloai'];
                    $phobien = $row['phobien'];
					echo '<tr>
							  <td align="center"><a href ="?id='. $id .'">'. $dem .'</a></td>
							  <td align="center"><a href ="?id='. $id .'">'. $tensp .'</a></td>
                              <td align="center"><a href ="?id='. $id .'">'. $mota .'</a></td>
							  <td align="center"><a href ="?id='. $id .'">'. $gia .'</a></td>
                              <td align="center"><a href ="?id='. $id .'">'. $thuonghieu .'</a></td>
                              <td align="center"><a href ="?id='. $id .'">'. $theloai .'</a></td>
                              <td align="center"><a href ="?id='. $id .'">'. $phobien .'</a></td>
							  <td align="center"><a href ="?id='. $id .'"><img src="images/dummy/products/'. $hinh .'" width="150" height="151" /></a></td>
                            
						  </tr>';
					$dem++;
				}
				echo '</table>';
			}
			mysql_close($link);
		}
        function laycot($sql) {
			$link = $this->connect();
			$ketqua = mysql_query($sql, $link);
			$n = mysql_num_rows($ketqua);
			$kq = '';
			if($n > 0) {
				
				while ($row = mysql_fetch_array($ketqua)){
					$kq = $row[0];
				}
			}
			mysql_close($link);
			return $kq;
		}
		
		function xuattaikhoan($sql){
			$link = $this->connect();
			$ketqua = mysql_query($sql, $link);
			$n = mysql_num_rows($ketqua);
			if($n > 0){
				$dem = 1;
				while ($row = mysql_fetch_array($ketqua)){
					$id = $row['id'];
					$username = $row['username'];
                    $password = $row['password'];
					$email = $row['email'];
					
					echo '<tr>
							  <td height="53" align="center"><a href ="?id='. $id .'">'. $dem .'</a></td>
							  <td><a href ="?id='. $id .'">'. $username .'</a></td>
                              <td><a href ="?id='. $id .'">'. $password .'</a></td>
							  <td><a href ="?id='. $id .'">'. $email .'</a></td>
                            
						  </tr>';
					$dem++;
				}
			}
			mysql_close($link);
		}
	}
?>