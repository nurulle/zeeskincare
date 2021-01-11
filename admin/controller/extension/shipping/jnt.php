<?php
class ControllerExtensionShippingjnt extends Controller{
	private $error = array();

	public function install() {
		$this->db->query("CREATE TABLE IF NOT EXISTS `" . DB_PREFIX . "jnt_express` (
		 	`id` int(11) NOT NULL AUTO_INCREMENT,
		  	`order_id` text NOT NULL,
		  	`jnt_tracking_num` text NOT NULL,
		  	`jnt_order_num` text NOT NULL,
		  	`jnt_code`	text NOT NULL,
  			`jnt_cancel_order` text NOT NULL,
		  PRIMARY KEY (`id`)
		)");
	}

	public function index () {
		$this->install();
		$this->load->language('extension/shipping/jnt');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('shipping_jnt', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true));
		}

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['vip_code'])) {
			$data['error_vip_code'] = $this->error['vip_code'];
		} else {
			$data['error_vip_code'] = '';
		}

		if (isset($this->error['vip_pass'])) {
			$data['error_vip_pass'] = $this->error['vip_pass'];
		} else {
			$data['error_vip_pass'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_extension'),
			'href' => $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('extension/shipping/jnt', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['action'] = $this->url->link('extension/shipping/jnt', 'user_token=' . $this->session->data['user_token'], true);

		$data['cancel'] = $this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'] . '&type=shipping', true);

		if (isset($this->request->post['shipping_jnt_vip_code'])) {
			$data['shipping_jnt_vip_code'] = $this->request->post['shipping_jnt_vip_code'];
		} else {
			$data['shipping_jnt_vip_code'] = $this->config->get('shipping_jnt_vip_code');
		}

		if (isset($this->request->post['shipping_jnt_vip_pass'])) {
			$data['shipping_jnt_vip_pass'] = $this->request->post['shipping_jnt_vip_pass'];
		} else {
			$data['shipping_jnt_vip_pass'] = $this->config->get('shipping_jnt_vip_pass');
		}

		if (isset($this->request->post['shipping_jnt_service_type'])) {
			$data['shipping_jnt_service_type'] = $this->request->post['shipping_jnt_service_type'];
		} else {
			$data['shipping_jnt_service_type'] = $this->config->get('shipping_jnt_service_type');
		}

	    $data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('extension/shipping/jnt', $data));

	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'extension/shipping/jnt')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['shipping_jnt_vip_code']) {
			$this->error['vip_code'] = $this->language->get('error_vip_code');
		}

		if (!$this->request->post['shipping_jnt_vip_pass']) {
			$this->error['vip_pass'] = $this->language->get('error_vip_pass');
		}

		return !$this->error;
	}
}