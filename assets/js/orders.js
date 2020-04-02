$(function() {
	let base_url = "<?php echo base_url()?>";
	let add_order = $("#btn_add_order");
	let assignOrderBtn = $("#assignOrderBtn");
	let getWriterDetails = $("#viewWriter");
	let reasignOrderBtn = $("#reasignOrderBtn");
	let setOnRevision = $("#revisionOrderBtn");
	let deleteOrderBtn = $("#deleteOrderBtn");
	let finishOrder = $("#finishOrderBtn");
	let disputeOrder = $("#disputeOrderBtn");
	let generateInvoice = $("#generateInvoice");
	let payInvoice = $("#payInvoices");
	let saveFilesBtn = $("#saveFiles");

	//assign buttons to functions
	//assignOrderBtn.addEventListener("click", assignOrder);
	assignOrderBtn.addEventListener("click", reasignOrder);
	// reasignOrderBtn.click("click", function() {
	// 	alert("Working");
	// });

	//Functions
	function createOrder() {}
	function deleteOrder() {}
	function getAllOrders() {}
	function getOrderDetails() {}
	function setOrderStatus() {}

	function reasignOrder() {
		alert("Working");
		return;

		let order = $("#oId").val();
		let url = base_url + "admin/reasign/" + order;
		let req = new FormData();
		req.append("request", "reasign");
		doAjax(url, req, "Successfully Reasigned the Order");
	}
	function assignOrder() {
		let assignOrderUrl = base_url + "admin/assign";
		let order = $("#oId").val();
		let writer = $("#selectedWriter")
			.find("option:selected")
			.val();
		let url = assignOrderUrl + "/" + order + "/" + writer;
		let req = new FormData();
		req.append("request", "assign");
		doAjax(url, req, "Successfully Assigned the Order");
	}

	function showNotification(from, align, type, message) {
		// type = ["", "info", "danger", "success", "warning", "rose", "primary"];
		// color = Math.floor(Math.random() * 6 + 1);

		$.notify(
			{
				icon: "add_alert",
				message: message
			},
			{
				type: type,
				timer: 3000,
				placement: {
					from: from,
					align: align
				}
			}
		);
	}

	function doAjax(url, formData, successMessage) {
		$.ajax({
			url: url,
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			method: "POST",

			success: function(response) {
				// you will get response from your php page (what you echo or print)
				showNotification("top", "right", "success", successMessage);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				showNotification("top", "right", "warning", "Action Failed");
			}
		});
	}
});
