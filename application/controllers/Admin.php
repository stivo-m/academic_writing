<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Admin | Login";
		$data['error'] = "Please Login to Continue...";

		$this->load->view('templetes/admin/header2', $data);
		$this->load->view('admin/auth/login', $data);
		$this->load->view('templetes/admin/footer');
	}

	//login process
	public function login()
	{
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$enc_password = md5($password);


		$validate = $this->Admin_Model->admin_login($email, $enc_password);

		if ($validate) {
			$userdata = $this->Admin_Model->get_admin_data($email);
			$admin_data = array(
				'admin_nickname' => $userdata['nickname'],
				'admin_id' => $userdata['id'],
				'admin_name' => $userdata['name'],
				'admin_email' => $userdata['email'],
				'admin_level' => $userdata['level'],
				'admin_number' => $userdata['number'],
				'admin_login_status' => true
			);

			$this->session->set_userdata("admin_data", $admin_data);
			$this->session->set_flashdata("admin_login", "You are now Logged In!");
			$url = base_url("admin/dashboard");
			redirect($url);

			//redirect to dashboard page
		} else {
			$data['title'] = "Admin | Login";
			$data['error'] = "User does not Exist";


			$this->load->view('templetes/admin/header', $data);
			$this->load->view('admin/auth/login', $data);
			$this->load->view('templetes/admin/footer');
		}
	}

	public function logout()
	{
		$admin_data = array(
			'admin_login_status' => false
		);

		$this->session->unset_userdata("admin_data");
		$this->session->set_flashdata("admin_login", "You are now Logged Out!");
		$url = base_url("admin");
		redirect($url);
	}


	public function dashboard()
	{
		$data['title'] = "Admin | Dashboard";
		$data['available'] = $this->Admin_Model->get_orders("available");
		$data['processing'] = $this->Admin_Model->get_orders("processing");
		$data['revisions'] = $this->Admin_Model->get_orders("revision");
		$data['completed'] = $this->Admin_Model->get_orders("completed");
		$data['finished'] = $this->Admin_Model->get_orders("finished");
		$data['writers'] = $this->Admin_Model->get_writers();

		$this->load->view('templetes/admin/header', $data);
		$this->load->view('templetes/admin/nav', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templetes/admin/footer');
	}

	public function orders($id = NULL)
	{
		if ($id == NULL) {
			$data['title'] = "Admin | Orders";
			$data['available'] = $this->Admin_Model->get_orders("available");
			$data['processing'] = $this->Admin_Model->get_orders("processing");
			$data['revisions'] = $this->Admin_Model->get_orders("revision");
			$data['completed'] = $this->Admin_Model->get_orders("completed");
			$data['finished'] = $this->Admin_Model->get_orders("finished");
			$data['page'] = "orders";

			$this->load->view('templetes/admin/header', $data);
			$this->load->view('templetes/admin/nav', $data);
			$this->load->view('admin/orders', $data);
			$this->load->view('templetes/admin/footer');
		} else {
			$data['title'] = "Admin | Order " . $id;
			$data['order'] = $this->Admin_Model->get_order($id);
			$data['writers'] = $this->Admin_Model->get_writers();
			$data["files"] = $this->Admin_Model->getOrderFiles($id);
			$data["id"] = $id;
			$order = $this->Admin_Model->get_order($id);
			$data["writerId"] = $order["writer_id"];

			$this->load->view('templetes/admin/header', $data);
			$this->load->view('templetes/admin/nav', $data);
			$this->load->view('admin/view', $data);
			$this->load->view('templetes/admin/footer');
		}
	}

	public function add_order()
	{

		$date = $this->input->post("date_deadline");
		$time = $this->input->post("time_deadline");
		$date = date('Y-m-d');
		$time = date(' H:i:s');

		$order_data = array(
			"title" => $this->input->post("title"),
			'subject' => $this->input->post("subject"),
			'sources' => $this->input->post("sources"),
			'spacing' => $this->input->post("spacing"),
			'date_deadline' => $date,
			'time_deadline' => $time,
			'format' => $this->input->post("format"),
			'level' => $this->input->post("level"),
			'pages' => $this->input->post("pages"),
			'cost' => $this->input->post("price") * $this->input->post("pages"),
			'instructions' => $this->input->post("instructions"),
			'status' => "available",
			'admin_id' => $this->session->userdata["admin_data"]["admin_id"]
		);

		$result = $this->Admin_Model->add_order($order_data);

		if ($result) {
			$msg = "Order Added!";
			echo json_encode($msg);
			return true;
		} else {
			$msg = "Order was not Added";
			echo json_encode($msg);
			return false;
		}
	}



	public function assign($order, $writer)
	{
		$result = $this->Admin_Model->assignOrder($order, $writer);
		return $result;
	}

	public function reasign($order)
	{
		$result = $this->Admin_Model->re_assignOrder($order);
		return $result;
	}

	public function setOnDispute($order)
	{
		$result = $this->Admin_Model->setOnDispute($order);
		return $result;
	}

	public function setOnRevision($order)
	{
		$result = $this->Admin_Model->setOnRevision($order);
		return $result;
	}

	public function deleteOrder($order)
	{
		$result = $this->Admin_Model->deleteOrder($order);
		return $result;
	}

	public function finishOrder($order)
	{
		$result = $this->Admin_Model->finishOrder($order);
		return $result;
	}

	public function Messages($id = NULL)
	{
		if ($id == NULL) {
			$data['title'] = "Admin | Messages ";

			$this->load->view('templetes/admin/header', $data);
			$this->load->view('templetes/admin/nav', $data);
			$this->load->view('admin/chats', $data);
			$this->load->view('templetes/admin/footer');
		} else {
			$data['title'] = "Admin | Message " . $id;
			$data["id"] = $id;
			$order = $this->Admin_Model->get_order($id);
			$data["writerId"] = $order["writer_id"];


			$this->load->view('templetes/admin/header', $data);
			$this->load->view('templetes/admin/nav', $data);
			$this->load->view('admin/chats', $data);
			$this->load->view('templetes/admin/footer');
		}
	}

	//get messages in ajax
	public function getMessages($order)
	{
		$result = $this->Messages_Model->getMessages($order);
		return $result;
	}

	public function sendMessage()
	{
		$messageData = array(
			'message' => $this->input->post("message"),
			'recipient' => $this->input->post("recipient"),
			'sender' => $this->input->post("sender"),
			'order_id' => $this->input->post("order"),
			'writer_id' => $this->input->post("writer"),
		);
		$this->Messages_Model->sendNewMessage($messageData);
	}

	//writer Function
	public function writers($id = NULL)
	{
		if ($id == NULL) {
			$data['title'] = "Admin | Writers";
			$data['writers'] = $this->Admin_Model->get_writers();

			$this->load->view('templetes/admin/header', $data);
			$this->load->view('templetes/admin/nav', $data);
			$this->load->view('admin/writers', $data);
			$this->load->view('templetes/admin/footer');
		} else {
			$data['title'] = "Admin | Writer " . $id;
			$data['writer'] = $this->Admin_Model->get_writer($id);
			$data['writer_orders'] = $this->Admin_Model->get_orders_by($id);

			// print_r($this->Admin_Model->get_orders_by($id));
			// return;
			$this->load->view('templetes/admin/header', $data);
			$this->load->view('templetes/admin/nav', $data);
			$this->load->view('admin/writer_profile', $data);
			$this->load->view('templetes/admin/footer');
		}
	}

	public function getWriter($id)
	{
		$result = $this->Admin_Model->get_writer($id);
		//echo json_encode($result != NULL ? "Success" : "Failed");

		return $result;
		//print_r($result);
		//return json_encode($result);
	}

	public function finances($writerId = NULL)
	{
		$data['title'] = "Admin | Finances";
		$data['available'] = $this->Admin_Model->get_orders("available");
		$data['processing'] = $this->Admin_Model->get_orders("processing");
		$data['revisions'] = $this->Admin_Model->get_orders("revision");
		$data['completed'] = $this->Admin_Model->get_orders("completed");
		$data['finished'] = $this->Admin_Model->get_orders("finished");
		$data['disputed'] = $this->Admin_Model->get_orders("disputed");
		$data['writers'] = $this->Admin_Model->get_writers();
		$data["invoices"] = $writerId == null ? $this->Admin_Model->getInvoices() : $this->Admin_Model->getInvoices($writerId);
		$data["singleInvoice"] = $writerId == null ? $this->Admin_Model->getInvoice() : $this->Admin_Model->getInvoice($writerId);
		$data['writer'] = $writerId == null ? 0 : $writerId;

		$this->load->view('templetes/admin/header', $data);
		$this->load->view('templetes/admin/nav', $data);
		$writerId == null ? $this->load->view('admin/finances', $data) : $this->load->view('admin/financeWriterView', $data);

		$this->load->view('templetes/admin/footer');
	}

	public function invoices($writerId)
	{
		$data['title'] = "Admin | Create Invoice";
		$data['writer'] = $this->Admin_Model->get_writer($writerId);
		$data['finished'] = $this->Admin_Model->get_orders("finished");

		$this->load->view('templetes/admin/header', $data);
		$this->load->view('templetes/admin/nav', $data);
		$this->load->view('admin/invoice', $data);
		$this->load->view('templetes/admin/footer');
	}

	public function createInvoice($id)
	{
		$totals = $this->input->post("totals");
		$writer = $this->input->post("writer");
		$totalOrders = $this->input->post("totalOrders");

		$invoiceData = array(
			'writer_id' => trim($writer),
			'totals' => trim($totals),
			'total_orders' => trim($totalOrders)
		);

		$orderUpdates = array(
			'invoiced' => "1"
		);

		$info = $this->Admin_Model->get_orders("finished");
		foreach ($info as $d) {
			if ($d["writer_id"] === $id) {
				$order = $d;
				$this->Admin_Model->updateOrderInfo($order["id"], $orderUpdates);
			}
		}
		//$this->Admin_Model->updateOrderInfo(8, $orderUpdates);
		$this->Admin_Model->createInvoice($invoiceData);
	}

	public function payInvoice($id, $invoiceId)
	{
		//$invoice = $this->input->post("invoiceId");
		//$invoiceId = json_decode(base64_decode($data));

		$invoiceData = array(
			'pay_date' => now(),
			'pay_status' => "1"
		);

		$orderUpdates = array(
			"pay_status" => "1",
			"payment_date" => now()
		);

		$info = $this->Admin_Model->get_orders("finished");
		foreach ($info as $d) {
			if ($d["writer_id"] === $id) {
				$order = $d;
				$this->Admin_Model->updateOrderInfo($order["id"], $orderUpdates);
			}
		}
		$this->Admin_Model->payInvoice($invoiceId, $invoiceData);
	}

	public function settings()
	{
		$data['title'] = "Admin | Settings";
		$data['settings'] = $this->Admin_Model->getSettings();

		$this->load->view('templetes/admin/header', $data);
		$this->load->view('templetes/admin/nav', $data);
		$this->load->view('admin/settings', $data);
		$this->load->view('templetes/admin/footer');
	}

	//upload order files
	public function uploadOrderFiles()
	{
		$f = array();
		$id = $this->input->post("order");

		$countUploadedFiles = count($_FILES['files']['name']);
		$files = $_FILES;

		$config['upload_path'] = "./uploads/";
		$config["allowed_types"] = "jpg|jpeg|png|doc|dox||docx|txt|xls|ppt|pdf";
		$this->load->library('upload', $config);
		$this->upload->initialize($config);

		$output = '<ul class="collection">';
		$output .= `<li class="collection-item"><span class="green-text">Files Uploaded</span></li>`;
		if (!is_writable("./uploads/")) {
			print("No Directory Found");
			return;
		}

		for ($i = 0; $i < $countUploadedFiles; $i++) {
			$_FILES['file']["name"] = preg_replace('/\s+/', '', $_FILES['files']['name'][$i]);
			$_FILES['file']["type"] = $_FILES['files']['type'][$i];
			$_FILES['file']["tmp_name"] = $_FILES['files']['tmp_name'][$i];
			$_FILES['file']["error"] = $_FILES['files']['error'][$i];
			$_FILES['file']["size"] = $_FILES['files']['size'][$i];

			if ($this->upload->do_upload('file')) {
				$data = $this->upload->data();

				$upload_info = array(
					'filename' => $_FILES['file']["name"],
					'type' => $_FILES['file']["type"],
					'size' => $_FILES['file']["size"],
					'order_id' =>  $id,
					'uploaded_by' => "admin"

				);

				if ($this->Admin_Model->uploadFiles($upload_info)) {
					$output .= '
                        <li class="collection-item">
                            
                            <a href="' . base_url() . 'upload/' . $data["file_name"] . '" >
                            ' . $data["file_name"] . '
                            </a>
                        </li>
                    ';
				} else {
					$output .= '
                    <li class="collection-item">
                        <a href="" >
                         Files not saved to DB
                        </a>
                    </li>
                ';
				}


				# code...

			} else {
				$output .= `<p class="red-text">Error Occured</p>`;
			}
			foreach ($f as $file) {
				//TODO: upload files

			}
		}
		$output .= '</ul>';

		echo $output;
	}

	//download file
	public function download($file)
	{
		$this->load->helper('download');
		$name = $file;
		$data = file_get_contents('./uploads/' . $file);
		$path = "./uploads/" . $name;

		if (is_file($path)) {
			// required for IE
			if (ini_get('zlib.output_compression')) {
				ini_set('zlib.output_compression', 'Off');
			}

			// get the file mime type using the file extension
			$this->load->helper('file');

			$mime = get_mime_by_extension($path);

			// Build the headers to push out the file properly.
			header('Pragma: public');     // required
			header('Expires: 0');         // no cache
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
			header('Last-Modified: ' . gmdate('D, d M Y H:i:s', filemtime($path)) . ' GMT');
			header('Cache-Control: private', false);
			header('Content-Type: ' . $mime);  // Add the mime type from Code igniter.
			header('Content-Disposition: attachment; filename="' . basename($name) . '"');  // Add the file name
			header('Content-Transfer-Encoding: binary');
			header('Content-Length: ' . filesize($path)); // provide file size
			header('Connection: close');
			readfile($path); // push it out

			exit();
		}

		force_download($name, $data);
		redirect('index', 'refresh');
	}
}
