<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Широкоформатная печать");
?><div class="wideprint-poster-bg-wrapper">
	<div class="container wideprint-poster-wrapper">
		<div class="row">
			<div class="col-lg-offset-1 col-lg-10 col-md-offset-0 col-md-12 wideprint-poster-column">
				<h1 class="wideprint-poster-title">
					<?$APPLICATION->IncludeFile(
						SITE_TEMPLATE_PATH."/include/wideprint/wideprint_title.php",
						array(),
						array("MODE"=>"text")
					);?>
				</h1>
			</div>
			<div class="col-lg-offset-1 col-lg-10 col-md-offset-0 col-md-12">
				<div class="wideprint-printer-image">
					<?$APPLICATION->IncludeFile(
						SITE_TEMPLATE_PATH."/include/wideprint/wideprint_poster.php",
						array(),
						array("MODE"=>"html")
					);?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="wideprint-character-bg-wrapper">
	<div class="container character-wrapper">
		<div class="row">
			<div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10 character-item-wrapper">
				<div class="character-item">
					<div class="character-bg-img character-bg-img-1">
						 &nbsp;
					</div>
					<div class="character-item-text-wrapper">
						<div class="character-item-text">
							<?$APPLICATION->IncludeFile(
								SITE_TEMPLATE_PATH."/include/wideprint/character-item-text1.php",
								array(),
								array("MODE"=>"text")
							);?>
						</div>
					</div>
					<div class="character-item-text-description">
						<?$APPLICATION->IncludeFile(
							SITE_TEMPLATE_PATH."/include/wideprint/character-item-text-description1.php",
							array(),
							array("MODE"=>"text")
						);?>
					</div>
				</div>
			</div>
			<div class="col-lg-offset-0 col-lg-4 col-md-offset-0 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10 character-item-wrapper">
				<div class="character-item">
					<div class="character-bg-img character-bg-img-2">
						 &nbsp;
					</div>
					<div class="character-item-text-wrapper">
						<div class="character-item-text">
							<?$APPLICATION->IncludeFile(
								SITE_TEMPLATE_PATH."/include/wideprint/character-item-text2.php",
								array(),
								array("MODE"=>"text")
							);?>
						</div>
					</div>
					<div class="character-item-text-description">
						<?$APPLICATION->IncludeFile(
							SITE_TEMPLATE_PATH."/include/wideprint/character-item-text-description2.php",
							array(),
							array("MODE"=>"text")
						);?>
					</div>
				</div>
			</div>
			<div class="col-lg-offset-0 col-lg-4 col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6 col-xs-offset-1 col-xs-10 character-item-wrapper">
				<div class="character-item">
					<div class="character-bg-img character-bg-img-3">
						 &nbsp;
					</div>
					<div class="character-item-text-wrapper">
						<div class="character-item-text">
							<?$APPLICATION->IncludeFile(
								SITE_TEMPLATE_PATH."/include/wideprint/character-item-text3.php",
								array(),
								array("MODE"=>"text")
							);?>
						</div>
					</div>
					<div class="character-item-text-description">
						<?$APPLICATION->IncludeFile(
							SITE_TEMPLATE_PATH."/include/wideprint/character-item-text-description3.php",
							array(),
							array("MODE"=>"text")
						);?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="wideprint-price-bg-wrapper">
	<div class="container wideprint-price-wrapper">
		<div class="row">
			<h2 class="price-title col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
				<?$APPLICATION->IncludeFile(
					SITE_TEMPLATE_PATH."/include/wideprint/wideprint-price-title.php",
					array(),
					array("MODE"=>"text")
				);?>
			</h2>
 			<span class="price-description col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10 col-sm-offset-1 col-sm-10 col-xs-offset-1 col-xs-10">
				<?$APPLICATION->IncludeFile(
					SITE_TEMPLATE_PATH."/include/wideprint/wideprint-price-description.php",
					array(),
					array("MODE"=>"text")
				);?>
			</span>
			<div class="price-item-wrapper col-lg-offset-1 col-lg-10 col-md-offset-0 col-md-12">
				<div class="row">
					<div class="price-item-box col-lg-4 col-md-6 col-sm-6 col-xs-12">
 					<span class="price-item">
						<span class="price-item-text">
							<?$APPLICATION->IncludeFile(
								SITE_TEMPLATE_PATH."/include/wideprint/price-item-text1.php",
								array(),
								array("MODE"=>"html")
							);?>
						</span>
						<span class="price-item-cost">
							<?$APPLICATION->IncludeFile(
								SITE_TEMPLATE_PATH."/include/wideprint/price-item-cost1.php",
								array(),
								array("MODE"=>"text")
							);?>
						</span>
					</span>
					</div>
					<div class="price-item-box col-lg-4 col-md-6 col-sm-6 col-xs-12">
 						<span class="price-item">
							<span class="price-item-text">
								<?$APPLICATION->IncludeFile(
									SITE_TEMPLATE_PATH."/include/wideprint/price-item-text2.php",
									array(),
									array("MODE"=>"html")
								);?>
							</span>
							<span class="price-item-cost">
								<?$APPLICATION->IncludeFile(
									SITE_TEMPLATE_PATH."/include/wideprint/price-item-cost2.php",
									array(),
									array("MODE"=>"text")
								);?>
							</span>
						</span>
					</div>
					<div class="price-item-box col-lg-4 col-md-12 col-sm-12 col-xs-12">
 						<span class="price-item price-item-selected">
							<span class="price-item-text price-selected">
								<?$APPLICATION->IncludeFile(
									SITE_TEMPLATE_PATH."/include/wideprint/price-item-text3.php",
									array(),
									array("MODE"=>"html")
								);?>
							</span>
							<span class="price-item-cost price-selected">
								<?$APPLICATION->IncludeFile(
									SITE_TEMPLATE_PATH."/include/wideprint/price-item-cost3.php",
									array(),
									array("MODE"=>"text")
								);?>
							</span>
							<div class="arrow-left"></div>
							<span class="price-billboard">
								<span class="price-billboard-text">
									<?$APPLICATION->IncludeFile(
										SITE_TEMPLATE_PATH."/include/wideprint/price-billboard-text.php",
										array(),
										array("MODE"=>"text")
									);?>
								</span>
							</span>
						</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="wideprint-slider-bg-wrapper">
	<?
	$APPLICATION->IncludeComponent(
		'arteast:wfprintslider',
		'',
		[]
		, $component);
	?>
	<span class="wideprint-slider-prev"></span>
	<span class="wideprint-slider-next"></span>
