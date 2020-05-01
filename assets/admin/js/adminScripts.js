$(function () {
	var add_order = $("#btn_add_order");
	var assignOrder = $("#assignOrderBtn");
	var getWriterDetails = $("#viewWriter");
	var reasignOrder = $("#reasignOrderBtn");
	var setOnRevision = $("#revisionOrderBtn");
	var deleteOrder = $("#deleteOrderBtn");
	var finishOrder = $("#finishOrderBtn");
	var disputeOrder = $("#disputeOrderBtn");
	var generateInvoice = $("#generateInvoice");
	var payInvoice = $("#payInvoices");
	var saveFilesBtn = $("#saveFiles");
	var update_order = $("#btn_update_order");

	var base_url = "http://localhost/curtsy_writing/";
	var add_order_url = base_url + "admin/add_order";
	var update_order_url = base_url + "admin/update_order";
	var assignOrderUrl = base_url + "admin/assign";
	var createInvoiceUrl = base_url + "admin/createInvoice";
	var getWriterInfoUrl = base_url + "admin/getWriter/";
	var payInvoiceUrl = base_url + "admin/payInvoice/";
	var msg_holder = $("#msg_holder");

	update_order.click(function () {
		let orderSources,
			spacing_holder,
			format_holder,
			orderDateDeadline,
			orderTimeDeadline,
			orderPrice,
			orderPages,
			orderInstructions,
			oid;

		oid = $("#oId").val();
		orderSources = $("#sources").val();
		spacing_holder = $("#spacing").find("option:selected").text();
		format_holder = $("#format").find("option:selected").text();
		orderDateDeadline = $("#date_deadline").val();
		orderTimeDeadline = $("#time_date").val();
		orderPrice = $("#price").val();
		orderPages = $("#pages").val();
		orderInstructions = $("#instructions").val();

		var formData = new FormData();
		formData.append("id", oid);
		formData.append("sources", orderSources);
		formData.append("spacing", spacing_holder);
		formData.append("format", format_holder);
		formData.append("date_deadline", orderDateDeadline);
		formData.append("time_deadline", orderTimeDeadline);
		formData.append("price", orderPrice);
		formData.append("pages", orderPages);
		formData.append("instructions", orderInstructions);

		console.log(formData);

		doAjax(update_order_url, formData);
	});

	saveFilesBtn.click(function () {
		var fileInput = $("#file_input")[0];
		var orderId = $("#orderId").val();
		var url = base_url + "admin/uploadOrderFiles";

		if (fileInput.files.length > 0) {
			var formData = new FormData();
			formData.append("order", orderId);
			$.each(fileInput.files, function (k, file) {
				formData.append("files[]", file);
			});

			doAjax(url, formData, filesMsg);
		} else {
			showNotification("top", "right", "warning", `No Files Selected`);
		}
	});

	getWriterDetails.click(function () {
		var frm = new FormData();
		var url = getWriterInfoUrl + writer;
		var writer = $("#writerId").val();
		frm.append("request", "writerInfo");
		frm.append("writer", writer);

		doAjax(url, frm);
	});

	add_order.click(function () {
		var orderTitle,
			orderSources,
			spacing_holder,
			format_holder,
			orderDateDeadline,
			orderTimeDeadline,
			orderPages,
			orderInstructions;
		orderTitle = $("#title").val();
		orderSources = $("#sources").val();
		spacing_holder = $("#spacing").find("option:selected").text();
		format_holder = $("#format").find("option:selected").text();
		level = $("#level").find("option:selected").text();
		orderDateDeadline = $("#date_deadline").val();
		orderTimeDeadline = $("#time_date").val();
		orderPages = $("#pages").val();
		orderInstructions = $("#instructions").val();

		if (
			orderTitle == "" ||
			sources == "" ||
			pages == "" ||
			instructions == ""
		) {
			showNotification(
				"top",
				"right",
				"warning",
				`One or More fields are empty`
			);
			return;
		} else {
			var formData = new FormData();
			formData.append("title", orderTitle);
			formData.append("sources", orderSources);
			formData.append("spacing", spacing_holder);
			formData.append("level", level);
			formData.append("format", format_holder);
			formData.append("date_deadline", orderDateDeadline);
			formData.append("time_deadline", orderTimeDeadline);
			formData.append("pages", orderPages);
			formData.append("instructions", orderInstructions);

			doAjax(add_order_url, formData);
		}
	});

	assignOrder.click(function () {
		var order = $("#oId").val();
		var writer = $("#selectedWriter").find("option:selected").val();
		var url = assignOrderUrl + "/" + order + "/" + writer;
		var req = new FormData();
		req.append("request", "assign");

		doAjax(url, req);
	});

	generateInvoice.click(function () {
		var totals = $("#totals").text();
		var writer = $("#writer_id").val();
		var totalOrders = $("#total_orders").text();

		var url = createInvoiceUrl + "/" + writer;

		var req = new FormData();
		req.append("writer", writer);
		req.append("totals", totals);
		req.append("totalOrders", totalOrders);
		req.append("request", "createInvoice");

		doAjax(url, req);
	});

	payInvoice.click(function () {
		var invoice = $("#invoiceId").val();
		var writer = $("#writer_id").val();

		var url = payInvoiceUrl + writer + "/" + invoice;

		var req = new FormData();
		req.append("request", "pay");
		req.append("invoiceId", invoice);
		doAjax(url, req);
	});

	reasignOrder.click(function () {
		var order = $("#oId").val();
		var url = base_url + "admin/reasign/" + order;
		var req = new FormData();
		req.append("request", "reasign");
		doAjax(url, req);
	});

	setOnRevision.click(function () {
		var order = $("#oId").val();
		var url = base_url + "admin/setOnRevision/" + order;
		var req = new FormData();
		req.append("request", "revision");
		doAjax(url, req);
	});

	deleteOrder.click(function () {
		var order = $("#oId").val();
		var url = base_url + "admin/deleteOrder/" + order;
		var req = new FormData();
		req.append("request", "delete");

		var retVal = confirm("Do you want to delete the order?");
		if (retVal == true) {
			doAjax(url, req);
			return true;
		} else {
			showNotification("top", "right", "info", `Delete Action was Cancelled`);
			return false;
		}
	});

	finishOrder.click(function () {
		var order = $("#oId").val();
		var url = base_url + "admin/finishOrder/" + order;
		var req = new FormData();
		req.append("request", "finish");
		doAjax(url, req);
	});

	disputeOrder.click(function () {
		var order = $("#oId").val();
		var url = base_url + "admin/setOnDispute/" + order;
		var req = new FormData();
		req.append("request", "dispute");

		var retVal = confirm("Do you want to dispute the order?");
		if (retVal == true) {
			doAjax(url, req);
			return true;
		} else {
			showNotification("top", "right", "info", `Dispute Action was Cancelled`);
			return false;
		}
	});

	function showNotification(from, align, type, message) {
		// type = ["", "info", "danger", "success", "warning", "rose", "primary"];
		// color = Math.floor(Math.random() * 6 + 1);
		$.notify(
			{
				icon: "add_alert",
				message: message,
			},
			{
				type: type,
				timer: 3000,
				placement: {
					from: from,
					align: align,
				},
			}
		);
	}

	function doAjax(url, formData) {
		$.ajax({
			url: url,
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			method: "POST",

			success: function (response) {
				// you will get response from your php page (what you echo or print)
				showNotification("top", "right", "success", `${response}`);
				msg_holder.html(`${response}`);
				setTimeout(function () {
					window.location.reload(true);
				}, 3000);
			},
			error: function (jqXHR, textStatus, errorThrown) {
				showNotification("top", "right", "warning", `${jqXHR.responseText}`);
				msg_holder.html(
					`<p class="red white-text p-2"><small>${jqXHR.responseText}</small></p>`
				);

				setTimeout(function () {
					window.location.reload(true);
				}, 3000);
			},
		});
	}
});

(function ($) {
	$.fn.leanModal = function (options) {
		if ($(".modal").length > 0) {
			$(".modal").modal(options);
		}
	};

	$.fn.openModal = function (options) {
		$(this).modal(options);
		$(this).modal("open");
	};

	$.fn.closeModal = function () {
		$(this).modal("close");
	};
})(jQuery);
