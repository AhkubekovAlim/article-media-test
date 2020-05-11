<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
CJSCore::Init(array("fx"));

\Bitrix\Main\UI\Extension::load("ui.bootstrap4");

if (isset($_GET["theme"]) && in_array($_GET["theme"], array("blue", "green", "yellow", "red")))
{
	COption::SetOptionString("main", "wizard_eshop_bootstrap_theme_id", $_GET["theme"], false, SITE_ID);
}
$theme = COption::GetOptionString("main", "wizard_eshop_bootstrap_theme_id", "green", SITE_ID);

$curPage = $APPLICATION->GetCurPage(true);

?><!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">
<head>
	<title><?$APPLICATION->ShowTitle()?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
	<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_DIR?>favicon.ico" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?=SITE_TEMPLATE_PATH?>/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?=SITE_TEMPLATE_PATH?>/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
	<? $APPLICATION->SetAdditionalCSS("/bitrix/css/main/font-awesome.css"); ?>
	<? $APPLICATION->ShowHead(); ?>
    <!-- Begin Verbox {literal} -->
    <script type='text/javascript'>
        (function(d, w, m) {
            window.supportAPIMethod = m;
            var s = d.createElement('script');
            s.type ='text/javascript'; s.id = 'supportScript'; s.charset = 'utf-8';
            s.async = true;
            var id = '0a6c4c01ac6f66b088fb2380a2ba8fa7';
            s.src = 'https://admin.verbox.ru/support/support.js?h='+id;
            var sc = d.getElementsByTagName('script')[0];
            w[m] = w[m] || function() { (w[m].q = w[m].q || []).push(arguments); };
            if (sc) sc.parentNode.insertBefore(s, sc);
            else d.documentElement.firstChild.appendChild(s);
        })(document, window, 'Verbox');
    </script>
    <!-- {/literal} End Verbox -->
