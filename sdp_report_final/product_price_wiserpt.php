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
if (!isset($product_price_wise_rpt))
	$product_price_wise_rpt = new product_price_wise_rpt();
if (isset($Page))
	$OldPage = $Page;
$Page = &$product_price_wise_rpt;

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
var fproduct_price_wiserpt = currentForm = new ew.Form("fproduct_price_wiserpt");

// Validate method
fproduct_price_wiserpt.validate = function() {
	if (!this.validateRequired)
		return true; // Ignore validation
	var $ = jQuery, fobj = this.getForm(), $fobj = $(fobj), elm;
		elm = this.getElements("x_price");
		if (elm && !ew.checkInteger(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->price->errorMessage()) ?>"))
				return false;
		}
		elm = this.getElements("y_price");
		if (elm && !ew.checkInteger(elm.value)) {
			if (!this.onError(elm, "<?php echo JsEncode($Page->price->errorMessage()) ?>"))
				return false;
		}

	// Call Form Custom Validate event
	if (!this.Form_CustomValidate(fobj))
		return false;
	return true;
}

// Form_CustomValidate method
fproduct_price_wiserpt.Form_CustomValidate = function(fobj) { // DO NOT CHANGE THIS LINE!

	// Your custom validation code here, return false if invalid.
	return true;
}
<?php if (CLIENT_VALIDATE) { ?>
fproduct_price_wiserpt.validateRequired = true; // Uses JavaScript validation
<?php } else { ?>
fproduct_price_wiserpt.validateRequired = false; // No JavaScript validation
<?php } ?>

// Use Ajax
fproduct_price_wiserpt.lists["x_price"] = <?php echo $product_price_wise_rpt->price->Lookup->toClientList() ?>;
fproduct_price_wiserpt.lists["x_price"].popupValues = <?php echo json_encode($product_price_wise_rpt->price->SelectionList) ?>;
fproduct_price_wiserpt.lists["x_price"].popupOptions = <?php echo JsonEncode($product_price_wise_rpt->price->popupOptions()) ?>;
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
<div id="ew-center" class="<?php echo $product_price_wise_rpt->CenterContentClass ?>">
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
<form name="fproduct_price_wiserpt" id="fproduct_price_wiserpt" class="form-inline ew-form ew-ext-filter-form" action="<?php echo CurrentPageName() ?>">
<?php $searchPanelClass = ($Page->Filter <> "") ? " show" : " show"; ?>
<div id="fproduct_price_wiserpt-search-panel" class="ew-search-panel collapse<?php echo $searchPanelClass ?>">
<input type="hidden" name="cmd" value="search">
<div id="r_1" class="ew-row d-sm-flex">
<div id="c_price" class="ew-cell form-group">
	<label for="x_price" class="ew-search-caption ew-label"><?php echo $Page->price->caption() ?></label>
	<span class="ew-search-operator"><?php echo $ReportLanguage->phrase("BETWEEN"); ?><input type="hidden" name="z_price" id="z_price" value="BETWEEN"></span>
	<span class="control-group ew-search-field">
<?php PrependClass($Page->price->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="product_price_wise" data-field="x_price" id="x_price" name="x_price" size="30" placeholder="<?php echo HtmlEncode($Page->price->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->price->AdvancedSearch->SearchValue) ?>"<?php echo $Page->price->editAttributes() ?>>
</span>
	<span class="ew-search-cond btw1_price"><label><?php echo $ReportLanguage->Phrase("AND") ?></label></span>
	<span class="ew-search-field btw1_price">
<?php PrependClass($Page->price->EditAttrs["class"], "form-control"); // PR8 ?>
<input type="text" data-table="product_price_wise" data-field="x_price" id="y_price" name="y_price" size="30" placeholder="<?php echo HtmlEncode($Page->price->getPlaceHolder()) ?>" value="<?php echo HtmlEncode($Page->price->AdvancedSearch->SearchValue2) ?>"<?php echo $Page->price->editAttributes() ?>>
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
fproduct_price_wiserpt.filterList = <?php echo $Page->getFilterList() ?>;
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
<div id="gmp_product_price_wise" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
<?php } ?>
<table class="<?php echo $Page->ReportTableClass ?>">
<thead>
	<!-- Table header -->
	<tr class="ew-table-header">
