<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
        <meta content="<?=$meta_deskripsi;?>" name="description">
		<meta content="<?=$meta_keyword;?>" name="keywords">
		<meta content="<?=$author;?>" name="author">
		<meta name="robots" content="all">

		<meta property="og:site_name" content="<?=$situs;?>">
		<meta property="og:title" content="">
		<meta property="og:description" content="<?=$deskripsi_web;?>">
		<meta property="og:type" content="website">
		<meta property="og:image" content="<?=$situs;?>">
		<meta property="og:url" content="<?=$website;?>">
		<meta name="google-site-verification" content="5gR7PiH3CV8Hvf8IV6FMIVKxzY4kn-47E3DxvDYp2xA" />
		<meta name="msvalidate.01" content="62CD313456FFC4EA37F7C4F9B408864B" />

        <!-- Favicon -->
		<link rel="shortcut icon" href="<?=base_url('files/media/'.$favicon);?>">
       <title><?php if(!empty($slogan)){echo character_limiter(ucwords($title).' - '.$slogan,70);}else{echo $title;}?></title>

        <!-- Bootstrap Core CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/frontend/css/bootstrap.min.css');?>">
		<?php 
		    if(isset($cssprofile)){
		    echo $cssprofile;
		    }
		?>
        <!-- Customizable CSS -->
        <link rel="stylesheet" href="<?=base_url('assets/global/css/components.css');?>" >
		<link rel="stylesheet" href="<?=base_url('assets/global/css/plugins.css');?>" >
		<link rel="stylesheet" href="<?=base_url('assets/global/plugins/fancybox/jquery.fancybox.css');?>" media="screen" />
		<link rel="stylesheet" href="<?=base_url('assets/frontend/css/style.css');?>">
        <link rel="stylesheet" href="<?=base_url('assets/frontend/css/colors/'.$tema.'.css');?>">
        <link rel="stylesheet" href="<?=base_url('assets/frontend/css/owl.carousel.css');?>">
        <link rel="stylesheet" href="<?=base_url('assets/frontend/css/owl.transitions.css');?>">
        <link rel="stylesheet" href="<?=base_url('assets/frontend/css/animate.min.css');?>">
		<?php 
		    if(isset($css)){
		    echo $css;
		    }
		?>
			
        <!-- Fonts -->
        <!--link href='//fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800' rel='stylesheet' type='text/css'-->

        <!-- Icons/Glyphs -->
        <link rel="stylesheet" href="<?=base_url('assets/frontend/css/font-awesome.min.css');?>">
        <?php if (isset($javascript_header)){echo $javascript_header;}?>
        <!-- Facebook Pixel Code -->
        <script>
          !function(f,b,e,v,n,t,s)
          {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
          n.callMethod.apply(n,arguments):n.queue.push(arguments)};
          if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
          n.queue=[];t=b.createElement(e);t.async=!0;
          t.src=v;s=b.getElementsByTagName(e)[0];
          s.parentNode.insertBefore(t,s)}(window, document,'script',
          'https://connect.facebook.net/en_US/fbevents.js');
          fbq('init', '595621960928797');
          fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
          src="https://www.facebook.com/tr?id=595621960928797&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Facebook Pixel Code -->
    </head>

    <body>
        <div class="wrapper">
            <?php include_once(APPPATH.'views/top-menu.php');?>
            <!-- ============================================================= HEADER ============================================================= -->
            <header  class="no-padding-bottom header-alt">
                <div class="container no-padding">
                    <div class="col-xs-12 col-md-3 logo-holder">
                        <!-- ============================================================= LOGO ============================================================= -->
                        <div class="logo">
                            <a href="<?=site_url();?>">
                            <img alt="logo" src="<?=base_url('files/media/'.$logo.'');?>" />
                            </a>
                        </div><!-- /.logo -->
                        <!-- ============================================================= LOGO : END ============================================================= -->
                    </div><!-- /.logo-holder -->

                    <div class="col-xs-12 col-md-6 top-search-holder no-margin">
                        <div class="contact-row">
                            <div class="phone inline">
                                <i class="fa fa-phone"></i> <?=$telp;?>
                            </div>
                            <div class="contact inline">
                                <i class="fa fa-envelope"></i> <span class="le-color"><?=$email;?></span>
                            </div>
                        </div><!-- /.contact-row -->
                        <!-- ============================================================= SEARCH AREA ============================================================= -->
                        <div class="search-area">
							<?=form_open('search');?>
                                <div class="control-group">
                                    <input class="search-field" name="keyproduct" placeholder="Search for item" />
                                	<a class="search-button" href="<?=site_url('search');?>"></a>
                                </div>
                            </form>
                        </div><!-- /.search-area -->
                        <!-- ============================================================= SEARCH AREA : END ============================================================= -->
                    </div><!-- /.top-search-holder -->

                    <div class="col-xs-12 col-md-3 top-cart-row no-margin">
                        <div class="top-cart-row-container">
                            <!--div class="wishlist-compare-holder">
                                <div class="wishlist ">
                                    <a href="#"><i class="fa fa-heart"></i> wishlist <span class="value">(21)</span> </a>
                                </div>
                                <div class="compare">
                                    <a href="#"><i class="fa fa-exchange"></i> compare <span class="value">(2)</span> </a>
                                </div>
                            </div-->
                            <!-- ============================================================= SHOPPING CART DROPDOWN ============================================================= -->
                            <div class="top-cart-holder dropdown animate-dropdown">
                                <div class="basket">

                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                        <div class="basket-item-count">
                                            <span class="count"><?=$this->cart->total_items();?></span>
                                            <img src="<?=base_url('assets/frontend/images/icon-cart.png');?>" alt="" />
                                        </div>

                                        <div class="total-price-basket">
                                            <span class="lbl">your cart:</span>
                                            <span class="total-price">
                                                <span class="sign"></span><span class="value"><?=convertrp($this->cart->total());?></span>
                                            </span>
                                        </div>
                                    </a>

                                    <ul class="dropdown-menu">
										<?php $i = 1;?>
										<?php foreach ($this->cart->contents() as $items):
										$kategori =slug($items['kategori']);
										?>
										<?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
                                        <li>
                                            <div class="basket-item">
                                                <div class="row">
                                                    <div class="col-xs-4 col-sm-4 no-margin text-center">
                                                        <div class="thumb">
                                                            <img alt="<?=$items['name'];?>" src="<?=base_url('files/thumbnail/'.$items['image'].'');?>" style="width:73px;height:73px" />
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-8 col-sm-8 no-margin">
                                                        <div class="title"><?=$items['name'];?></div>
                                                        <div class="price"><?=convertrp($items['subtotal']);?></div>
                                                    </div>
                                                </div>
												<a id="id" onclick="deletecart('<?=$items['rowid'];?>')" class="close-btn">&nbsp;</a>
                                            </div>
                                        </li>
										<?php $i++; ?>	
										<?php endforeach; ?>
                                        <li class="checkout">
                                            <div class="basket-item">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a href="<?=site_url('shopping-cart');?>" class="le-button inverse">View cart</a>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6">
                                                        <a href="<?=site_url('checkout');?>" class="le-button">Checkout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                    </ul>
                                </div><!-- /.basket -->
                            </div><!-- /.top-cart-holder -->
                        </div><!-- /.top-cart-row-container -->
                        <!-- ============================================================= SHOPPING CART DROPDOWN : END ============================================================= -->
                    </div><!-- /.top-cart-row -->
                </div><!-- /.container -->
				
				<!-- ========================================= NAVIGATION ========================================= -->
                <nav id="top-megamenu-nav" class="megamenu-vertical animate-dropdown">
                    <div class="container">
                        <div class="yamm navbar">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mc-horizontal-menu-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div><!-- /.navbar-header -->
                            <div class="collapse navbar-collapse" id="mc-horizontal-menu-collapse">
                                <ul class="nav navbar-nav">
                                    <li>
										<a href="<?=site_url();?>"><i class="fa fa-home"></i> <span class="title">Home</span></a>
									</li>
									<?php 
									$menulib= new menu_lib();
									$query= $menulib->getSidebarMenu();
									foreach ($query->result_array() as $menu) : 
									$menu_id=$menu['id_menu'];
									$child_satu = $menulib->getMenuChild($menu_id);
									if($child_satu->num_rows() == 0){ ?>
									<li>
										<a href="<?=$menu['opsi'].''.$menu['url'];?>"><?=$menu['nama_menu'];?></a>
									</li>
									<?php }else{ ?>
									
                                    <li class="dropdown yamm-fw">
                                        <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><?=ucwords($menu['nama_menu']);?></a>
                                        <?php if($menulib->getMenuChild($menu_id)) : ?>
										<ul class="dropdown-menu">
                                           <?php 
											$child_dua = $menulib->getMenuChild($menu_id);
											?> 
											<li>
												<div class="yamm-content">
                                                    <div class="row">
                                                       	<?php foreach ($child_satu->result_array() as $child1) :
														$menu_id2=$child1['id_menu'];
														$child_dua = $menulib->getMenuChild($menu_id2);?>
														<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
                                                            <h2><a href="#"><?=ucwords($child1['nama_menu']);?></a></h2>
															<ul>
																<?php 
																$child_dua = $menulib->getMenuChild($menu_id2);
																foreach ($child_dua->result_array() as $child2) :
																?>
																<li><a href="<?=$child2['opsi'].''.$child2['url'];?>"><?=ucwords($child2['nama_menu']);?></a></li>
																<?php endforeach;?>
				                                            </ul>
														</div><!-- /.col -->
														<?php endforeach;?>
												    </div><!-- /.row -->
                                                </div><!-- /.yamm-content -->
											</li>
											
										</ul>
										<?php endif;?>
                                    </li>
									<?php } endforeach;?>
								</ul><!-- /.navbar-nav -->
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.navbar -->
                    </div><!-- /.container -->
                </nav><!-- /.megamenu-vertical -->
                <!-- ========================================= NAVIGATION : END ========================================= -->
			</header>