<?php
namespace PHPReportMaker12\project2;

// Session
if (session_status() !== PHP_SESSION_ACTIVE)
	session_start(); // Init session data

// Output buffering
ob_start();

// Autoload
include_once "rautoload.php";
?>
<?php

// Create page object
if (!isset($order_sales_rpt))
	$order_sales_rpt = new order_sales_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$order_sales_rpt;

// Run the page
$Page->run();

// Setup login status
SetClientVar("login", LoginStatus());
if (!$DashboardReport)
	WriteHeader(FALSE);

// Global Page Rendering event (in rusrfn*.php)
Page_Rendering();

// Page Rendering event
$Page->Page_Render();
?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rheader.php" ?>
<?php } ?>
<?php if ($Page->Export == "" || $Page->Export == "print") { ?>
<script>
currentPageID = ew.PAGE_ID = "rpt"; // Page ID
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Form object
var forder_salesrpt = currentForm = new ew.Form("forder_salesrpt");

// Validate method
forder_salesrpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
forder_salesrpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
forder_salesrpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
forder_salesrpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
forder_salesrpt.lists["x_Year"] = <?php echo $order_sales_rpt->Year->Lookup->toClientList() ?>;
forder_salesrpt.lists["x_Year"].popupValues = <?php echo json_encode($order_sales_rpt->Year->SelectionList) ?>;
forder_salesrpt.lists["x_Year"].popupOptions = <?php echo JsonEncode($order_sales_rpt->Year->popupOptions()) ?>;
forder_salesrpt.lists["x_Year"].options = <?php echo JsonEncode($order_sales_rpt->Year->lookupOptions()) ?>;
forder_salesrpt.lists["x_Month"] = <?php echo $order_sales_rpt->Month->Lookup->toClientList() ?>;
forder_salesrpt.lists["x_Month"].popupValues = <?php echo json_encode($order_sales_rpt->Month->SelectionList) ?>;
forder_salesrpt.lists["x_Month"].popupOptions = <?php echo JsonEncode($order_sales_rpt->Month->popupOptions()) ?>;
forder_salesrpt.lists["x_Month"].options = <?php echo JsonEncode($order_sales_rpt->Month->lookupOptions()) ?>;
</script>
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your client script here, no need to add script tags.
</script>
<?php } ?>
<a id="top"></a>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Content Container -->
<div id="ew-container" class="container-fluid ew-container">
<?php } ?>
<?php if (ReportParam("showfilter") === TRUE) { ?>
<?php $Page->showFilterList(TRUE) ?>
<?php } ?>
<div class="btn-toolbar ew-toolbar">
<?php
if (!$Page->DrillDownInPanel) {
	$Page->ExportOptions->render("body");
	$Page->SearchOptions->render("body");
	$Page->FilterOptions->render("body");
	$Page->GenerateOptions->render("body");
}
?>
</div>
<?php $Page->showPageHeader(); ?>
<?php $Page->showMessage(); ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<div class="row">
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
<!-- Center Container - Report -->
<div id="ew-center" class="<?php echo $order_sales_rpt->CenterContentClass ?>">
<?php } ?>
<!-- Summary Report begins -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="report_summary">
<?php } ?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<!-- Search form (begin) -->
<?php

	// Render search row
	$Page->resetAttributes();
	$Page->RowType = ROWTYPE_SEARCH;
	$Page->renderRow();
?>
<form name="forder_salesrpt" id="forder_salesrpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="forder_salesrpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_Year" class="ew-cell form-group">
	<label for="x_Year" class="ew-search-caption ew-label"><?php echo $Page->Year->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="order_sales" data-field="x_Year" data-value-separator="<?php echo $Page->Year->displayValueSeparatorAttribute() ?>" id="x_Year" name="x_Year"<?php echo $Page->Year->editAttributes() ?>>
		<?php echo $Page->Year->selectOptionListHtml("x_Year") ?>
	</select>
</div>
<?php echo $Page->Year->Lookup->getParamTag("p_x_Year") ?>
</span>
</div>
</div>
<div id="r_2" class="ew-row d-sm-flex">
<div id="c_Month" class="ew-cell form-group">
	<label for="x_Month" class="ew-search-caption ew-label"><?php echo $Page->Month->caption() ?></label>
	<span class="ew-search-field">
