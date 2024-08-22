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
if (!isset($payment_datewise_rpt))
	$payment_datewise_rpt = new payment_datewise_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$payment_datewise_rpt;

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
var fpayment_datewiserpt = currentForm = new ew.Form("fpayment_datewiserpt");

// Validate method
fpayment_datewiserpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;
		elm = this.getElements("x_payment_date");
		if (elm && !ew.checkDateDef(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->payment_date->errorMessage()) ?>"))
				return false;
		}

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fpayment_datewiserpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fpayment_datewiserpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fpayment_datewiserpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fpayment_datewiserpt.lists["x_payment_date"] = <?php echo $payment_datewise_rpt->payment_date->Lookup->toClientList() ?>;
fpayment_datewiserpt.lists["x_payment_date"].popupValues = <?php echo json_encode($payment_datewise_rpt->payment_date->SelectionList) ?>;
fpayment_datewiserpt.lists["x_payment_date"].popupOptions = <?php echo JsonEncode($payment_datewise_rpt->payment_date->popupOptions()) ?>;
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
<div id="ew-center" class="<?php echo $payment_datewise_rpt->CenterContentClass ?>">
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
<form name="fpayment_datewiserpt" id="fpayment_datewiserpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fpayment_datewiserpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_payment_date" class="ew-cell form-group">
	<label for="x_payment_date" class="ew-search-caption ew-label"><?php echo $Page->payment_date->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("="); ?><input type="hidden" name="z_payment_date" id="z_payment_date" value="="></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->payment_date->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="payment_datewise" data-field="x_payment_date" id="x_payment_date" name="x_payment_date" placeholder="<?php echo HtmlEncode($Page->payment_date->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->payment_date->AdvancedSearch->SearchValue) ?>"<?php echo $Page->payment_date->editAttributes() ?>>
<?php if (!$payment_datewise_base->payment_date->ReadOnly && !$payment_datewise_base->payment_date->Disabled && !isset($payment_datewise_base->payment_date->EditAttrs["readonly"]) && !isset($payment_datewise_base->payment_date->EditAttrs["disabled"])) { ?>
<script>
ew.createDateTimePicker("fpayment_datewiserpt", "x_payment_date", {"ignoreReadonly":true,"useCurrent":false,"format":0});
</script>
<?php } ?>
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
fpayment_datewiserpt.filterList = <?php echo $Page->getFilterList() ?>;
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
<div id="gmp_payment_datewise" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->transaction_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="transaction_id"><div class="payment_datewise_transaction_id"><span class="ew-table-header-caption"><?php echo $Page->transaction_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="transaction_id">
<?php if ($Page->sortUrl($Page->transaction_id) == "") { ?>
		<div class="ew-table-header-btn payment_datewise_transaction_id">
			<span class="ew-table-header-caption"><?php echo $Page->transaction_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer payment_datewise_transaction_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->transaction_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->transaction_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->transaction_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->transaction_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->order_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="order_id"><div class="payment_datewise_order_id"><span class="ew-table-header-caption"><?php echo $Page->order_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="order_id">
<?php if ($Page->sortUrl($Page->order_id) == "") { ?>
		<div class="ew-table-header-btn payment_datewise_order_id">
			<span class="ew-table-header-caption"><?php echo $Page->order_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer payment_datewise_order_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->order_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->order_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->order_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->order_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->payment_mode->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="payment_mode"><div class="payment_datewise_payment_mode"><span class="ew-table-header-caption"><?php echo $Page->payment_mode->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="payment_mode">
<?php if ($Page->sortUrl($Page->payment_mode) == "") { ?>
		<div class="ew-table-header-btn payment_datewise_payment_mode">
			<span class="ew-table-header-caption"><?php echo $Page->payment_mode->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer payment_datewise_payment_mode" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->payment_mode) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->payment_mode->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->payment_mode->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->payment_mode->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->payment_date->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="payment_date"><div class="payment_datewise_payment_date"><span class="ew-table-header-caption"><?php echo $Page->payment_date->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="payment_date">
<?php if ($Page->sortUrl($Page->payment_date) == "") { ?>
		<div class="ew-table-header-btn payment_datewise_payment_date">
			<span class="ew-table-header-caption"><?php echo $Page->payment_date->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_payment_date', form: 'fpayment_datewiserpt', name: 'payment_datewise_payment_date', range: false, from: '<?php echo $Page->payment_date->RangeFrom; ?>', to: '<?php echo $Page->payment_date->RangeTo; ?>' });" id="x_payment_date<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer payment_datewise_payment_date" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->payment_date) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->payment_date->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->payment_date->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->payment_date->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_payment_date', form: 'fpayment_datewiserpt', name: 'payment_datewise_payment_date', range: false, from: '<?php echo $Page->payment_date->RangeFrom; ?>', to: '<?php echo $Page->payment_date->RangeTo; ?>' });" id="x_payment_date<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->payment_status->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="payment_status"><div class="payment_datewise_payment_status"><span class="ew-table-header-caption"><?php echo $Page->payment_status->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="payment_status">
<?php if ($Page->sortUrl($Page->payment_status) == "") { ?>
		<div class="ew-table-header-btn payment_datewise_payment_status">
			<span class="ew-table-header-caption"><?php echo $Page->payment_status->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer payment_datewise_payment_status" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->payment_status) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->payment_status->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->payment_status->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->payment_status->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
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
<?php if ($Page->transaction_id->Visible) { ?>
		<td data-field="transaction_id"<?php echo $Page->transaction_id->cellAttributes() ?>>
<span<?php echo $Page->transaction_id->viewAttributes() ?>><?php echo $Page->transaction_id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->order_id->Visible) { ?>
		<td data-field="order_id"<?php echo $Page->order_id->cellAttributes() ?>>
<span<?php echo $Page->order_id->viewAttributes() ?>><?php echo $Page->order_id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->payment_mode->Visible) { ?>
		<td data-field="payment_mode"<?php echo $Page->payment_mode->cellAttributes() ?>>
<span<?php echo $Page->payment_mode->viewAttributes() ?>><?php echo $Page->payment_mode->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->payment_date->Visible) { ?>
		<td data-field="payment_date"<?php echo $Page->payment_date->cellAttributes() ?>>
<span<?php echo $Page->payment_date->viewAttributes() ?>><?php echo $Page->payment_date->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->payment_status->Visible) { ?>
		<td data-field="payment_status"<?php echo $Page->payment_status->cellAttributes() ?>>
<span<?php echo $Page->payment_status->viewAttributes() ?>><?php echo $Page->payment_status->getViewValue() ?></span></td>
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
<div id="gmp_payment_datewise" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "payment_datewise_pager.php" ?>
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