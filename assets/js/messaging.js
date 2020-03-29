$(function() {
	//messaging file
	var messages = {};
	var msgHolder = $("#messageHolder");
	var msgCounter = $("#messageCounter");
	var msgDropDown = $("#messageDropdown");
	var adminBaseUrl = "http://localhost/curtsy_writing/admin/";
	var writerBaseUrl = "http://localhost/curtsy_writing/writers/";
	var sendBtn = $("#sendOrderMessage");
	var getMsgsBtn = $("#getNewMsgs");
	var msgId = $("#msgId").val();
	var isAtBottom = false;

	sendBtn.click(function() {
		var message = $("#messageInput").val();
		var sender = $("#messageSender").val();
		var recipient = $("#messageRecipient").val();
		var order = $("#orderId").val();
		var writer = $("#writerId").val();

		if (message == "" || sender == "" || recipient == "" || order == "" || writer == "") {
			return;
		}

		messages.sendMessage(message, sender, recipient, writer, order);
		msgHolder.scrollTop(msgHolder.prop("scrollHeight"));
		$("#messageInput").val("");
	});

	messages.sendMessage = function(message, sender, recipient, writer, order = NULL) {
		var formData = new FormData();
		var url;
		if (sender == "writer") {
			url = writerBaseUrl + "sendMessage";
		} else {
			url = adminBaseUrl + "sendMessage";
		}

		formData.append("sender", sender);
		formData.append("recipient", recipient);
		formData.append("order", order);
		formData.append("message", message);
		formData.append("writer", writer);

		doAjax(url, formData, msgHolder);

		msgHolder.scrollTop(msgHolder.prop("scrollHeight"));
	};

	messages.retrieveNewMessage = function() {};

	messages.updateMessageUI = function(user, order) {
		var formData = new FormData();
		var url;
		if (user == "writer") {
			url = writerBaseUrl + "getMessages/" + order;
		} else if (user == "admin") {
			url = adminBaseUrl + "getMessages/" + order;
		}
		formData.append("user", user);
		formData.append("order", order);

		doAjax(url, formData, msgHolder);
	};

	messages.getNotificationsCount = function() {
		var url = writerBaseUrl + "getNotifsCount";
		var formData = new FormData();
		formData.append("req", "notifs");
		doAjax(url, formData, msgCounter);
	};

	messages.getNotifications = function(user) {
		var formData = new FormData();
		var url;
		if (user == "writer") {
			url = writerBaseUrl + "getUnreadMessages";
		} else if (user == "admin") {
			url = adminBaseUrl + "getUnreadMessages";
		}
		formData.append("user", user);
		doAjax(url, formData, msgDropDown);
	};

	getMsgsBtn.click(function(){
		getNotifs("writer");
	});

	function updateReadStatus(){
		alert("updated");
	}

	function updateMessages(user) {
		var order = $("#orderId").val();
		messages.updateMessageUI(user, order);
	}
	updateMessages("admin");

	function updateMessages(user) {
		var order = $("#orderId").val();
		messages.updateMessageUI(user, order);
	}
	updateMessages("writer");

	function getNotifs(user) {
		messages.getNotifications(user);
	}getNotifs("writer");


	window.setInterval(function() {
		updateMessages("writer");
		updateMessages("admin");
		getNotifs("writer");
		messages.getNotificationsCount();
	}, 1000);


	

	function doAjax(url, formData, holder) {
		$.ajax({
			url: url,
			data: formData,
			async: false,
			cache: false,
			contentType: false,
			processData: false,
			method: "POST",

			success: function(response) {
				holder.html(`${response}`);

				if (!isAtBottom) {
					//console.log("Response: " + response);
					msgHolder.scrollTop(msgHolder.prop("scrollHeight"));
					isAtBottom = true;
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				console.log(textStatus, errorThrown, jqXHR.responseText);
			}
		});
	}
});