<div class="input-group">
	<select class="custom-select ew-custom-select" data-table="order_sales" data-field="x_Month" data-value-separator="<?php echo $Page->Month->displayValueSeparatorAttribute() ?>" id="x_Month" name="x_Month"<?php echo $Page->Month->editAttributes() ?>>
		<?php echo $Page->Month->selectOptionListHtml("x_Month") ?>
	</select>
</div>
<?php echo $Page->Month->Lookup->getParamTag("p_x_Month") ?>
</span>
</div>
</div>
<div class="ew-row d-sm-flex">
<button type="submit" name="btn-submit" id="btn-submit" class="btn btn-primary"><?php echo $ReportLanguage->phrase("Search") ?></button>
<button type="reset" name="btn-reset" id="btn-reset" class="btn hide"><?php echo $ReportLanguage->phrase("Reset") ?></button>
</div>
</div>
</form>
<script>
forder_salesrpt.filterList = <?php echo $Page->getFilterList() ?>;
</script>
<!-- Search form (end) -->
<?php } ?>
<?php if ($Page->ShowCurrentFilter) { ?>
<?php $Page->showFilterList() ?>
<?php } ?>
<?php

// Set the last group to display if not export all
if ($Page->ExportAll && $Page->Export <> "") {
	$Page->StopGroup = $Page->TotalGroups;
} else {
	$Page->StopGroup = $Page->StartGroup + $Page->DisplayGroups - 1;
}

// Stop group <= total number of groups
if (intval($Page->StopGroup) > intval($Page->TotalGroups))
	$Page->StopGroup = $Page->TotalGroups;
$Page->RecordCount = 0;
$Page->RecordIndex = 0;

// Get first row
if ($Page->TotalGroups > 0) {
	$Page->loadRowValues(TRUE);
	$Page->GroupCount = 1;
}
$Page->GroupIndexes = InitArray(2, -1);
$Page->GroupIndexes[0] = -1;
$Page->GroupIndexes[1] = $Page->StopGroup - $Page->StartGroup + 1;
while ($Page->Recordset && !$Page->Recordset->EOF && $Page->GroupCount <= $Page->DisplayGroups || $Page->ShowHeader) {

	// Show dummy header for custom template
	// Show header

	if ($Page->ShowHeader) {
?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_order_sales" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->Year->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Year"><div class="order_sales_Year"><span class="ew-table-header-caption"><?php echo $Page->Year->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Year">
<?php if ($Page->sortUrl($Page->Year) == "") { ?>
		<div class="ew-table-header-btn order_sales_Year">
			<span class="ew-table-header-caption"><?php echo $Page->Year->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_Year', form: 'forder_salesrpt', name: 'order_sales_Year', range: false, from: '<?php echo $Page->Year->RangeFrom; ?>', to: '<?php echo $Page->Year->RangeTo; ?>' });" id="x_Year<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer order_sales_Year" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Year) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Year->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Year->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Year->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_Year', form: 'forder_salesrpt', name: 'order_sales_Year', range: false, from: '<?php echo $Page->Year->RangeFrom; ?>', to: '<?php echo $Page->Year->RangeTo; ?>' });" id="x_Year<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Month->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Month"><div class="order_sales_Month"><span class="ew-table-header-caption"><?php echo $Page->Month->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Month">
<?php if ($Page->sortUrl($Page->Month) == "") { ?>
		<div class="ew-table-header-btn order_sales_Month">
			<span class="ew-table-header-caption"><?php echo $Page->Month->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_Month', form: 'forder_salesrpt', name: 'order_sales_Month', range: false, from: '<?php echo $Page->Month->RangeFrom; ?>', to: '<?php echo $Page->Month->RangeTo; ?>' });" id="x_Month<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer order_sales_Month" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Month) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Month->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Month->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Month->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_Month', form: 'forder_salesrpt', name: 'order_sales_Month', range: false, from: '<?php echo $Page->Month->RangeFrom; ?>', to: '<?php echo $Page->Month->RangeTo; ?>' });" id="x_Month<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->Total_Sales->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Total_Sales"><div class="order_sales_Total_Sales"><span class="ew-table-header-caption"><?php echo $Page->Total_Sales->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Total_Sales">
