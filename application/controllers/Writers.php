<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Writers extends CI_Controller
{

    public function index()
    {
        $data['title'] = "Writer | Login";
        $data['error'] = "Please Login to Continue...";


        $this->load->view('templetes/writer/header2', $data);
        $this->load->view('writer/auth/login', $data);
        $this->load->view('templetes/writer/footer');
    }

    //login process
    public function login()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $enc_password = md5($password);


        $validate = $this->Writer_Model->loginWriter($email, $enc_password);

        if ($validate) {
            $userdata = $this->Writer_Model->getProfile($email);
            $writer_data = array(
                'writer_nickname' => $userdata['nickname'],
                'writer_id' => $userdata['id'],
                'writer_name' => $userdata['name'],
                'writer_email' => $userdata['email'],
                'writer_level' => $userdata['level'],
                'writer_number' => $userdata['number'],
                'writer_login_status' => true
            );

            $config = array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'xxx@gmail.com', // change it to yours
                'smtp_pass' => 'xxx', // change it to yours
                'mailtype' => 'html',
                'charset' => 'iso-8859-1',
                'wordwrap' => TRUE
            );

            $email_config = array(
                'protocol'  => 'smtp',
                'smtp_host' => 'bh-24.webhostbox.net',
                'smtp_port' => '465',
                'smtp_user' => 'feedback@domain.com',
                'smtp_pass' => '12feedback34',
                'mailtype'  => 'html',
                'starttls'  => true,
                'newline'   => "\r\n"
            );
            // $this->load->library('email', $email_config);
            // $this->email->from($to, 'FEEDBACK');
            // $this->email->to('feedback@domain.com');
            // $this->email->subject($sub);
            // $this->email->message($msg);
            // $this->email->send();

            $this->session->set_userdata("writer_data", $writer_data);
            $this->session->set_flashdata("writer_login", "You are now Logged In!");
            $url = base_url("writers/dashboard");
            redirect($url);

            //redirect to dashboard page
        } else {
            $data['title'] = "Writer | Login";
            $data['error'] = "Writer does not Exist";

            $this->load->view('templetes/writer/header2', $data);
            $this->load->view('writer/auth/login', $data);
            $this->load->view('templetes/writer/footer');
        }
    }




    //api login
    //login process
    public function apiLogin()
    {
        $email = $this->input->post("email");
        $password = $this->input->post("password");

        $enc_password = md5($password);

        $result = '';
        $validate = $this->Writer_Model->loginWriter($email, $enc_password);
        if ($validate) {
            $result = $this->Writer_Model->getProfile($email);
        } else {
            $result = null;
        }

        return json_encode($result);
    }

    //logout
    public function logout()
    {
        $writer_data = array(
            'writer_login_status' => false
        );

        $this->session->unset_userdata("writer_data");
        $this->session->set_flashdata("writer_login", "You are now Logged Out!");
        $url = base_url("writers");
        redirect($url);
    }

    //dashboard
    public function dashboard()
    {
        $writer = $this->session->userdata["writer_data"]["writer_id"];
        $data['title'] = "Writer | Dashboard";
        $data["msg_count"] = "0";
        $data["id"] = 0;


        $data['available'] = $this->Writer_Model->getOrders("available", null);
        $data['processing'] = $this->Writer_Model->getOrders("processing", $writer);
        $data['revisions'] = $this->Writer_Model->getOrders("revision", $writer);
        $data['completed'] = $this->Writer_Model->getOrders("completed", $writer);
        $data['finished'] = $this->Writer_Model->getOrders("finished", $writer);

        $this->load->view('templetes/writer/header', $data);
        $this->load->view('templetes/writer/nav', $data);
        $this->load->view('writer/dashboard', $data);
        $this->load->view('templetes/writer/footer');
    }


    //get Orders Function
    public function getOrders()
    {
        $writer = $this->session->userdata["writer_data"]["writer_id"];
        $status = $this->input->post("status");

        $result = $this->Writer_Model->getOrdersbyAjax($status, null);
        return $result;
    }


    //orders page | view order
    public function orders($id = NULL)
    {
        $writer = $this->session->userdata["writer_data"]["writer_id"];
        if ($id == NULL) {
            $data['title'] = "Writer | Orders";
            $data["msg_count"] = "0";
            $data["id"] = $id;

            $data['available'] = $this->Writer_Model->getOrders("available", null);
            $data['processing'] = $this->Writer_Model->getOrders("processing", $writer);
            $data['revisions'] = $this->Writer_Model->getOrders("revision", $writer);
            $data['completed'] = $this->Writer_Model->getOrders("completed", $writer);

            $this->load->view('templetes/writer/header', $data);
            $this->load->view('templetes/writer/nav', $data);
            $this->load->view('writer/orders', $data);
            $this->load->view('templetes/writer/footer');
        } else {
            $data['title'] = "Writer | Order " . $id;
            $data["msg_count"] = "0";
            $data["id"] = $id;
            $data['processing'] = $this->Writer_Model->getOrders("processing", $writer);
            $data['order'] = $this->Writer_Model->getOrder($id);
            $data["files"] = $this->Writer_Model->getOrderFiles($id);

            $this->load->view('templetes/writer/header', $data);
            $this->load->view('templetes/writer/nav', $data);
            $this->load->view('writer/view', $data);
            $this->load->view('templetes/writer/footer');
        }
    }

    //take order
    public function takeOrder($id)
    {
        $writer = $this->session->userdata["writer_data"]["writer_id"];
        $result = $this->Writer_Model->takeOrder($id, $writer);
        return $result;
    }

    //complete order
    public function completeOrder($id)
    {
        $result = $this->Writer_Model->completeOrder($id);
        return $result;
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

        $output = '';
        // $output .= `<li class="collection-item"><span class="green-text">Files Uploaded</span></li>`;
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
            //$_FILES['file']["ext"] = $files['files']['ext'][$i];
            // print_r($_FILES);
            // return;

            if ($this->upload->do_upload('file')) {
                $data = $this->upload->data();

                $upload_info = array(
                    'filename' => $_FILES['file']["name"],
                    'type' => $_FILES['file']["type"],
                    'size' => $_FILES['file']["size"],
                    'order_id' =>  $id,
                    'uploaded_by' => "writer"

                );

                if ($this->Writer_Model->uploadFiles($upload_info)) {
                    $output .= '
                        <p class="text-default">Files Saved Successfully</p>
                    ';
                } else {
                    $output .= '
                   <p class="text-danger">Error Occured. Files were not saved</p>
                ';
                }

                # code...

            } else {
                $output .= `<p class="text-danger">Error Occured</p>`;
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


    //finances
    public function finances($writerId = NULL)
    {
        $writer = $this->session->userdata["writer_data"]["writer_id"];
        $data["title"] = "Writer | Finances";
        $data["id"] = $writerId;
        $data["msg_count"] = "0";
        $data["writer"] = $this->Writer_Model->getProfile($this->session->userdata["writer_data"]["writer_email"]);
        $data['processing'] = $this->Writer_Model->getOrders("processing", $writer);
        $data['revisions'] = $this->Writer_Model->getOrders("revision", $writer);
        $data['disputes'] = $this->Writer_Model->getOrders("disputed", $writer);
        $data['completed'] = $this->Writer_Model->getOrders("completed", $writer);
        $data['finished'] = $this->Writer_Model->getOrders("finished", $writer);

        $data['invoiced'] = $this->Writer_Model->getInvoicedOrders($writer);
        $data["invoices"] = $this->Writer_Model->obtainInvoices($writer);
        $data["singleInvoice"] = $this->Admin_Model->getInvoice($writer);
        $data["invoi"] = $this->Writer_Model->getInvoices($writer);

        $this->load->view('templetes/writer/header', $data);
        $this->load->view('templetes/writer/nav', $data);
        $writerId == null ? $this->load->view('writer/finances', $data) : $this->load->view('writer/financeWriterView', $data);
        $this->load->view('templetes/writer/footer');
    }

    //profile
    public function settings()
    {
        $writer = $this->session->userdata["writer_data"]["writer_id"];
        $data["title"] = "Writer | Profile";
        $data["msg_count"] = "0";
        $data["id"] = $this->session->userdata["writer_data"]["writer_id"];
        $data["writer"] = $this->Writer_Model->getProfile($this->session->userdata["writer_data"]["writer_email"]);
        $data['processing'] = $this->Writer_Model->getOrders("processing", $writer);
        $data['revisions'] = $this->Writer_Model->getOrders("revision", $writer);
        $data['disputes'] = $this->Writer_Model->getOrders("disputed", $writer);
        $data['completed'] = $this->Writer_Model->getOrders("completed", $writer);
        $data['finished'] = $this->Writer_Model->getOrders("finished", $writer);

        $this->load->view('templetes/writer/header', $data);
        $this->load->view('templetes/writer/nav', $data);
        $this->load->view('writer/writer_profile', $data);
        $this->load->view('templetes/writer/footer');
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

    //get unread messages
    public function getUnreadMessages()
    {
        $writer = $this->session->userdata["writer_data"]["writer_id"];

        $result = $this->Messages_Model->getUnreadMessages($writer, null);
        print_r($result);
        return $result;
    }

    public function getNotifsCount()
    {
        $writer = $this->session->userdata["writer_data"]["writer_id"];
        $result = $this->Messages_Model->getNotifsCunt($writer);

        $output = '
            <p class="badge red white-text new" style="border-radius: 50%">
                ' . count($result) . '
            </p>
        ';

        echo $output;
    }


    public function Messages($id = NULL)
    {
        if ($id == NULL) {
            $data['title'] = "Writer | Messages ";
            $data["msg_count"] = "0";

            $this->load->view('templetes/writer/header', $data);
            $this->load->view('templetes/writer/nav', $data);
            $this->load->view('writer/chats', $data);
            $this->load->view('templetes/writer/footer');
        } else {
            $data['title'] = "Writer | Message " . $id;
            $data["msg_count"] = "0";
            $data["id"] = $id;

            $this->load->view('templetes/writer/header', $data);
            $this->load->view('templetes/writer/nav', $data);
            $this->load->view('writer/chats', $data);
            $this->load->view('templetes/writer/footer');
        }
    }
}