</div>
<div class="wideprint-perfect-work-bg-wrapper">
	<div class="container wideprint-perfect-work-wrapper">
		<div class="row">
			<h2 class="col-lg-offset-2 col-lg-8 col-md-offset-1 col-md-10 col-sm-offset-0 col-sm-12 perfect-work-title ">
				<?$APPLICATION->IncludeFile(
					SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-title.php",
					array(),
					array("MODE"=>"text")
				);?>
			</h2>
		</div>
		<div class="row">
			<div class="col-lg-offset-0 col-lg-6 col-md-offset-0 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12 perfect-work-box">
 				<span class="perfect-work-item-border-right">
					<span class="perfect-work-item perfect-work-item-bg-img1">
						<div class="perfect-work-image">
							<?$APPLICATION->IncludeFile(
								SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-image1.php",
								array(),
								array("MODE"=>"html")
							);?>
						</div>
						<span class="perfect-work-item-all-text-wrapper">
							<span class="perfect-work-item-text">
								<span class="perfect-work-item-text-inner">
									<?$APPLICATION->IncludeFile(
										SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-text1.php",
										array(),
										array("MODE"=>"text")
									);?>
								</span>
							</span>
							<span class="perfect-work-item-text-description">
								<?$APPLICATION->IncludeFile(
									SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-description1.php",
									array(),
									array("MODE"=>"text")
								);?>
							</span>
						</span>
					</span>
				</span>
			</div>
			<div class="col-lg-offset-0 col-lg-6 col-md-offset-0 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12 perfect-work-box">
				 <span class="perfect-work-item-border-left">
					 <span class="perfect-work-item perfect-work-item-bg-img2">
						 <div class="perfect-work-image">
							 <?$APPLICATION->IncludeFile(
								 SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-image2.php",
								 array(),
								 array("MODE"=>"html")
							 );?>
						 </div>
						 <span class="perfect-work-item-all-text-wrapper">
							 <span class="perfect-work-item-text">
								 <span class="perfect-work-item-text-inner">
									 <?$APPLICATION->IncludeFile(
										 SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-text2.php",
										 array(),
										 array("MODE"=>"text")
									 );?>
								 </span>
							 </span>
							 <span class="perfect-work-item-text-description">
								 <?$APPLICATION->IncludeFile(
									 SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-description2.php",
									 array(),
									 array("MODE"=>"text")
								 );?>
							 </span>
						 </span>
					 </span>
				 </span>
			</div>
			<div class="col-lg-offset-0 col-lg-6 col-md-offset-0 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12 perfect-work-box">
				 <span class="perfect-work-item-border-right">
					 <span class="perfect-work-item perfect-work-item-bg-img3">
						 <div class="perfect-work-image">
							 <?$APPLICATION->IncludeFile(
								 SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-image3.php",
								 array(),
								 array("MODE"=>"html")
							 );?>
						 </div>
						 <span class="perfect-work-item-all-text-wrapper">
							 <span class="perfect-work-item-text">
								 <span class="perfect-work-item-text-inner">
									 <span class="perfect-work-item-text-inner">
										 <?$APPLICATION->IncludeFile(
											 SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-text3.php",
											 array(),
											 array("MODE"=>"text")
										 );?>
								 	</span>
								 </span>
							 </span>
							 <span class="perfect-work-item-text-description">
								  <?$APPLICATION->IncludeFile(
									  SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-description3.php",
									  array(),
									  array("MODE"=>"text")
								  );?>
							 </span>
						 </span>
					 </span>
				 </span>
			</div>
			<div class="col-lg-offset-0 col-lg-6 col-md-offset-0 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12 perfect-work-box">
				 <span class="perfect-work-item-border-left">
					 <span class="perfect-work-item perfect-work-item-bg-img4">
						  <div class="perfect-work-image">
							  <?$APPLICATION->IncludeFile(
								  SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-image4.php",
								  array(),
								  array("MODE"=>"html")
							  );?>
						  </div>
						 <span class="perfect-work-item-all-text-wrapper">
							 <span class="perfect-work-item-text">
								 <span class="perfect-work-item-text-inner">
									 <?$APPLICATION->IncludeFile(
										 SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-text4.php",
										 array(),
										 array("MODE"=>"text")
									 );?>
								 </span>
							 </span>
							 <span class="perfect-work-item-text-description">
								 <?$APPLICATION->IncludeFile(
									 SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-description4.php",
									 array(),
									 array("MODE"=>"text")
								 );?>
							 </span>
						 </span>
					 </span>
				 </span>
			</div>
			<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-2 col-sm-8 col-xs-offset-0 col-xs-12 perfect-work-box">
				 <span class="perfect-work-item-border-bottom">
					 <span class="perfect-work-item perfect-work-item-last perfect-work-item-bg-img5">
						 <div class="perfect-work-image">
							 <?$APPLICATION->IncludeFile(
								 SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-image5.php",
								 array(),
								 array("MODE"=>"html")
							 );?>
						 </div>
						 <span class="perfect-work-item-all-text-wrapper">
							 <span class="perfect-work-item-text">
								 <span class="perfect-work-item-text-inner">
									 <?$APPLICATION->IncludeFile(
										 SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-text5.php",
										 array(),
										 array("MODE"=>"text")
									 );?>
								 </span>
							 </span>
							 <span class="perfect-work-item-text-description">
								 <?$APPLICATION->IncludeFile(
									 SITE_TEMPLATE_PATH."/include/wideprint/wideprint-perfect-description5.php",
									 array(),
									 array("MODE"=>"text")
								 );?>
							 </span>
						 </span>
					 </span>
				 </span>
			</div>
		</div>
	</div>
