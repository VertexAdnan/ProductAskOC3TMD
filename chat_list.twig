<?php
class ControllerAccountChat extends Controller
{
	public function index()
	{
		if (!$this->customer->isLogged()) {
			$this->session->data['redirect'] = $this->url->link('account/order', '', true);

			$this->response->redirect($this->url->link('account/login', '', true));
		}

		$this->load->language('account/order');

		$this->document->setTitle($this->language->get('heading_title'));

		$url = '';

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_account'),
			'href' => $this->url->link('account/account', '', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('account/order', $url, true)
		);

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$data['orders'] = array();

		$this->load->model('chat/chat');
		$vendor_id = $this->vendor->getId();
		$data['rooms'] = $this->model_chat_chat->getRooms($vendor_id);
		$data['roomsProducts'] = $this->model_chat_chat->getRoomsMyProducts($vendor_id);
		/*$this->model_chat_chat->createRoom([
			'vendor_id' => 78,
			'product_id' => 40776
		]);*/

		$data['continue'] = $this->url->link('account/account', '', true);

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/chat_list', $data));
	}

	public function info()
	{
		$this->load->model('chat/chat');
		if (!isset($this->request->get['room_id'])) {
			return $this->response->redirect('https://www.eczabul.com/index.php?route=account/chat');
		}

		$room_data = $this->model_chat_chat->getRoom($this->request->get['room_id']);
		$vendor_id = $this->vendor->getId();

		$data['room_id'] = $room_data['room_id'];
		$data['vendor_id'] = $vendor_id;
		$data['target'] = ($vendor_id == $room_data['vendor_id'] ? 'Mesajım' : $room_data['display_name']);
		$data['continue'] = $this->url->link('account/account', '', true);
		$data['messages'] = $this->model_chat_chat->getMessages($room_data['room_id']);
		
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/chat_info', $data));
	}

	public function sendMessage()
	{
		header('content-type: application/json');
		$vendor_id = $this->vendor->getId();
		if (!$vendor_id) return;

		$this->load->model('chat/chat');

		$message = isset($_POST['message']) ? $_POST['message'] : 0;
		if (!$message) return;

		$room_id = isset($_POST['room_id']) ? $_POST['room_id'] : 0;

		if(!$room_id && isset($_POST['message']) && isset($_POST['product_id'])){
			$room_id = $this->model_chat_chat->createRoom([
				'vendor_id' => $vendor_id,
				'product_id' => $_POST['product_id']
			]);
		}
		//if (!$room_id) return;

		$data = [
			'room_id' => $room_id,
			'message' => $message,
			'vendor_id' => $vendor_id
		];

		$results = $this->model_chat_chat->createMessage($data);
		if (!$results) {
			echo json_encode([
				'error' => true,
				'response' => 'Mesaj gönderimi başarısız!'
			]);

			return;
		}

		echo json_encode([
			'error' => false,
			'response' => 'Mesaj başarıyla gönderildi!',
			'room_id' => $room_id,
			'vendor_id' => $vendor_id
		]);
	}

}
