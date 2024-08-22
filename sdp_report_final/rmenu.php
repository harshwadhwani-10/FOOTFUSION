<?php
namespace PHPReportMaker12\project2;
?>
<?php
namespace PHPReportMaker12\project2;

// Menu Language
if ($Language && $Language->LanguageFolder == $LANGUAGE_FOLDER)
	$MenuLanguage = &$Language;
else
	$MenuLanguage = new Language();

// Navbar menu
$topMenu = new Menu("navbar", TRUE, TRUE);
echo $topMenu->toScript();

// Sidebar menu
$sideMenu = new Menu("menu", TRUE, FALSE);
$sideMenu->addMenuItem(3, "mi_category_wise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("3", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "category_wiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(9, "mi_offer_status_wise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("9", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "offer_status_wiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(10, "mi_order_date_wise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("10", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "order_date_wiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(11, "mi_order_sales", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("11", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "order_salesrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(15, "mi_payment_datewise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("15", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "payment_datewiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(16, "mi_payment_mode_wise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("16", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "payment_mode_wiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(18, "mi_product_group_wise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("18", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "product_group_wiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(19, "mi_product_namewise_report", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("19", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "product_namewise_reportrpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(20, "mi_product_order_wise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("20", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "product_order_wiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(21, "mi_product_price_wise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("21", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "product_price_wiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(22, "mi_product_status_wise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("22", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "product_status_wiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
$sideMenu->addMenuItem(23, "mi_product_wise", $ReportLanguage->phrase("SimpleReportMenuItemPrefix") . $ReportLanguage->menuPhrase("23", "MenuText") . $ReportLanguage->phrase("SimpleReportMenuItemSuffix"), "product_wiserpt.php", -1, "", TRUE, FALSE, FALSE, "", "", FALSE);
echo $sideMenu->toScript();
?>