</head>
<body class="bx-background-image bx-theme-<?=$theme?>" <?$APPLICATION->ShowProperty("backgroundImage");?>>
<div id="panel"><? $APPLICATION->ShowPanel(); ?></div>
<?$APPLICATION->IncludeComponent(
	"bitrix:eshop.banner",
	"",
	array()
);?>
<div class="bx-wrapper" id="bx_eshop_wrap">
	<header class="bx-header">
		<div class="bx-header-section container">
			<!--region bx-header-->
			<div class="row pt-0 pt-md-3 mb-3 align-items-center" style="position: relative;">
				<div class="d-block d-md-none bx-menu-button-mobile" data-role='bx-menu-button-mobile-position'></div>
				<div class="col-12 col-md-auto bx-header-logo">
					<a class="bx-logo-block d-none d-md-block" href="<?=SITE_DIR?>">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => SITE_DIR."include/company_logo.php"),
							false
						);?>
					</a>
					<a class="bx-logo-block d-block d-md-none text-center" href="<?=SITE_DIR?>">
						<?$APPLICATION->IncludeComponent(
							"bitrix:main.include",
							"",
							array(
								"AREA_FILE_SHOW" => "file",
								"PATH" => SITE_DIR."include/company_logo_mobile.php"
							),
							false
						);?>
					</a>
				</div>

				<div class="col-12 col-sm-auto bx-header-personal">
                    <div class="d-flex align-items-center justify-content-center justify-content-sm-end">
                        <div class="p-lg-3 p-1">
                            <div class="bx-header-worktime">
                                <span class="bx-worktime-title"><?=GetMessage('HEADER_WORK_TIME'); ?></span>
                                <span class="bx-worktime-schedule">
                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        "",
                                        array(
                                            "AREA_FILE_SHOW" => "file",
                                            "PATH" => SITE_DIR."include/schedule.php"
                                        ),
                                        false
                                    );?>
                                </span>
                            </div>
                        </div>
                    </div>
					<?/*$APPLICATION->IncludeComponent(
						"bitrix:sale.basket.basket.line",
						"bootstrap_v4",
						array(
							"PATH_TO_BASKET" => SITE_DIR."personal/cart/",
							"PATH_TO_PERSONAL" => SITE_DIR."personal/",
							"SHOW_PERSONAL_LINK" => "N",
							"SHOW_NUM_PRODUCTS" => "Y",
							"SHOW_TOTAL_PRICE" => "Y",
							"SHOW_PRODUCTS" => "N",
							"POSITION_FIXED" =>"N",
							"SHOW_AUTHOR" => "Y",
							"PATH_TO_REGISTER" => SITE_DIR."login/",
							"PATH_TO_PROFILE" => SITE_DIR."personal/"
						),
						false,
						array()
					);*/?>
				</div>

				<div class="col bx-header-contact">
					<div class="d-flex align-items-center justify-content-center justify-content-sm-start justify-content-md-center">
						<div class="p-lg-3 p-1">
							<div class="bx-header-phone-block">
								<i class="bx-header-phone-icon"></i>
								<span class="bx-header-phone-number">
									<?$APPLICATION->IncludeComponent(
										"bitrix:main.include",
										"",
										array(
											"AREA_FILE_SHOW" => "file",
											"PATH" => SITE_DIR."include/telephone.php"
										),
										false
									);?>
								</span>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--endregion-->

			<!--region menu-->
			<div class="row mb-4 d-none d-md-block">
				<div class="col">
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu",
						"bootstrap_v4",
						array(
							"ROOT_MENU_TYPE" => "top",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_TIME" => "36000000",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"MENU_THEME" => "site",
							"CACHE_SELECTED_ITEMS" => "N",
							"MENU_CACHE_GET_VARS" => array(),
							"MAX_LEVEL" => "3",
							"CHILD_MENU_TYPE" => "left",
							"USE_EXT" => "N",
							"DELAY" => "N",
							"ALLOW_MULTI_SELECT" => "N",
							"COMPONENT_TEMPLATE" => "bootstrap_v4"
						),
						false
					);?>
				</div>
			</div>
			<!--endregion-->

			<!--region search.title -->
			<?/*if ($curPage != SITE_DIR."index.php"):?>
				<div class="row mb-4">
					<div class="col">
						<?$APPLICATION->IncludeComponent(
							"bitrix:search.title",
							"bootstrap_v4",
							array(
								"NUM_CATEGORIES" => "1",
								"TOP_COUNT" => "5",
								"CHECK_DATES" => "N",
								"SHOW_OTHERS" => "N",
								"PAGE" => SITE_DIR."catalog/",
								"CATEGORY_0_TITLE" => GetMessage("SEARCH_GOODS") ,
								"CATEGORY_0" => array(
									0 => "iblock_catalog",
								),
								"CATEGORY_0_iblock_catalog" => array(
									0 => "all",
								),
								"CATEGORY_OTHERS_TITLE" => GetMessage("SEARCH_OTHER"),
								"SHOW_INPUT" => "Y",
								"INPUT_ID" => "title-search-input",
								"CONTAINER_ID" => "search",
								"PRICE_CODE" => array(
									0 => "BASE",
								),
								"SHOW_PREVIEW" => "Y",
								"PREVIEW_WIDTH" => "75",
								"PREVIEW_HEIGHT" => "75",
								"CONVERT_CURRENCY" => "Y"
							),
							false
						);?>
					</div>
				</div>
			<?endif*/?>
			<!--endregion-->

			<!--region breadcrumb-->
			<?if ($curPage != SITE_DIR."index.php"):?>
				<div class="row mb-4">
					<div class="col" id="navigation">
						<?$APPLICATION->IncludeComponent(
							"bitrix:breadcrumb",
							"universal",
							array(
								"START_FROM" => "0",
								"PATH" => "",
								"SITE_ID" => "-"
							),
							false,
							Array('HIDE_ICONS' => 'N')
						);?>
					</div>
				</div>
				<h1 id="pagetitle"><?$APPLICATION->ShowTitle(false);?></h1>
			<?endif?>
			<!--endregion-->
		</div>
	</header>

	<div class="workarea">
		<div class="container bx-content-section">
			<div class="row">
			<?$needSidebar = preg_match("~^".SITE_DIR."(catalog|personal\/cart|personal\/order\/make)/~", $curPage);?>
				<div class="bx-content <?=($needSidebar ? "col" : "col-md-9 col-sm-8")?>">