</div>
<div class="wideprint-callback-form-bg-wrapper">
	<div class="container wideprint-callback-form-wrapper">
		<div class="row">
			<h2 class="col-lg-offset-2 col-lg-8 col-md-offeset-0 col-md-12 wideprint-callback-form-title">
				<?$APPLICATION->IncludeFile(
					SITE_TEMPLATE_PATH."/include/wideprint/wideprint-callback-title.php",
					array(),
					array("MODE"=>"text")
				);?>
			</h2>
			 <span class="col-lg-offset-1 col-lg-10 col-md-offeset-0 col-md-12 wideprint-callback-form-description">
				 <?$APPLICATION->IncludeFile(
					 SITE_TEMPLATE_PATH."/include/wideprint/wideprint-callback-description.php",
					 array(),
					 array("MODE"=>"text")
				 );?>
			 </span>
		</div>
		<div class="row">
			<form action="" class="col-xs-12 wideprint-callback-form">
				<div class="row">
					 <span class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wideprint-callback-input-wrapper">
						 <input type="text" name="wideprint_callback_name" class="wideprint-callback-name" placeholder="Имя*" value="">
						 <input type="tel" name="wideprint_callback_phone" id="wideprint-callback-phone" class="wideprint-callback-phone" placeholder="Телефон*" value="">
					 </span>
					<span class="col-lg-6 col-md-12 col-sm-12 col-xs-12 wideprint-callback-submit-wrapper">
						<span class="wideprint-callback-submit" onclick="main.CallSuccess(this)">получить консультацию</span>
					</span>
					<span id="wideprintCallText" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"></span>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="wideprint-yellow-line"></div>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>