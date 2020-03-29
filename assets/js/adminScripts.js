$(function() {
	$(".sidenav").sidenav();
	$(".tabs").tabs();
	$(".modal").modal();
	$(".datepicker").datepicker();
	$(".timepicker").timepicker();
	$("select").formSelect();
	$(".fixed-action-btn").floatingActionButton();
	$(".tooltipped").tooltip();


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

	var base_url = "http://localhost/curtsy_writing/";
	var add_order_url = base_url + "admin/add_order";
	var assignOrderUrl = base_url + "admin/assign";
	var createInvoiceUrl = base_url + "admin/createInvoice";
	var getWriterInfoUrl = base_url + "admin/getWriter/";
	var payInvoiceUrl = base_url + "admin/payInvoice/";
	var msg_holder = $("#writer_message");

	saveFilesBtn.click(function(){
		var fileInput = $("#file_input")[0];
		var orderId = $("#orderId").val();
		var url = base_url + "admin/uploadOrderFiles";

		if(fileInput.files.length > 0){
			var formData = new FormData();
			formData.append("order", orderId);
			$.each(fileInput.files, function(k, file){
				formData.append("files[]", file);
			});

			
			doAjax(url, formData, filesMsg);
		}else{
			console.log("No files Selected");
		}
	});

	getWriterDetails.click(function() {
		var frm = new FormData();
		var writer = $("#writerId").val();

		frm.append("request", "writerInfo");
		$.ajax({
			url: getWriterInfoUrl + writer,
			data: frm,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			method: "POST",

			success: function(response, status, xhr) {
				// you will get response from your php page (what you echo or print)
				var data = JSON.parse(response);
				$("#writerIdInput").append("Profile for : " + data.name);
				$("#writerInfo").append(`
                    <tr>
                        <td>${data.id}</td>
                        <td>${data.name}</td>
                        <td>${data.email}</td>
                        <td>${data.number}</td>
                        <td>${data.status}</td>
                    </tr>
                `);

				//$("#view_writer").classList.add(".open");
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown);
			}
		});
	});

	$("#getWriterDetails").leanModal();

	add_order.click(function() {
		var orderTitle,
			orderSubject,
			orderSources,
			spacing_holder,
			format_holder,
			orderDateDeadline,
			orderTimeDeadline,
			orderPrice,
			orderPages,
			orderInstructions;
		orderTitle = $("#title").val();
		orderSubject = $("#subject").val();
		orderSources = $("#sources").val();
		spacing_holder = $("#spacing")
			.find("option:selected")
			.text();
		format_holder = $("#format")
			.find("option:selected")
			.text();
		level = $("#level")
			.find("option:selected")
			.text();
		orderDateDeadline = $("#date_deadline").val();
		orderTimeDeadline = $("#time_date").val();
		orderPrice = $("#price").val();
		orderPages = $("#pages").val();
		orderInstructions = $("#instructions").val();

		var msg_holder = $("#order_message");
		var order_message;

		if (
			orderTitle == "" ||
			subject == "" ||
			sources == "" ||
			price == "" ||
			pages == "" ||
			instructions == ""
		) {
			order_message = "One or more fields are Empty!";
			msg_holder.html(`<p class="red white-text p-2">${order_message}</p>`);
			return;
		} else {
			var formData = new FormData();
			formData.append("title", orderTitle);
			formData.append("subject", orderSubject);
			formData.append("sources", orderSources);
			formData.append("spacing", spacing_holder);
			formData.append("level", level);
			formData.append("format", format_holder);
			formData.append("date_deadline", orderDateDeadline);
			formData.append("time_deadline", orderTimeDeadline);
			formData.append("price", orderPrice);
			formData.append("pages", orderPages);
			formData.append("instructions", orderInstructions);

			console.log("title: " + orderTitle);

			$.ajax({
				url: add_order_url,
				data: formData,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				method: "POST",

				success: function(response) {
					// you will get response from your php page (what you echo or print)
					console.log(response);
					order_message = "Order Successfully Added!";
					msg_holder.html(
						`<p class="green white-text p-2">${order_message}</p>`
					);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					order_message = "Order Not Added! : " + jqXHR.responseText;
					msg_holder.html(`<p class="red white-text p-2">${order_message}</p>`);
					console.log(textStatus, errorThrown);
				}
			});
		}
	});

	assignOrder.click(function() {
		var order = $("#oId").val();
		var writer = $("#selectedWriter")
			.find("option:selected")
			.val();
		var url = assignOrderUrl + "/" + order + "/" + writer;
		var req = new FormData();
		req.append("request", "assign");

		doAjax(url, req);
	});

	generateInvoice.click(function(){
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

	payInvoice.click(function(){
		var invoice = $("#invoiceId").val();
		var writer = $("#writer_id").val();

		var url = payInvoiceUrl + writer + "/" + invoice;

		var req = new FormData();
		req.append("request", "pay");
		req.append("invoiceId", invoice);
		doAjax(url, req);
	});

	reasignOrder.click(function() {
		var order = $("#oId").val();
		var url = base_url + "admin/reasign/" + order;
		var req = new FormData();
		req.append("request", "reasign");
		doAjax(url, req);
	});

	setOnRevision.click(function() {
		var order = $("#oId").val();
		var url = base_url + "admin/setOnRevision/" + order;
		var req = new FormData();
		req.append("request", "revision");
		doAjax(url, req);
	});

	deleteOrder.click(function() {
		var order = $("#oId").val();
		var url = base_url + "admin/deleteOrder/" + order;
		var req = new FormData();
		req.append("request", "delete");
		doAjax(url, req);
	});

	finishOrder.click(function() {
		var order = $("#oId").val();
		var url = base_url + "admin/finishOrder/" + order;
		var req = new FormData();
		req.append("request", "finish");
		doAjax(url, req);
	});

	disputeOrder.click(function() {
		var order = $("#oId").val();
		var url = base_url + "admin/setOnDispute/" + order;
		var req = new FormData();
		req.append("request", "dispute");

		doAjax(url, req);
	});

	function doAjax(url, formData) {
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
				msg_holder.html(`${response}`);
			},
			error: function(jqXHR, textStatus, errorThrown) {
				msg_holder.html(
					`<p class="red white-text p-2"><small>${
						jqXHR.responseText
					}</small></p>`
				);
			}
		});
	}
});

(function($) {
	$.fn.leanModal = function(options) {
		if ($(".modal").length > 0) {
			$(".modal").modal(options);
		}
	};

	$.fn.openModal = function(options) {
		$(this).modal(options);
		$(this).modal("open");
	};

	$.fn.closeModal = function() {
		$(this).modal("close");
	};
})(jQuery);