<?php if ($Page->sortUrl($Page->Total_Sales) == "") { ?>
		<div class="ew-table-header-btn order_sales_Total_Sales">
			<span class="ew-table-header-caption"><?php echo $Page->Total_Sales->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer order_sales_Total_Sales" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Total_Sales) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Total_Sales->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Total_Sales->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Total_Sales->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
	</tr>
</thead>
<tbody>
<?php
		if ($Page->TotalGroups == 0) break; // Show header only
		$Page->ShowHeader = FALSE;
	}
	$Page->RecordCount++;
	$Page->RecordIndex++;
?>
<?php

		// Render detail row
		$Page->resetAttributes();
		$Page->RowType = ROWTYPE_DETAIL;
		$Page->renderRow();
?>
	<tr<?php echo $Page->rowAttributes(); ?>>
<?php if ($Page->Year->Visible) { ?>
		<td data-field="Year"<?php echo $Page->Year->cellAttributes() ?>>
<span<?php echo $Page->Year->viewAttributes() ?>><?php echo $Page->Year->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Month->Visible) { ?>
		<td data-field="Month"<?php echo $Page->Month->cellAttributes() ?>>
<span<?php echo $Page->Month->viewAttributes() ?>><?php echo $Page->Month->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->Total_Sales->Visible) { ?>
		<td data-field="Total_Sales"<?php echo $Page->Total_Sales->cellAttributes() ?>>
<span<?php echo $Page->Total_Sales->viewAttributes() ?>><?php echo $Page->Total_Sales->getViewValue() ?></span></td>
<?php } ?>
	</tr>
<?php

		// Accumulate page summary
		$Page->accumulateSummary();

		// Get next record
		$Page->loadRowValues();
	$Page->GroupCount++;
} // End while
?>
<?php if ($Page->TotalGroups > 0) { ?>
</tbody>
<tfoot>
	</tfoot>
<?php } elseif (!$Page->ShowHeader && TRUE) { // No header displayed ?>
<?php if ($Page->Export <> "pdf") { ?>
<?php if ($Page->Export == "word" || $Page->Export == "excel") { ?>
<div class="ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } else { ?>
<div class="card ew-card ew-grid"<?php echo $Page->ReportTableStyle ?>>
<?php } ?>
<?php } ?>
<!-- Report grid (begin) -->
<?php if ($Page->Export <> "pdf") { ?>
<div id="gmp_order_sales" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<?php } ?>
<?php if ($Page->TotalGroups > 0 || TRUE) { // Show footer ?>
</table>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php if ($Page->Export == "" && !($Page->DrillDown && $Page->TotalGroups > 0)) { ?>
<div class="card-footer ew-grid-lower-panel">
<?php include "order_sales_pager.php" ?>
<div class="clearfix"></div>
</div>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<?php } ?>
<?php if ($Page->Export <> "pdf") { ?>
</div>
<?php } ?>
<!-- Summary Report Ends -->
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /#ew-center -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.row -->
<?php } ?>
<?php if ($Page->Export == "" && !$DashboardReport) { ?>
</div>
<!-- /.ew-container -->
<?php } ?>
<?php
$Page->showPageFooter();
if (DEBUG_ENABLED)
	echo GetDebugMessage();
?>
<?php

// Close recordsets
if ($Page->GroupRecordset)
	$Page->GroupRecordset->Close();
if ($Page->Recordset)
	$Page->Recordset->Close();
?>
<?php if ($Page->Export == "" && !$Page->DrillDown && !$DashboardReport) { ?>
<script>

// Write your table-specific startup script here
// console.log("page loaded");

</script>
<?php } ?>
<?php if (!$DashboardReport) { ?>
<?php include_once "rfooter.php" ?>
<?php } ?>
<?php
$Page->terminate();
if (isset($OldPage))
	$Page = $OldPage;
?>