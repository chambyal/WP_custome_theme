<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
			<meta name="viewport" content="width=device-width, initial-scale=1"/>
			<title>	<?php wp_title("", true); ?></title>
					<!--[if lt IE 9]> 
					<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
					<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>   
					<![endif]-->
			<script> var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";</script>
			<?php if (get_field('favicon', options)) { ?>
			<link rel="shortcut icon" href="<?php the_field('favicon', options); ?>" />
			<?php } ?>
			<?php if (wp_is_mobile() && is_front_page()) {
				include('inc/custom-wp_head.php');
				} else {
				wp_head();
				}
				?>
				

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=G-C6LTPRB042&amp;l=dataLayer&amp;cx=c"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DD93R7CLJ4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DD93R7CLJ4');
</script>		
		
		</head>
		<?php if(get_field('hide_banner')){ ?>
		<body <?php body_class('no-banner'); ?>>
			<?php }  else { ?>
			<body <?php body_class(); ?>>
				<?php } ?>
				<div class="header-search-box">
					<span class="closebtn">X</span>
					<div class="search-input-wrap">
						<form method="get"
    							class="searchform"
    							action="<?php echo esc_url(home_url('/')); ?>">
							<input required class="search"
     								placeholder="Search"
     								type="text"
     								value=""
     								name="s">
								<button type="submit"
      									id="site-searchs">
									<img src="<?php echo get_stylesheet_directory_uri() ?>/img/search-open.png"
   										alt="serach"
   										class="st-icon" />
								</button>
							</form>
						</div>
					</div>
					<header id="header">
								
						<div class="header-phone-mobile">
										<?php $header_phone = get_field('header_phone', 'options');
											?>
										<a href="tel:<?php echo preg_replace('/\D+/', '', $header_phone); ?>">
										<img src="<?php echo get_stylesheet_directory_uri();?>/img/phone.svg"												alt="phone"/> <?php echo $header_phone; ?>
										</a>
										
										
										<div class="footersocial ml-0 mt2">
													
									<?php
										$facebook = get_field('facebook', 'options');
										$twitter = get_field('twitter', 'options');
										$linkedin = get_field('linkedin', 'options');
										$you_tube = get_field('you_tube', 'options');
										$instagram = get_field('instagram', 'options');
										$pinterest = get_field('pinterest', 'options');
									?>
									<ul>
										<?php if ($instagram) { ?>
										<li>
											<a target="_blank"
												href="<?php echo $instagram ?>">
												<em class="fa fa-instagram"></em>
											</a>
										</li>
										<?php } ?>
										<?php if ($linkedin) { ?>
										<li>
											<a target="_blank"
												href="<?php echo $linkedin ?>">
												<em class="fa fa-linkedin"></em>
											</a>
										</li>
										<?php } ?>
										<?php if ($facebook) { ?>
										<li>
											<a target="_blank"
												href="<?php echo $facebook; ?>">
												<em class="fa fa-facebook"></em>
											</a>
										</li>
										<?php } ?>
										<?php if ($twitter) { ?>
										<li>
											<a target="_blank"
												href="<?php echo $twitter; ?>">
												<em class="fa fa-twitter"></em>
											</a>
										</li>
										<?php } ?>
										<?php if ($you_tube) { ?>
										<li>
											<a target="_blank"
												href="<?php echo $you_tube; ?>">
												<em class="fa fa-youtube-play"></em>
											</a>
										</li>
										<?php } ?>
										<?php if ($pinterest) { ?>
										<li>
											<a target="_blank"
												href="<?php echo $pinterest ?>">
												<em class="fa fa-pinterest"></em>  
											</a>
										</li>
										<?php } ?>
									</ul>
									</div>
										
										
										
									</div>
					
					
					
						<div class=" container-fluid h-100">
							<div class="row wrap-header align-items-center  h-100">
								<div class="top-logo col-md-3">
									<?php if (get_field('header_logo', options)) { ?>
									<a href="<?php echo site_url(); ?>">
										<img src="<?php the_field('header_logo', options); ?>" alt="logo">  </a>
										<?php } ?>
									</div>
									<div class="menu-phone col-md-9 text-right">
										<div class="menu-header">
											<?php if(!wp_is_mobile()) { ?>
											<?php wp_nav_menu(array(
												'menu' => 'Main Menu', 
												'theme_location' => '__no_such_location',
												'menu_id' => 'mainNav',
												'menu_class' => 'menu-top',
												'container' => '',
												'fallback_cb' => false 
												));
												?>
											<?php } ?>
											<!-- Mobile Menu-->
											<div class="menu-wrap d-lg-none d-xl-none">
												<div class="menu-full-wrapper">
													<div class="menu-sidebar">
														<?php wp_nav_menu(array(
															'menu' => 'Main Menu', 
															'theme_location' => '__no_such_location',
															'menu_id' => 'top-nav',
															'menu_class' => 'menu-bar-wrapper',
															'container' => '',
															'fallback_cb' => false
															));
															?>
													</div>
												</div>
											</div>
											<!-- Mobile Menu End-->
											<div class="search-bar"
   												id="search-icon-bar">
												<div class="search-icon">
													<img src="<?php bloginfo('template_url'); ?>/img/search-open.png"
   														alt="search icon" />
												</div>

						      <?php if(!wp_is_mobile()) { ?>	



							<div class="footersocial ml-0 mt2">
													
									<?php
										$facebook = get_field('facebook', 'options');
										$twitter = get_field('twitter', 'options');
										$linkedin = get_field('linkedin', 'options');
										$you_tube = get_field('you_tube', 'options');
										$instagram = get_field('instagram', 'options');
										$pinterest = get_field('pinterest', 'options');
									?>
									<ul>
										<?php if ($instagram) { ?>
										<li>
											<a target="_blank"
												href="<?php echo $instagram ?>">
												<em class="fa fa-instagram"></em>
											</a>
										</li>
										<?php } ?>
										<?php if ($linkedin) { ?>
										<li>
											<a target="_blank"
												href="<?php echo $linkedin ?>">
												<em class="fa fa-linkedin"></em>
											</a>
										</li>
										<?php } ?>
										<?php if ($facebook) { ?>
										<li>
											<a target="_blank"
												href="<?php echo $facebook; ?>">
												<em class="fa fa-facebook"></em>
											</a>
										</li>
										<?php } ?>
										<?php if ($twitter) { ?>
										<li>
											<a target="_blank"
												href="<?php echo $twitter; ?>">
												<em class="fa fa-twitter"></em>
											</a>
										</li>
										<?php } ?>
										<?php if ($you_tube) { ?>
										<li>
											<a target="_blank"
												href="<?php echo $you_tube; ?>">
												<em class="fa fa-youtube-play"></em>
											</a>
										</li>
										<?php } ?>
										<?php if ($pinterest) { ?>
										<li>
											<a target="_blank"
												href="<?php echo $pinterest ?>">
												<em class="fa fa-pinterest"></em>  
											</a>
										</li>
										<?php } ?>
									</ul>
									</div>
							  
									
									<?php
									$header_phone = get_field('header_phone', options);
									$headerphone = preg_replace("/[^0-9]/", "", $header_phone); 
									?>
														 <a class="headerphone" href="tel:<?php echo $headerphone; ?>">
														<img class="headerphone-icon" src="<?php echo get_stylesheet_directory_uri()?>/img/phone.svg" alt="phone"/>  
														 <span class="casefree d-block">FREE case CONSULTATION</span>
														 <?php echo $header_phone; ?>
														 </a>
														 
														 <?php } ?>
												
												<div class="menu-button d-lg-none d-xl-none">
													<div class="menu-bar menu-bar-top"></div>
													<div class="menu-bar menu-bar-middle"></div>
													<div class="menu-bar menu-bar-bottom"></div>
												</div>
												
												
												
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</header>
						<div id="container-wrap">