<?php if ($Page->Product_id->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="Product_id"><div class="product_price_wise_Product_id"><span class="ew-table-header-caption"><?php echo $Page->Product_id->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="Product_id">
<?php if ($Page->sortUrl($Page->Product_id) == "") { ?>
		<div class="ew-table-header-btn product_price_wise_Product_id">
			<span class="ew-table-header-caption"><?php echo $Page->Product_id->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_price_wise_Product_id" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->Product_id) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->Product_id->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->Product_id->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->Product_id->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->grp->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="grp"><div class="product_price_wise_grp"><span class="ew-table-header-caption"><?php echo $Page->grp->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="grp">
<?php if ($Page->sortUrl($Page->grp) == "") { ?>
		<div class="ew-table-header-btn product_price_wise_grp">
			<span class="ew-table-header-caption"><?php echo $Page->grp->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_price_wise_grp" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->grp) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->grp->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->grp->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->grp->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->product_name->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="product_name"><div class="product_price_wise_product_name"><span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="product_name">
<?php if ($Page->sortUrl($Page->product_name) == "") { ?>
		<div class="ew-table-header-btn product_price_wise_product_name">
			<span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_price_wise_product_name" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->product_name) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->product_name->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->product_name->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->product_name->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->product_type->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="product_type"><div class="product_price_wise_product_type"><span class="ew-table-header-caption"><?php echo $Page->product_type->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="product_type">
<?php if ($Page->sortUrl($Page->product_type) == "") { ?>
		<div class="ew-table-header-btn product_price_wise_product_type">
			<span class="ew-table-header-caption"><?php echo $Page->product_type->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_price_wise_product_type" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->product_type) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->product_type->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->product_type->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->product_type->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->size->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="size"><div class="product_price_wise_size"><span class="ew-table-header-caption"><?php echo $Page->size->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="size">
<?php if ($Page->sortUrl($Page->size) == "") { ?>
		<div class="ew-table-header-btn product_price_wise_size">
			<span class="ew-table-header-caption"><?php echo $Page->size->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_price_wise_size" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->size) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->size->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->size->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->size->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->quantity->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="quantity"><div class="product_price_wise_quantity"><span class="ew-table-header-caption"><?php echo $Page->quantity->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="quantity">
<?php if ($Page->sortUrl($Page->quantity) == "") { ?>
		<div class="ew-table-header-btn product_price_wise_quantity">
			<span class="ew-table-header-caption"><?php echo $Page->quantity->caption() ?></span>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_price_wise_quantity" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->quantity) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->quantity->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->quantity->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->quantity->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
		</div>
<?php } ?>
	</td>
<?php } ?>
<?php } ?>
<?php if ($Page->price->Visible) { ?>
<?php if ($Page->Export <> "" || $Page->DrillDown) { ?>
	<td data-field="price"><div class="product_price_wise_price"><span class="ew-table-header-caption"><?php echo $Page->price->caption() ?></span></div></td>
<?php } else { ?>
	<td data-field="price">
<?php if ($Page->sortUrl($Page->price) == "") { ?>
		<div class="ew-table-header-btn product_price_wise_price">
			<span class="ew-table-header-caption"><?php echo $Page->price->caption() ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_price', form: 'fproduct_price_wiserpt', name: 'product_price_wise_price', range: true, from: '<?php echo $Page->price->RangeFrom; ?>', to: '<?php echo $Page->price->RangeTo; ?>' });" id="x_price<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
		</div>
<?php } else { ?>
		<div class="ew-table-header-btn ew-pointer product_price_wise_price" onclick="ew.sort(event,'<?php echo $Page->sortUrl($Page->price) ?>',0);">
			<span class="ew-table-header-caption"><?php echo $Page->price->caption() ?></span>
			<span class="ew-table-header-sort"><?php if ($Page->price->getSort() == "ASC") { ?><i class="fa fa-sort-up"></i><?php } elseif ($Page->price->getSort() == "DESC") { ?><i class="fa fa-sort-down"></i><?php } ?></span>
	<?php if (!$DashboardReport) { ?>
			<a class="ew-table-header-popup" title="<?php echo $ReportLanguage->phrase("Filter"); ?>" onclick="ew.showPopup.call(this, event, { id: 'x_price', form: 'fproduct_price_wiserpt', name: 'product_price_wise_price', range: true, from: '<?php echo $Page->price->RangeFrom; ?>', to: '<?php echo $Page->price->RangeTo; ?>' });" id="x_price<?php echo $Page->Counts[0][0]; ?>"><span class="icon-filter"></span></a>
	<?php } ?>
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
<?php if ($Page->Product_id->Visible) { ?>
		<td data-field="Product_id"<?php echo $Page->Product_id->cellAttributes() ?>>
<span<?php echo $Page->Product_id->viewAttributes() ?>><?php echo $Page->Product_id->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->grp->Visible) { ?>
		<td data-field="grp"<?php echo $Page->grp->cellAttributes() ?>>
<span<?php echo $Page->grp->viewAttributes() ?>><?php echo $Page->grp->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->product_name->Visible) { ?>
		<td data-field="product_name"<?php echo $Page->product_name->cellAttributes() ?>>
<span<?php echo $Page->product_name->viewAttributes() ?>><?php echo $Page->product_name->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->product_type->Visible) { ?>
		<td data-field="product_type"<?php echo $Page->product_type->cellAttributes() ?>>
<span<?php echo $Page->product_type->viewAttributes() ?>><?php echo $Page->product_type->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->size->Visible) { ?>
		<td data-field="size"<?php echo $Page->size->cellAttributes() ?>>
<span<?php echo $Page->size->viewAttributes() ?>><?php echo $Page->size->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->quantity->Visible) { ?>
		<td data-field="quantity"<?php echo $Page->quantity->cellAttributes() ?>>
<span<?php echo $Page->quantity->viewAttributes() ?>><?php echo $Page->quantity->getViewValue() ?></span></td>
<?php } ?>
<?php if ($Page->price->Visible) { ?>
		<td data-field="price"<?php echo $Page->price->cellAttributes() ?>>
<span<?php echo $Page->price->viewAttributes() ?>><?php echo $Page->price->getViewValue() ?></span></td>
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
<div id="gmp_product_price_wise" class="<?php if (IsResponsiveLayout()) { echo "table-responsive "; } ?>ew-grid-middle-panel">
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
<?php include "product_price_wise_pager.php" ?>
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