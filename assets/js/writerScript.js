$(function () {
	var takeOrder = $("#btnTakeOrder");
	var msg_holder = $("#msg_holder");
	var saveFilesBtn = $("#saveFiles");
	var btnCompletOrder = $("#btnCompleteOrder");
	var filesMsg = $("#filesMsg");
	var availableOrdersHolder = $("#availableOrdersHolder");
	var base_url = "http://localhost/curtsy_writing/writers/";

	// function getOrders(status) {
	// 	var formData = new FormData();
	// 	formData.append("status", status);
	// 	var url = base_url + "getOrders";
	// 	//console.log("fetching ajax");
	// 	doAjax(url, formData, availableOrdersHolder);
	// }
	// getOrders("available");

	saveFilesBtn.click(function () {
		var fileInput = $("#file_input")[0];
		var orderId = $("#orderId").val();
		var url = base_url + "uploadOrderFiles";

		if (fileInput.files.length > 0) {
			var formData = new FormData();
			formData.append("order", orderId);
			$.each(fileInput.files, function (k, file) {
				formData.append("files[]", file);
			});

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
					filesMsg.html(`${response}`);
				},
				error: function (jqXHR, textStatus, errorThrown) {
					showNotification("top", "right", "warning", `${jqXHR.responseText}`);
					filesMsg.html(
						`<p class="red white-text p-2"><small>${jqXHR.responseText}</small></p>`
					);
				},
			});
			//doAjax(url, formData, filesMsg);
			btnCompletOrder.prop("disabled", false);
		} else {
			showNotification("top", "right", "warning", `No Files Selected`);
		}
	});

	btnCompletOrder.click(function () {
		var req = new FormData();
		var orderId = $("#orderId").val();
		req.append("request", "completeOrder");

		var url = base_url + "completeOrder/" + orderId;
		doAjax(url, req, msg_holder);
	});

	takeOrder.click(function () {
		var req = new FormData();
		var orderId = $("#orderId").val();
		req.append("request", "take_order");

		var url = base_url + "takeOrder/" + orderId;
		doAjax(url, req, msg_holder);
	});

	function doAjax(url, formData, holder) {
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

	function showNotification(from, align, type, message) {
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
});
