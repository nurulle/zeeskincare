<?php
class ControllerSaleOrder extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('sale/order');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/order');

		$this->getList();
	}

	public function add() {
		$this->load->language('sale/order');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/order');

		$this->getForm();
	}

	public function edit() {
		$this->load->language('sale/order');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('sale/order');

		$this->getForm();
	}
	
	public function delete() {
		$this->load->language('sale/order');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->session->data['success'] = $this->language->get('text_success');

		$url = '';

		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_order_status'])) {
			$url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
		}
	
		if (isset($this->request->get['filter_order_status_id'])) {
			$url .= '&filter_order_status_id=' . $this->request->get['filter_order_status_id'];
		}
			
		if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->response->redirect($this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true));
	}
			
	protected function getList() {
		if (isset($this->request->get['filter_order_id'])) {
			$filter_order_id = $this->request->get['filter_order_id'];
		} else {
			$filter_order_id = '';
		}

		if (isset($this->request->get['filter_customer'])) {
			$filter_customer = $this->request->get['filter_customer'];
		} else {
			$filter_customer = '';
		}

		if (isset($this->request->get['filter_order_status'])) {
			$filter_order_status = $this->request->get['filter_order_status'];
		} else {
			$filter_order_status = '';
		}
		
		if (isset($this->request->get['filter_order_status_id'])) {
			$filter_order_status_id = $this->request->get['filter_order_status_id'];
		} else {
			$filter_order_status_id = '';
		}
		
		if (isset($this->request->get['filter_total'])) {
			$filter_total = $this->request->get['filter_total'];
		} else {
			$filter_total = '';
		}

		if (isset($this->request->get['filter_date_added'])) {
			$filter_date_added = $this->request->get['filter_date_added'];
		} else {
			$filter_date_added = '';
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$filter_date_modified = $this->request->get['filter_date_modified'];
		} else {
			$filter_date_modified = '';
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'o.order_id';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'DESC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_order_status'])) {
			$url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
		}
	
		if (isset($this->request->get['filter_order_status_id'])) {
			$url .= '&filter_order_status_id=' . $this->request->get['filter_order_status_id'];
		}
			
		if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);


    			$data['jnt'] = $this->url->link('sale/order/jnt', 'user_token=' . $this->session->data['user_token'], true);
    			$data['print_jnt'] = $this->url->link('sale/order/print_jnt', 'user_token=' . $this->session->data['user_token'], true);
    			$data['print_jnt_a4'] = $this->url->link('sale/order/print_jnt_A4', 'user_token=' . $this->session->data['user_token'], true);
    			$data['print_jnt_item'] = $this->url->link('sale/order/print_jnt_item', 'user_token=' . $this->session->data['user_token'], true);
    		
		$data['invoice'] = $this->url->link('sale/order/invoice', 'user_token=' . $this->session->data['user_token'], true);
		$data['shipping'] = $this->url->link('sale/order/shipping', 'user_token=' . $this->session->data['user_token'], true);
		$data['add'] = $this->url->link('sale/order/add', 'user_token=' . $this->session->data['user_token'] . $url, true);
		$data['delete'] = str_replace('&amp;', '&', $this->url->link('sale/order/delete', 'user_token=' . $this->session->data['user_token'] . $url, true));

		$data['orders'] = array();

		$filter_data = array(
			'filter_order_id'        => $filter_order_id,
			'filter_customer'	     => $filter_customer,
			'filter_order_status'    => $filter_order_status,
			'filter_order_status_id' => $filter_order_status_id,
			'filter_total'           => $filter_total,
			'filter_date_added'      => $filter_date_added,
			'filter_date_modified'   => $filter_date_modified,
			'sort'                   => $sort,
			'order'                  => $order,
			'start'                  => ($page - 1) * $this->config->get('config_limit_admin'),
			'limit'                  => $this->config->get('config_limit_admin')
		);

		$order_total = $this->model_sale_order->getTotalOrders($filter_data);

		$results = $this->model_sale_order->getOrders($filter_data);

		foreach ($results as $result) {
			$data['orders'][] = array(
				'order_id'      => $result['order_id'],
				'customer'      => $result['customer'],
				'order_status'  => $result['order_status'] ? $result['order_status'] : $this->language->get('text_missing'),
				'total'         => $this->currency->format($result['total'], $result['currency_code'], $result['currency_value']),
				'date_added'    => date($this->language->get('date_format_short'), strtotime($result['date_added'])),
				'date_modified' => date($this->language->get('date_format_short'), strtotime($result['date_modified'])),
				
    			'awb' => $this->model_sale_order->getJntTracking($result['order_id']),
    		
				'view'          => $this->url->link('sale/order/info', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . $result['order_id'] . $url, true),
				'edit'          => $this->url->link('sale/order/edit', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . $result['order_id'] . $url, true)
			);
		}

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$data['success'] = '';
		}
		
		if (isset($this->request->post['selected'])) {
			$data['selected'] = (array)$this->request->post['selected'];
		} else {
			$data['selected'] = array();
		}

		$url = '';

		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_order_status'])) {
			$url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
		}
		
		if (isset($this->request->get['filter_order_status_id'])) {
			$url .= '&filter_order_status_id=' . $this->request->get['filter_order_status_id'];
		}
			
		if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['sort_order'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . '&sort=o.order_id' . $url, true);
		$data['sort_customer'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . '&sort=customer' . $url, true);
		$data['sort_status'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . '&sort=order_status' . $url, true);
		$data['sort_total'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . '&sort=o.total' . $url, true);
		$data['sort_date_added'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . '&sort=o.date_added' . $url, true);
		$data['sort_date_modified'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . '&sort=o.date_modified' . $url, true);

		$url = '';

		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_order_status'])) {
			$url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
		}
		
		if (isset($this->request->get['filter_order_status_id'])) {
			$url .= '&filter_order_status_id=' . $this->request->get['filter_order_status_id'];
		}
			
		if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $order_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_limit_admin');
		$pagination->url = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($order_total) ? (($page - 1) * $this->config->get('config_limit_admin')) + 1 : 0, ((($page - 1) * $this->config->get('config_limit_admin')) > ($order_total - $this->config->get('config_limit_admin'))) ? $order_total : ((($page - 1) * $this->config->get('config_limit_admin')) + $this->config->get('config_limit_admin')), $order_total, ceil($order_total / $this->config->get('config_limit_admin')));

		$data['filter_order_id'] = $filter_order_id;
		$data['filter_customer'] = $filter_customer;
		$data['filter_order_status'] = $filter_order_status;
		$data['filter_order_status_id'] = $filter_order_status_id;
		$data['filter_total'] = $filter_total;
		$data['filter_date_added'] = $filter_date_added;
		$data['filter_date_modified'] = $filter_date_modified;

		$data['sort'] = $sort;
		$data['order'] = $order;

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		// API login
		$data['catalog'] = $this->request->server['HTTPS'] ? HTTPS_CATALOG : HTTP_CATALOG;
		
		// API login
		$this->load->model('user/api');

		$api_info = $this->model_user_api->getApi($this->config->get('config_api_id'));

		if ($api_info && $this->user->hasPermission('modify', 'sale/order')) {
			$session = new Session($this->config->get('session_engine'), $this->registry);
			
			$session->start();
					
			$this->model_user_api->deleteApiSessionBySessonId($session->getId());
			
			$this->model_user_api->addApiSession($api_info['api_id'], $session->getId(), $this->request->server['REMOTE_ADDR']);
			
			$session->data['api_id'] = $api_info['api_id'];

			$data['api_token'] = $session->getId();
		} else {
			$data['api_token'] = '';
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('sale/order_list', $data));
	}
		
	public function getForm() {
		$data['text_form'] = !isset($this->request->get['order_id']) ? $this->language->get('text_add') : $this->language->get('text_edit');

		$url = '';

		if (isset($this->request->get['filter_order_id'])) {
			$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
		}

		if (isset($this->request->get['filter_customer'])) {
			$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_order_status'])) {
			$url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
		}
		
		if (isset($this->request->get['filter_order_status_id'])) {
			$url .= '&filter_order_status_id=' . $this->request->get['filter_order_status_id'];
		}
			
		if (isset($this->request->get['filter_total'])) {
			$url .= '&filter_total=' . $this->request->get['filter_total'];
		}

		if (isset($this->request->get['filter_date_added'])) {
			$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
		}

		if (isset($this->request->get['filter_date_modified'])) {
			$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true)
		);

		$data['cancel'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true);

		$data['user_token'] = $this->session->data['user_token'];

		if (isset($this->request->get['order_id'])) {
			$order_info = $this->model_sale_order->getOrder($this->request->get['order_id']);
		}

		if (!empty($order_info)) {
			$data['order_id'] = $this->request->get['order_id'];
			$data['store_id'] = $order_info['store_id'];
			$data['store_url'] = $this->request->server['HTTPS'] ? HTTPS_CATALOG : HTTP_CATALOG;

			$data['customer'] = $order_info['customer'];
			$data['customer_id'] = $order_info['customer_id'];
			$data['customer_group_id'] = $order_info['customer_group_id'];
			$data['firstname'] = $order_info['firstname'];
			$data['lastname'] = $order_info['lastname'];
			$data['email'] = $order_info['email'];
			$data['telephone'] = $order_info['telephone'];
			$data['account_custom_field'] = $order_info['custom_field'];

			$this->load->model('customer/customer');

			$data['addresses'] = $this->model_customer_customer->getAddresses($order_info['customer_id']);

			$data['payment_firstname'] = $order_info['payment_firstname'];
			$data['payment_lastname'] = $order_info['payment_lastname'];
			$data['payment_company'] = $order_info['payment_company'];
			$data['payment_address_1'] = $order_info['payment_address_1'];
			$data['payment_address_2'] = $order_info['payment_address_2'];
			$data['payment_city'] = $order_info['payment_city'];
			$data['payment_postcode'] = $order_info['payment_postcode'];
			$data['payment_country_id'] = $order_info['payment_country_id'];
			$data['payment_zone_id'] = $order_info['payment_zone_id'];
			$data['payment_custom_field'] = $order_info['payment_custom_field'];
			$data['payment_method'] = $order_info['payment_method'];
			$data['payment_code'] = $order_info['payment_code'];

			$data['shipping_firstname'] = $order_info['shipping_firstname'];
			$data['shipping_lastname'] = $order_info['shipping_lastname'];
			$data['shipping_company'] = $order_info['shipping_company'];
			$data['shipping_address_1'] = $order_info['shipping_address_1'];
			$data['shipping_address_2'] = $order_info['shipping_address_2'];
			$data['shipping_city'] = $order_info['shipping_city'];
			$data['shipping_postcode'] = $order_info['shipping_postcode'];
			$data['shipping_country_id'] = $order_info['shipping_country_id'];
			$data['shipping_zone_id'] = $order_info['shipping_zone_id'];
			$data['shipping_custom_field'] = $order_info['shipping_custom_field'];
			$data['shipping_method'] = $order_info['shipping_method'];
			$data['shipping_code'] = $order_info['shipping_code'];

			// Products
			$data['order_products'] = array();

			$products = $this->model_sale_order->getOrderProducts($this->request->get['order_id']);

			foreach ($products as $product) {
				$data['order_products'][] = array(
					'product_id' => $product['product_id'],
					'name'       => $product['name'],
					'model'      => $product['model'],
					'option'     => $this->model_sale_order->getOrderOptions($this->request->get['order_id'], $product['order_product_id']),
					'quantity'   => $product['quantity'],
					'price'      => $product['price'],
					'total'      => $product['total'],
					'reward'     => $product['reward']
				);
			}

			// Vouchers
			$data['order_vouchers'] = $this->model_sale_order->getOrderVouchers($this->request->get['order_id']);

			$data['coupon'] = '';
			$data['voucher'] = '';
			$data['reward'] = '';

			$data['order_totals'] = array();

			$order_totals = $this->model_sale_order->getOrderTotals($this->request->get['order_id']);

			foreach ($order_totals as $order_total) {
				// If coupon, voucher or reward points
				$start = strpos($order_total['title'], '(') + 1;
				$end = strrpos($order_total['title'], ')');

				if ($start && $end) {
					$data[$order_total['code']] = substr($order_total['title'], $start, $end - $start);
				}
			}

			$data['order_status_id'] = $order_info['order_status_id'];
			$data['comment'] = $order_info['comment'];
			$data['affiliate_id'] = $order_info['affiliate_id'];
			$data['affiliate'] = $order_info['affiliate_firstname'] . ' ' . $order_info['affiliate_lastname'];
			$data['currency_code'] = $order_info['currency_code'];
		} else {
			$data['order_id'] = 0;
			$data['store_id'] = 0;
			$data['store_url'] = $this->request->server['HTTPS'] ? HTTPS_CATALOG : HTTP_CATALOG;
			
			$data['customer'] = '';
			$data['customer_id'] = '';
			$data['customer_group_id'] = $this->config->get('config_customer_group_id');
			$data['firstname'] = '';
			$data['lastname'] = '';
			$data['email'] = '';
			$data['telephone'] = '';
			$data['customer_custom_field'] = array();

			$data['addresses'] = array();

			$data['payment_firstname'] = '';
			$data['payment_lastname'] = '';
			$data['payment_company'] = '';
			$data['payment_address_1'] = '';
			$data['payment_address_2'] = '';
			$data['payment_city'] = '';
			$data['payment_postcode'] = '';
			$data['payment_country_id'] = '';
			$data['payment_zone_id'] = '';
			$data['payment_custom_field'] = array();
			$data['payment_method'] = '';
			$data['payment_code'] = '';

			$data['shipping_firstname'] = '';
			$data['shipping_lastname'] = '';
			$data['shipping_company'] = '';
			$data['shipping_address_1'] = '';
			$data['shipping_address_2'] = '';
			$data['shipping_city'] = '';
			$data['shipping_postcode'] = '';
			$data['shipping_country_id'] = '';
			$data['shipping_zone_id'] = '';
			$data['shipping_custom_field'] = array();
			$data['shipping_method'] = '';
			$data['shipping_code'] = '';

			$data['order_products'] = array();
			$data['order_vouchers'] = array();
			$data['order_totals'] = array();

			$data['order_status_id'] = $this->config->get('config_order_status_id');
			$data['comment'] = '';
			$data['affiliate_id'] = '';
			$data['affiliate'] = '';
			$data['currency_code'] = $this->config->get('config_currency');

			$data['coupon'] = '';
			$data['voucher'] = '';
			$data['reward'] = '';
		}

		// Stores
		$this->load->model('setting/store');

		$data['stores'] = array();

		$data['stores'][] = array(
			'store_id' => 0,
			'name'     => $this->language->get('text_default')
		);

		$results = $this->model_setting_store->getStores();

		foreach ($results as $result) {
			$data['stores'][] = array(
				'store_id' => $result['store_id'],
				'name'     => $result['name']
			);
		}

		// Customer Groups
		$this->load->model('customer/customer_group');

		$data['customer_groups'] = $this->model_customer_customer_group->getCustomerGroups();

		// Custom Fields
		$this->load->model('customer/custom_field');

		$data['custom_fields'] = array();

		$filter_data = array(
			'sort'  => 'cf.sort_order',
			'order' => 'ASC'
		);

		$custom_fields = $this->model_customer_custom_field->getCustomFields($filter_data);

		foreach ($custom_fields as $custom_field) {
			$data['custom_fields'][] = array(
				'custom_field_id'    => $custom_field['custom_field_id'],
				'custom_field_value' => $this->model_customer_custom_field->getCustomFieldValues($custom_field['custom_field_id']),
				'name'               => $custom_field['name'],
				'value'              => $custom_field['value'],
				'type'               => $custom_field['type'],
				'location'           => $custom_field['location'],
				'sort_order'         => $custom_field['sort_order']
			);
		}

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		$this->load->model('localisation/country');

		$data['countries'] = $this->model_localisation_country->getCountries();

		$this->load->model('localisation/currency');

		$data['currencies'] = $this->model_localisation_currency->getCurrencies();

		$data['voucher_min'] = $this->config->get('config_voucher_min');

		$this->load->model('sale/voucher_theme');

		$data['voucher_themes'] = $this->model_sale_voucher_theme->getVoucherThemes();

		// API login
		$data['catalog'] = $this->request->server['HTTPS'] ? HTTPS_CATALOG : HTTP_CATALOG;
		
		// API login
		$this->load->model('user/api');

		$api_info = $this->model_user_api->getApi($this->config->get('config_api_id'));

		if ($api_info && $this->user->hasPermission('modify', 'sale/order')) {
			$session = new Session($this->config->get('session_engine'), $this->registry);
			
			$session->start();
					
			$this->model_user_api->deleteApiSessionBySessonId($session->getId());
			
			$this->model_user_api->addApiSession($api_info['api_id'], $session->getId(), $this->request->server['REMOTE_ADDR']);
			
			$session->data['api_id'] = $api_info['api_id'];

			$data['api_token'] = $session->getId();
		} else {
			$data['api_token'] = '';
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('sale/order_form', $data));
	}

	public function info() {
		$this->load->model('sale/order');

		if (isset($this->request->get['order_id'])) {
			$order_id = $this->request->get['order_id'];
		} else {
			$order_id = 0;
		}

		$order_info = $this->model_sale_order->getOrder($order_id);

		if ($order_info) {
			$this->load->language('sale/order');

			$this->document->setTitle($this->language->get('heading_title'));

			$data['text_ip_add'] = sprintf($this->language->get('text_ip_add'), $this->request->server['REMOTE_ADDR']);
			$data['text_order'] = sprintf($this->language->get('text_order'), $this->request->get['order_id']);

			$url = '';

			if (isset($this->request->get['filter_order_id'])) {
				$url .= '&filter_order_id=' . $this->request->get['filter_order_id'];
			}

			if (isset($this->request->get['filter_customer'])) {
				$url .= '&filter_customer=' . urlencode(html_entity_decode($this->request->get['filter_customer'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_order_status'])) {
				$url .= '&filter_order_status=' . $this->request->get['filter_order_status'];
			}
			
			if (isset($this->request->get['filter_order_status_id'])) {
				$url .= '&filter_order_status_id=' . $this->request->get['filter_order_status_id'];
			}
			
			if (isset($this->request->get['filter_total'])) {
				$url .= '&filter_total=' . $this->request->get['filter_total'];
			}

			if (isset($this->request->get['filter_date_added'])) {
				$url .= '&filter_date_added=' . $this->request->get['filter_date_added'];
			}

			if (isset($this->request->get['filter_date_modified'])) {
				$url .= '&filter_date_modified=' . $this->request->get['filter_date_modified'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$data['breadcrumbs'] = array();

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_home'),
				'href' => $this->url->link('common/dashboard', 'user_token=' . $this->session->data['user_token'], true)
			);

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true)
			);

			$data['shipping'] = $this->url->link('sale/order/shipping', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . (int)$this->request->get['order_id'], true);
			$data['invoice'] = $this->url->link('sale/order/invoice', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . (int)$this->request->get['order_id'], true);
			$data['edit'] = $this->url->link('sale/order/edit', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . (int)$this->request->get['order_id'], true);
			$data['cancel'] = $this->url->link('sale/order', 'user_token=' . $this->session->data['user_token'] . $url, true);

			$data['user_token'] = $this->session->data['user_token'];

			$data['order_id'] = $this->request->get['order_id'];

			$data['store_id'] = $order_info['store_id'];
			$data['store_name'] = $order_info['store_name'];
			
			if ($order_info['store_id'] == 0) {
				$data['store_url'] = $this->request->server['HTTPS'] ? HTTPS_CATALOG : HTTP_CATALOG;
			} else {
				$data['store_url'] = $order_info['store_url'];
			}

			if ($order_info['invoice_no']) {
				$data['invoice_no'] = $order_info['invoice_prefix'] . $order_info['invoice_no'];
			} else {
				$data['invoice_no'] = '';
			}

			$data['date_added'] = date($this->language->get('date_format_short'), strtotime($order_info['date_added']));

			$data['firstname'] = $order_info['firstname'];
			$data['lastname'] = $order_info['lastname'];

			if ($order_info['customer_id']) {
				$data['customer'] = $this->url->link('customer/customer/edit', 'user_token=' . $this->session->data['user_token'] . '&customer_id=' . $order_info['customer_id'], true);
			} else {
				$data['customer'] = '';
			}

			$this->load->model('customer/customer_group');

			$customer_group_info = $this->model_customer_customer_group->getCustomerGroup($order_info['customer_group_id']);

			if ($customer_group_info) {
				$data['customer_group'] = $customer_group_info['name'];
			} else {
				$data['customer_group'] = '';
			}

			$data['email'] = $order_info['email'];
			$data['telephone'] = $order_info['telephone'];

			$data['shipping_method'] = $order_info['shipping_method'];
			$data['payment_method'] = $order_info['payment_method'];

			// Payment Address
			if ($order_info['payment_address_format']) {
				$format = $order_info['payment_address_format'];
			} else {
				$format = '{firstname} {lastname}' . "\n" . '{company}' . "\n" . '{address_1}' . "\n" . '{address_2}' . "\n" . '{city} {postcode}' . "\n" . '{zone}' . "\n" . '{country}';
			}

			$find = array(
				'{firstname}',
				'{lastname}',
				'{company}',
				'{address_1}',
				'{address_2}',
				'{city}',
				'{postcode}',
				'{zone}',
				'{zone_code}',
				'{country}'
			);

			$replace = array(
				'firstname' => $order_info['payment_firstname'],
				'lastname'  => $order_info['payment_lastname'],
				'company'   => $order_info['payment_company'],
				'address_1' => $order_info['payment_address_1'],
				'address_2' => $order_info['payment_address_2'],
				'city'      => $order_info['payment_city'],
				'postcode'  => $order_info['payment_postcode'],
				'zone'      => $order_info['payment_zone'],
				'zone_code' => $order_info['payment_zone_code'],
				'country'   => $order_info['payment_country']
			);

			$data['payment_address'] = str_replace(array("\r\n", "\r", "\n"), '<br />', preg_replace(array("/\s\s+/", "/\r\r+/", "/\n\n+/"), '<br />', trim(str_replace($find, $replace, $format))));

			// Shipping Address
			if ($order_info['shipping_address_format']) {
				$format = $order_info['shipping_address_format'];
			} else {
				$format = '{firstname} {lastname}' . "\n" . '{company}' . "\n" . '{address_1}' . "\n" . '{address_2}' . "\n" . '{city} {postcode}' . "\n" . '{zone}' . "\n" . '{country}';
			}

			$find = array(
				'{firstname}',
				'{lastname}',
				'{company}',
				'{address_1}',
				'{address_2}',
				'{city}',
				'{postcode}',
				'{zone}',
				'{zone_code}',
				'{country}'
			);

			$replace = array(
				'firstname' => $order_info['shipping_firstname'],
				'lastname'  => $order_info['shipping_lastname'],
				'company'   => $order_info['shipping_company'],
				'address_1' => $order_info['shipping_address_1'],
				'address_2' => $order_info['shipping_address_2'],
				'city'      => $order_info['shipping_city'],
				'postcode'  => $order_info['shipping_postcode'],
				'zone'      => $order_info['shipping_zone'],
				'zone_code' => $order_info['shipping_zone_code'],
				'country'   => $order_info['shipping_country']
			);

			$data['shipping_address'] = str_replace(array("\r\n", "\r", "\n"), '<br />', preg_replace(array("/\s\s+/", "/\r\r+/", "/\n\n+/"), '<br />', trim(str_replace($find, $replace, $format))));

			// Uploaded files
			$this->load->model('tool/upload');

			$data['products'] = array();

			$products = $this->model_sale_order->getOrderProducts($this->request->get['order_id']);

			foreach ($products as $product) {
				$option_data = array();

				$options = $this->model_sale_order->getOrderOptions($this->request->get['order_id'], $product['order_product_id']);

				foreach ($options as $option) {
					if ($option['type'] != 'file') {
						$option_data[] = array(
							'name'  => $option['name'],
							'value' => $option['value'],
							'type'  => $option['type']
						);
					} else {
						$upload_info = $this->model_tool_upload->getUploadByCode($option['value']);

						if ($upload_info) {
							$option_data[] = array(
								'name'  => $option['name'],
								'value' => $upload_info['name'],
								'type'  => $option['type'],
								'href'  => $this->url->link('tool/upload/download', 'user_token=' . $this->session->data['user_token'] . '&code=' . $upload_info['code'], true)
							);
						}
					}
				}

				$data['products'][] = array(
					'order_product_id' => $product['order_product_id'],
					'product_id'       => $product['product_id'],
					'name'    	 	   => $product['name'],
					'model'    		   => $product['model'],
					'option'   		   => $option_data,
					'quantity'		   => $product['quantity'],
					'price'    		   => $this->currency->format($product['price'] + ($this->config->get('config_tax') ? $product['tax'] : 0), $order_info['currency_code'], $order_info['currency_value']),
					'total'    		   => $this->currency->format($product['total'] + ($this->config->get('config_tax') ? ($product['tax'] * $product['quantity']) : 0), $order_info['currency_code'], $order_info['currency_value']),
					'href'     		   => $this->url->link('catalog/product/edit', 'user_token=' . $this->session->data['user_token'] . '&product_id=' . $product['product_id'], true)
				);
			}

			$data['vouchers'] = array();

			$vouchers = $this->model_sale_order->getOrderVouchers($this->request->get['order_id']);

			foreach ($vouchers as $voucher) {
				$data['vouchers'][] = array(
					'description' => $voucher['description'],
					'amount'      => $this->currency->format($voucher['amount'], $order_info['currency_code'], $order_info['currency_value']),
					'href'        => $this->url->link('sale/voucher/edit', 'user_token=' . $this->session->data['user_token'] . '&voucher_id=' . $voucher['voucher_id'], true)
				);
			}

			$data['totals'] = array();

			$totals = $this->model_sale_order->getOrderTotals($this->request->get['order_id']);

			foreach ($totals as $total) {
				$data['totals'][] = array(
					'title' => $total['title'],
					'text'  => $this->currency->format($total['value'], $order_info['currency_code'], $order_info['currency_value'])
				);
			}

			$data['comment'] = nl2br($order_info['comment']);

			$this->load->model('customer/customer');

			$data['reward'] = $order_info['reward'];

			$data['reward_total'] = $this->model_customer_customer->getTotalCustomerRewardsByOrderId($this->request->get['order_id']);

			$data['affiliate_firstname'] = $order_info['affiliate_firstname'];
			$data['affiliate_lastname'] = $order_info['affiliate_lastname'];

			if ($order_info['affiliate_id']) {
				$data['affiliate'] = $this->url->link('customer/customer/edit', 'user_token=' . $this->session->data['user_token'] . '&customer_id=' . $order_info['affiliate_id'], true);
			} else {
				$data['affiliate'] = '';
			}

			$data['commission'] = $this->currency->format($order_info['commission'], $order_info['currency_code'], $order_info['currency_value']);

			$this->load->model('customer/customer');

			$data['commission_total'] = $this->model_customer_customer->getTotalTransactionsByOrderId($this->request->get['order_id']);

			$this->load->model('localisation/order_status');

			$order_status_info = $this->model_localisation_order_status->getOrderStatus($order_info['order_status_id']);

			if ($order_status_info) {
				$data['order_status'] = $order_status_info['name'];
			} else {
				$data['order_status'] = '';
			}

			$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

			$data['order_status_id'] = $order_info['order_status_id'];

			$data['account_custom_field'] = $order_info['custom_field'];

			// Custom Fields
			$this->load->model('customer/custom_field');

			$data['account_custom_fields'] = array();

			$filter_data = array(
				'sort'  => 'cf.sort_order',
				'order' => 'ASC'
			);

			$custom_fields = $this->model_customer_custom_field->getCustomFields($filter_data);

			foreach ($custom_fields as $custom_field) {
				if ($custom_field['location'] == 'account' && isset($order_info['custom_field'][$custom_field['custom_field_id']])) {
					if ($custom_field['type'] == 'select' || $custom_field['type'] == 'radio') {
						$custom_field_value_info = $this->model_customer_custom_field->getCustomFieldValue($order_info['custom_field'][$custom_field['custom_field_id']]);

						if ($custom_field_value_info) {
							$data['account_custom_fields'][] = array(
								'name'  => $custom_field['name'],
								'value' => $custom_field_value_info['name']
							);
						}
					}

					if ($custom_field['type'] == 'checkbox' && is_array($order_info['custom_field'][$custom_field['custom_field_id']])) {
						foreach ($order_info['custom_field'][$custom_field['custom_field_id']] as $custom_field_value_id) {
							$custom_field_value_info = $this->model_customer_custom_field->getCustomFieldValue($custom_field_value_id);

							if ($custom_field_value_info) {
								$data['account_custom_fields'][] = array(
									'name'  => $custom_field['name'],
									'value' => $custom_field_value_info['name']
								);
							}
						}
					}

					if ($custom_field['type'] == 'text' || $custom_field['type'] == 'textarea' || $custom_field['type'] == 'file' || $custom_field['type'] == 'date' || $custom_field['type'] == 'datetime' || $custom_field['type'] == 'time') {
						$data['account_custom_fields'][] = array(
							'name'  => $custom_field['name'],
							'value' => $order_info['custom_field'][$custom_field['custom_field_id']]
						);
					}

					if ($custom_field['type'] == 'file') {
						$upload_info = $this->model_tool_upload->getUploadByCode($order_info['custom_field'][$custom_field['custom_field_id']]);

						if ($upload_info) {
							$data['account_custom_fields'][] = array(
								'name'  => $custom_field['name'],
								'value' => $upload_info['name']
							);
						}
					}
				}
			}

			// Custom fields
			$data['payment_custom_fields'] = array();

			foreach ($custom_fields as $custom_field) {
				if ($custom_field['location'] == 'address' && isset($order_info['payment_custom_field'][$custom_field['custom_field_id']])) {
					if ($custom_field['type'] == 'select' || $custom_field['type'] == 'radio') {
						$custom_field_value_info = $this->model_customer_custom_field->getCustomFieldValue($order_info['payment_custom_field'][$custom_field['custom_field_id']]);

						if ($custom_field_value_info) {
							$data['payment_custom_fields'][] = array(
								'name'  => $custom_field['name'],
								'value' => $custom_field_value_info['name'],
								'sort_order' => $custom_field['sort_order']
							);
						}
					}

					if ($custom_field['type'] == 'checkbox' && is_array($order_info['payment_custom_field'][$custom_field['custom_field_id']])) {
						foreach ($order_info['payment_custom_field'][$custom_field['custom_field_id']] as $custom_field_value_id) {
							$custom_field_value_info = $this->model_customer_custom_field->getCustomFieldValue($custom_field_value_id);

							if ($custom_field_value_info) {
								$data['payment_custom_fields'][] = array(
									'name'  => $custom_field['name'],
									'value' => $custom_field_value_info['name'],
									'sort_order' => $custom_field['sort_order']
								);
							}
						}
					}

					if ($custom_field['type'] == 'text' || $custom_field['type'] == 'textarea' || $custom_field['type'] == 'file' || $custom_field['type'] == 'date' || $custom_field['type'] == 'datetime' || $custom_field['type'] == 'time') {
						$data['payment_custom_fields'][] = array(
							'name'  => $custom_field['name'],
							'value' => $order_info['payment_custom_field'][$custom_field['custom_field_id']],
							'sort_order' => $custom_field['sort_order']
						);
					}

					if ($custom_field['type'] == 'file') {
						$upload_info = $this->model_tool_upload->getUploadByCode($order_info['payment_custom_field'][$custom_field['custom_field_id']]);

						if ($upload_info) {
							$data['payment_custom_fields'][] = array(
								'name'  => $custom_field['name'],
								'value' => $upload_info['name'],
								'sort_order' => $custom_field['sort_order']
							);
						}
					}
				}
			}

			// Shipping
			$data['shipping_custom_fields'] = array();

			foreach ($custom_fields as $custom_field) {
				if ($custom_field['location'] == 'address' && isset($order_info['shipping_custom_field'][$custom_field['custom_field_id']])) {
					if ($custom_field['type'] == 'select' || $custom_field['type'] == 'radio') {
						$custom_field_value_info = $this->model_customer_custom_field->getCustomFieldValue($order_info['shipping_custom_field'][$custom_field['custom_field_id']]);

						if ($custom_field_value_info) {
							$data['shipping_custom_fields'][] = array(
								'name'  => $custom_field['name'],
								'value' => $custom_field_value_info['name'],
								'sort_order' => $custom_field['sort_order']
							);
						}
					}

					if ($custom_field['type'] == 'checkbox' && is_array($order_info['shipping_custom_field'][$custom_field['custom_field_id']])) {
						foreach ($order_info['shipping_custom_field'][$custom_field['custom_field_id']] as $custom_field_value_id) {
							$custom_field_value_info = $this->model_customer_custom_field->getCustomFieldValue($custom_field_value_id);

							if ($custom_field_value_info) {
								$data['shipping_custom_fields'][] = array(
									'name'  => $custom_field['name'],
									'value' => $custom_field_value_info['name'],
									'sort_order' => $custom_field['sort_order']
								);
							}
						}
					}

					if ($custom_field['type'] == 'text' || $custom_field['type'] == 'textarea' || $custom_field['type'] == 'file' || $custom_field['type'] == 'date' || $custom_field['type'] == 'datetime' || $custom_field['type'] == 'time') {
						$data['shipping_custom_fields'][] = array(
							'name'  => $custom_field['name'],
							'value' => $order_info['shipping_custom_field'][$custom_field['custom_field_id']],
							'sort_order' => $custom_field['sort_order']
						);
					}

					if ($custom_field['type'] == 'file') {
						$upload_info = $this->model_tool_upload->getUploadByCode($order_info['shipping_custom_field'][$custom_field['custom_field_id']]);

						if ($upload_info) {
							$data['shipping_custom_fields'][] = array(
								'name'  => $custom_field['name'],
								'value' => $upload_info['name'],
								'sort_order' => $custom_field['sort_order']
							);
						}
					}
				}
			}

			$data['ip'] = $order_info['ip'];
			$data['forwarded_ip'] = $order_info['forwarded_ip'];
			$data['user_agent'] = $order_info['user_agent'];
			$data['accept_language'] = $order_info['accept_language'];

			// Additional Tabs
			$data['tabs'] = array();

			if ($this->user->hasPermission('access', 'extension/payment/' . $order_info['payment_code'])) {
				if (is_file(DIR_CATALOG . 'controller/extension/payment/' . $order_info['payment_code'] . '.php')) {
					$content = $this->load->controller('extension/payment/' . $order_info['payment_code'] . '/order');
				} else {
					$content = '';
				}

				if ($content) {
					$this->load->language('extension/payment/' . $order_info['payment_code']);

					$data['tabs'][] = array(
						'code'    => $order_info['payment_code'],
						'title'   => $this->language->get('heading_title'),
						'content' => $content
					);
				}
			}

			$this->load->model('setting/extension');

			$extensions = $this->model_setting_extension->getInstalled('fraud');

			foreach ($extensions as $extension) {
				if ($this->config->get('fraud_' . $extension . '_status')) {
					$this->load->language('extension/fraud/' . $extension, 'extension');

					$content = $this->load->controller('extension/fraud/' . $extension . '/order');

					if ($content) {
						$data['tabs'][] = array(
							'code'    => $extension,
							'title'   => $this->language->get('extension')->get('heading_title'),
							'content' => $content
						);
					}
				}
			}
			
			// The URL we send API requests to
			$data['catalog'] = $this->request->server['HTTPS'] ? HTTPS_CATALOG : HTTP_CATALOG;
			
			// API login
			$this->load->model('user/api');

			$api_info = $this->model_user_api->getApi($this->config->get('config_api_id'));

			if ($api_info && $this->user->hasPermission('modify', 'sale/order')) {
				$session = new Session($this->config->get('session_engine'), $this->registry);
				
				$session->start();
				
				$this->model_user_api->deleteApiSessionBySessonId($session->getId());
				
				$this->model_user_api->addApiSession($api_info['api_id'], $session->getId(), $this->request->server['REMOTE_ADDR']);
				
				$session->data['api_id'] = $api_info['api_id'];

				$data['api_token'] = $session->getId();
			} else {
				$data['api_token'] = '';
			}

			$data['header'] = $this->load->controller('common/header');
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['footer'] = $this->load->controller('common/footer');


				// check weather customer invoice print module is enable or not
			$successMsg = '';
			$errorMsg = '';
			if(@$this->session->data['success_msg']) {
				$successMsg = $this->session->data['success_msg'];
				unset($this->session->data['success_msg']);
			}
			if(@$this->session->data['success']){
				$successMsg.= "<br>".$this->session->data['success'];
				unset($this->session->data['success']);
			}
			if(@$this->session->data['error']){
				$errorMsg = $this->session->data['error'];
				unset($this->session->data['error']);
			}
			$data['success_msg'] = $successMsg;
			$data['error_msg'] = $errorMsg;
			
			if($this->config->get('delhivery_lastmile_auto_manifest')){
			$this->load->model('extension/module/manageawb');
			$getLocationData = $this->model_extension_module_manageawb->getDelhiveryLastmileAllLocations();
			$locationOptions = '';
			foreach($getLocationData as $_locationData){
				$locationOptions.= '<option value="'.$_locationData['values'].'">'.$_locationData['label'].'</option>';
			}
			
			$locationData = '<div class="form-group">
                  <label class="col-sm-2 control-label" for="input-delhivery_lastmile_location">Select Location</label>
                  <div class="col-sm-4">
                    <select name="delhivery_lastmile_location"  required="true" id="input-delhivery_lastmile_location" class="form-control required">
						<option value=""></option>
						'.$locationOptions.'
                    </select>
                  </div>
                </div>';
			}else{
				$locationData = '';
			}
			
			if($this->config->get('delhivery_lastmile_status') and $this->config->get("delhivery_lastmile_carrier_title")!='')	{
				$data['awbGenerateUrl'] = $this->url->link('extension/module/manageawb/generateAwbs', 'order_id=' . $this->request->get['order_id'], true);
				$data['tabs'][] = array(
							'code'    => 'delhivery-lastmiles',
							'title'   => 'Delhivery Lastmile',
							'content' => '<fieldset>
					  <legend>Assign Delhivery Lastmile Tracking</legend>
					  <form method="post" action="'.$this->url->link('extension/module/manageawb/saveTrackingInformation').'&user_token='.$this->session->data['user_token'].'" class="form-horizontal">
						<input type="hidden" name="order_id" value="'.$this->request->get['order_id'].'" />
						<div class="form-group">
						  <label class="col-sm-2 control-label" for="input-delhivery-lastmile">Select Carrier</label>
						  <div class="col-sm-4">
							<select required="true" name="order_delhivery_lastmile" id="input-delhivery-lastmile" class="form-control required">
								<option value=""></option>
								<option value="delhivery_lastmile">'.$this->config->get("delhivery_lastmile_carrier_title").'</option>
							</select>
						  </div>
						</div>
						<div class="form-group">
						  <label class="col-sm-2 control-label" for="input-awbdata">AWB</label>
						  <div class="col-sm-4">
							<input type="text" name="awbs" class="form-control required" readonly="readonly" required="true" value="" id="input-awbdata">
						  </div>
						</div>
						'.$locationData.'
						<div class="text-right">
							<button type="submit" id="button-dhlawb" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-plus-circle"></i> Assign Tracking</button>
							
							<button type="button" id="button-popupCalculation" data-loading-text="Loading..." class="btn btn-primary"><i class="fa fa-truck"></i> Calculate Shipping Charges</button>
						</div>
					  </form>
					</fieldset>
					<div class="shipping_calculation_data" id="popupForCalculation" style="display:none;">
						<div class="popup-content-area">
						<a class="close closeCalculationPopup" href="javascript:;void(0)">&times;</a>
							<h3>Shipping Charges</h3>
							<div class="shipping_calculate_form">
								<fieldset>
									<form id="ship_calculation" class="form-horizontal">
										<div class="form-group custom_form_field_section">
											<label class="col-sm-7 control-label" for="ship_md">Billing mode of shipment(md)</label>
											<div class="col-sm-4">
												<select  name="md" id="ship_md" class="form-control">
													<option value="">Select</option>
													<option value="E">E</option>
													<option value="S">S</option>
												</select>
											</div>
										</div>
										<div class="form-group custom_form_field_section">
											<label class="col-sm-8 control-label" for="ship_pt">Payment type of shipment(pt)</label>
											<div class="col-sm-4">
												<select name="pt" id="ship_pt" class="form-control">
													<option value="">Select</option>
													<option value="COD">COD</option>
													<option value="Pre-paid">Pre-paid</option>
												</select>
											</div>
										</div>
										<div style="width: 100%;border-bottom: 1px solid #f3eded;float: left;"></div>
										<div class="form-group custom_form_field_section">
											<label class="col-sm-7 control-label" for="ship_ss">Delivery status of shipment(ss)</label>
											<div class="col-sm-4">
												<select name="ss" id="ship_ss" class="form-control">
													<option value="">Select</option>
													<option value="Delivered">Delivered</option>
													<option value="RTO">RTO</option>
													<option value="DTO">DTO</option>
												</select>
											</div>
										</div>
										<div class="form-group custom_form_field_section">
											<label style="padding-top:0px;" class="col-sm-8 control-label" for="ship_cgm">Chargeable weight of shipment (cgm)</label>
											<div class="col-sm-4">
												<input type="text" name="cgm" id="ship_cgm" class="form-control" value="" />
											</div>
										</div>
										<div style="width: 100%;border-bottom: 1px solid #f3eded;float: left;"></div>
										<div class="form-group custom_form_field_section">
											<label class="col-sm-7 control-label" for="ship_cgm">Postcode of Origin center(oc)</label>
											<div class="col-sm-4">
												<input type="text" name="oc" id="ship_oc" class="form-control" value="" />
											</div>
										</div>
								
										<button type="button" id="button-calculate" data-loading-text="Loading..." class="btn btn-primary" style="margin: 7px 10%;"><i class="fa fa-truck"></i> Calculate Shipping Charges</button>
										<div style="width: 100%;border-bottom: 1px solid #f3eded;float: left;"></div>
									</form>
								</fieldset>
							</div>
							<div class="shipping_calculate_response_data">
							</div>
						</div>
					</div>
					
					<script type="text/javascript">
					
					$("#button-calculate").on("click", function() {
						var urlsS ="'.$this->url->link('extension/module/manageawb/shippingCalculation', 'user_token=' . $this->request->get['order_id'], true).'&user_token='.$this->session->data['user_token'].'";
						var orderId = "'.$this->request->get['order_id'].'";
						$.ajax({
							url: urlsS,
							type: "post",
							data: {order_id:orderId,md:$("#ship_md").val(),pt: $("#ship_pt").val(),ss: $("#ship_ss").val(),cgm:$("#ship_cgm").val(),oc:$("#ship_oc").val()},
							beforeSend: function() {
								$("#button-calculate").button("loading");
							},
							complete: function() {
								$("#button-calculate").button("reset");
								//alert("Complete");
							},
							success: function(json) {
								$(".shipping_calculate_response_data").html(json);
							},
							error: function(xhr, ajaxOptions, thrownError) {
								alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
							}
						});
					});
					$("#button-popupCalculation").on("click", function() {
						$("#popupForCalculation").show(200);
					});
					
					$(".closeCalculationPopup").on("click", function() {
						$(".shipping_calculate_response_data").html("");
						$("#popupForCalculation").hide(200);
					});
					
					$("#input-delhivery-lastmile").on("change", function() {
						if($(this).val()=="delhivery_lastmile"){
							var urls ="'.$this->url->link('extension/module/manageawb/generateAwbs', 'user_token=' . $this->request->get['order_id'], true).'&user_token='.$this->session->data['user_token'].'";
							var orderId = "'.$this->request->get['order_id'].'";
							$.ajax({
								url: urls,
								type: "post",
								//dataType: "json",
								data: "order_id=" + orderId,
								beforeSend: function() {
									$("#button-dhlawb").button("loading");
								},
								complete: function() {
									$("#button-dhlawb").button("reset");
									//alert("Complete");
								},
								success: function(json) {
									var splitData = json.split("@");
									if(splitData[0]=="success"){
										$("#input-awbdata").val(splitData[1]);
									}else{
										$("#input-awbdata").val("");
										alert(splitData[1]);
									}
								},
								error: function(xhr, ajaxOptions, thrownError) {
									alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
								}
							});
						}else{$("#input-awbdata").val("");}
					});
					</script>
					<style>
						.shipping_calculation_data{
							position: fixed;
							top: 0;
							bottom: 0;
							left: 0;
							right: 0;
							background: rgba(0, 0, 0, 0.7);
							transition: opacity 500ms;
							z-index: 99999;
							overflow-y:scroll;
						}
						.popup-content-area {
							margin: 40px auto 0px;
							padding: 10px 20px;
							background: #fff;
							border-radius: 5px;
							width: 60%;
							position: relative;
							transition: all 5s ease-in-out;
						}
						.popup-content-area h3{
							border-bottom: 2px solid #05659a;
							padding-bottom: 10px;
						}
						.popup-content-area .close {
							position: absolute;
							top: 7px;
							right: 20px;
							transition: all 200ms;
							font-size: 30px;
							font-weight: bold;
							text-decoration: none;
							color: #333;
						}
						.form-group.custom_form_field_section {
							width: 47%;
							float: left;
						}
						.form-group.custom_form_field_section .col-sm-4 {
							padding-left:0px;
							padding-right: 0px;
						}
						.form-group.custom_form_field_section .col-sm-7.control-label,.form-group.custom_form_field_section .col-sm-8.control-label {
							padding-right:5px;
							padding-left:0px;
						}
						.form-group + .form-group {
							border-top: none;
						}
						.shipping_calculate_form .form-horizontal .form-group {
							margin-left: 0px;
							margin-right: 0px;
						}
						.shipping_calculate_form .form-group {
							padding-top: 7px;
							padding-bottom: 7px;
							margin-bottom: 0;
						}
						@media screen and (max-width: 700px){
							.popup-content-area{
								width: 100%;
								padding:20px 5px;
							}
						}
					</style>
				');
			
			}			
			 
			$this->response->setOutput($this->load->view('sale/order_info', $data));
		} else {
			return new Action('error/not_found');
		}
	}
	
	protected function validate() {
		if (!$this->user->hasPermission('modify', 'sale/order')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		return !$this->error;
	}
	
	public function createInvoiceNo() {
		$this->load->language('sale/order');

		$json = array();

		if (!$this->user->hasPermission('modify', 'sale/order')) {
			$json['error'] = $this->language->get('error_permission');
		} elseif (isset($this->request->get['order_id'])) {
			if (isset($this->request->get['order_id'])) {
				$order_id = $this->request->get['order_id'];
			} else {
				$order_id = 0;
			}

			$this->load->model('sale/order');

			$invoice_no = $this->model_sale_order->createInvoiceNo($order_id);

			if ($invoice_no) {
				$json['invoice_no'] = $invoice_no;
			} else {
				$json['error'] = $this->language->get('error_action');
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function addReward() {
		$this->load->language('sale/order');

		$json = array();

		if (!$this->user->hasPermission('modify', 'sale/order')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			if (isset($this->request->get['order_id'])) {
				$order_id = $this->request->get['order_id'];
			} else {
				$order_id = 0;
			}

			$this->load->model('sale/order');

			$order_info = $this->model_sale_order->getOrder($order_id);

			if ($order_info && $order_info['customer_id'] && ($order_info['reward'] > 0)) {
				$this->load->model('customer/customer');

				$reward_total = $this->model_customer_customer->getTotalCustomerRewardsByOrderId($order_id);

				if (!$reward_total) {
					$this->model_customer_customer->addReward($order_info['customer_id'], $this->language->get('text_order_id') . ' #' . $order_id, $order_info['reward'], $order_id);
				}
			}

			$json['success'] = $this->language->get('text_reward_added');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function removeReward() {
		$this->load->language('sale/order');

		$json = array();

		if (!$this->user->hasPermission('modify', 'sale/order')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			if (isset($this->request->get['order_id'])) {
				$order_id = $this->request->get['order_id'];
			} else {
				$order_id = 0;
			}

			$this->load->model('sale/order');

			$order_info = $this->model_sale_order->getOrder($order_id);

			if ($order_info) {
				$this->load->model('customer/customer');

				$this->model_customer_customer->deleteReward($order_id);
			}

			$json['success'] = $this->language->get('text_reward_removed');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function addCommission() {
		$this->load->language('sale/order');

		$json = array();

		if (!$this->user->hasPermission('modify', 'sale/order')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			if (isset($this->request->get['order_id'])) {
				$order_id = $this->request->get['order_id'];
			} else {
				$order_id = 0;
			}

			$this->load->model('sale/order');

			$order_info = $this->model_sale_order->getOrder($order_id);

			if ($order_info) {
				$this->load->model('customer/customer');

				$affiliate_total = $this->model_customer_customer->getTotalTransactionsByOrderId($order_id);

				if (!$affiliate_total) {
					$this->model_marketing_affiliate->addTransaction($order_info['affiliate_id'], $this->language->get('text_order_id') . ' #' . $order_id, $order_info['commission'], $order_id);
				}
			}

			$json['success'] = $this->language->get('text_commission_added');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function removeCommission() {
		$this->load->language('sale/order');

		$json = array();

		if (!$this->user->hasPermission('modify', 'sale/order')) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			if (isset($this->request->get['order_id'])) {
				$order_id = $this->request->get['order_id'];
			} else {
				$order_id = 0;
			}

			$this->load->model('sale/order');

			$order_info = $this->model_sale_order->getOrder($order_id);

			if ($order_info) {
				$this->load->model('customer/customer');

				$this->model_customer_customer->deleteTransactionByOrderId($order_id);
			}

			$json['success'] = $this->language->get('text_commission_removed');
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function history() {
		$this->load->language('sale/order');

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$data['histories'] = array();

		$this->load->model('sale/order');

		$results = $this->model_sale_order->getOrderHistories($this->request->get['order_id'], ($page - 1) * 10, 10);

		foreach ($results as $result) {
			$data['histories'][] = array(
				'notify'     => $result['notify'] ? $this->language->get('text_yes') : $this->language->get('text_no'),
				'status'     => $result['status'],
				'comment'    => nl2br($result['comment']),
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
			);
		}

		$history_total = $this->model_sale_order->getTotalOrderHistories($this->request->get['order_id']);

		$pagination = new Pagination();
		$pagination->total = $history_total;
		$pagination->page = $page;
		$pagination->limit = 10;
		$pagination->url = $this->url->link('sale/order/history', 'user_token=' . $this->session->data['user_token'] . '&order_id=' . $this->request->get['order_id'] . '&page={page}', true);

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($history_total) ? (($page - 1) * 10) + 1 : 0, ((($page - 1) * 10) > ($history_total - 10)) ? $history_total : ((($page - 1) * 10) + 10), $history_total, ceil($history_total / 10));

		$this->response->setOutput($this->load->view('sale/order_history', $data));
	}

	public function invoice() {
		$this->load->language('sale/order');

		$data['title'] = $this->language->get('text_invoice');

		if ($this->request->server['HTTPS']) {
			$data['base'] = HTTPS_SERVER;
		} else {
			$data['base'] = HTTP_SERVER;
		}

		$data['direction'] = $this->language->get('direction');
		$data['lang'] = $this->language->get('code');

		$this->load->model('sale/order');

		$this->load->model('setting/setting');

		$data['orders'] = array();

		$orders = array();

		if (isset($this->request->post['selected'])) {
			$orders = $this->request->post['selected'];
		} elseif (isset($this->request->get['order_id'])) {
			$orders[] = $this->request->get['order_id'];
		}

		foreach ($orders as $order_id) {
			$order_info = $this->model_sale_order->getOrder($order_id);

			if ($order_info) {
				$store_info = $this->model_setting_setting->getSetting('config', $order_info['store_id']);

				if ($store_info) {
					$store_address = $store_info['config_address'];
					$store_email = $store_info['config_email'];
					$store_telephone = $store_info['config_telephone'];
					$store_fax = $store_info['config_fax'];
				} else {
					$store_address = $this->config->get('config_address');
					$store_email = $this->config->get('config_email');
					$store_telephone = $this->config->get('config_telephone');
					$store_fax = $this->config->get('config_fax');
				}

				if ($order_info['invoice_no']) {
					$invoice_no = $order_info['invoice_prefix'] . $order_info['invoice_no'];
				} else {
					$invoice_no = '';
				}

				if ($order_info['payment_address_format']) {
					$format = $order_info['payment_address_format'];
				} else {
					$format = '{firstname} {lastname}' . "\n" . '{company}' . "\n" . '{address_1}' . "\n" . '{address_2}' . "\n" . '{city} {postcode}' . "\n" . '{zone}' . "\n" . '{country}';
				}

				$find = array(
					'{firstname}',
					'{lastname}',
					'{company}',
					'{address_1}',
					'{address_2}',
					'{city}',
					'{postcode}',
					'{zone}',
					'{zone_code}',
					'{country}'
				);

				$replace = array(
					'firstname' => $order_info['payment_firstname'],
					'lastname'  => $order_info['payment_lastname'],
					'company'   => $order_info['payment_company'],
					'address_1' => $order_info['payment_address_1'],
					'address_2' => $order_info['payment_address_2'],
					'city'      => $order_info['payment_city'],
					'postcode'  => $order_info['payment_postcode'],
					'zone'      => $order_info['payment_zone'],
					'zone_code' => $order_info['payment_zone_code'],
					'country'   => $order_info['payment_country']
				);

				$payment_address = str_replace(array("\r\n", "\r", "\n"), '<br />', preg_replace(array("/\s\s+/", "/\r\r+/", "/\n\n+/"), '<br />', trim(str_replace($find, $replace, $format))));

				if ($order_info['shipping_address_format']) {
					$format = $order_info['shipping_address_format'];
				} else {
					$format = '{firstname} {lastname}' . "\n" . '{company}' . "\n" . '{address_1}' . "\n" . '{address_2}' . "\n" . '{city} {postcode}' . "\n" . '{zone}' . "\n" . '{country}';
				}

				$find = array(
					'{firstname}',
					'{lastname}',
					'{company}',
					'{address_1}',
					'{address_2}',
					'{city}',
					'{postcode}',
					'{zone}',
					'{zone_code}',
					'{country}'
				);

				$replace = array(
					'firstname' => $order_info['shipping_firstname'],
					'lastname'  => $order_info['shipping_lastname'],
					'company'   => $order_info['shipping_company'],
					'address_1' => $order_info['shipping_address_1'],
					'address_2' => $order_info['shipping_address_2'],
					'city'      => $order_info['shipping_city'],
					'postcode'  => $order_info['shipping_postcode'],
					'zone'      => $order_info['shipping_zone'],
					'zone_code' => $order_info['shipping_zone_code'],
					'country'   => $order_info['shipping_country']
				);

				$shipping_address = str_replace(array("\r\n", "\r", "\n"), '<br />', preg_replace(array("/\s\s+/", "/\r\r+/", "/\n\n+/"), '<br />', trim(str_replace($find, $replace, $format))));

				$this->load->model('tool/upload');

				$product_data = array();

				$products = $this->model_sale_order->getOrderProducts($order_id);

				foreach ($products as $product) {
					$option_data = array();

					$options = $this->model_sale_order->getOrderOptions($order_id, $product['order_product_id']);

					foreach ($options as $option) {
						if ($option['type'] != 'file') {
							$value = $option['value'];
						} else {
							$upload_info = $this->model_tool_upload->getUploadByCode($option['value']);

							if ($upload_info) {
								$value = $upload_info['name'];
							} else {
								$value = '';
							}
						}

						$option_data[] = array(
							'name'  => $option['name'],
							'value' => $value
						);
					}

					$product_data[] = array(
						'name'     => $product['name'],
						'model'    => $product['model'],
						'option'   => $option_data,
						'quantity' => $product['quantity'],
						'price'    => $this->currency->format($product['price'] + ($this->config->get('config_tax') ? $product['tax'] : 0), $order_info['currency_code'], $order_info['currency_value']),
						'total'    => $this->currency->format($product['total'] + ($this->config->get('config_tax') ? ($product['tax'] * $product['quantity']) : 0), $order_info['currency_code'], $order_info['currency_value'])
					);
				}

				$voucher_data = array();

				$vouchers = $this->model_sale_order->getOrderVouchers($order_id);

				foreach ($vouchers as $voucher) {
					$voucher_data[] = array(
						'description' => $voucher['description'],
						'amount'      => $this->currency->format($voucher['amount'], $order_info['currency_code'], $order_info['currency_value'])
					);
				}

				$total_data = array();

				$totals = $this->model_sale_order->getOrderTotals($order_id);

				foreach ($totals as $total) {
					$total_data[] = array(
						'title' => $total['title'],
						'text'  => $this->currency->format($total['value'], $order_info['currency_code'], $order_info['currency_value'])
					);
				}

				$data['orders'][] = array(
					'order_id'	       => $order_id,
					'invoice_no'       => $invoice_no,
					'date_added'       => date($this->language->get('date_format_short'), strtotime($order_info['date_added'])),
					'store_name'       => $order_info['store_name'],
					'store_url'        => rtrim($order_info['store_url'], '/'),
					'store_address'    => nl2br($store_address),
					'store_email'      => $store_email,
					'store_telephone'  => $store_telephone,
					'store_fax'        => $store_fax,
					'email'            => $order_info['email'],
					'telephone'        => $order_info['telephone'],
					'shipping_address' => $shipping_address,
					'shipping_method'  => $order_info['shipping_method'],
					'payment_address'  => $payment_address,
					'payment_method'   => $order_info['payment_method'],
					'product'          => $product_data,
					'voucher'          => $voucher_data,
					'total'            => $total_data,
					'comment'          => nl2br($order_info['comment'])
				);
			}
		}

		$this->response->setOutput($this->load->view('sale/order_invoice', $data));
	}


    			public function jnt() {

    				$this->load->language('sale/order');

					$this->document->setTitle($this->language->get('heading_title'));

					$this->load->model('sale/order');

					$this->load->model('catalog/product');

					$this->load->model('setting/setting');

					$orders = array();
					$merge = array();
					$reasons = array();
					$warning = array();

					if (isset($this->request->post['selected'])) {
						$orders = $this->request->post['selected'];
					} elseif (isset($this->request->get['order_id'])) {
						$orders[] = $this->request->get['order_id'];
					}
					
					foreach ($orders as $order_id) {

						$tracking = $this->model_sale_order->getJntTracking($order_id);

						if ( $tracking == "" ) {
							$order_info = $this->model_sale_order->getOrder($order_id);

							$receiver = array(
								'receiver_name'		=> $order_info['shipping_firstname'].' '.$order_info['shipping_lastname'],
								'receiver_phone'	=> $order_info['telephone'],
								'receiver_addr'		=> implode(" ",array(
															$order_info['shipping_address_1'], 
															$order_info['shipping_address_2'], 
															$order_info['shipping_city'],
															$order_info['shipping_postcode'],
														)),
								'receiver_zip'		=> $order_info['shipping_postcode'],
							);

							if ($order_info) {
								$store_info = $this->model_setting_setting->getSetting('config', $order_info['store_id']);

								if ($store_info) {
									$store_name = $store_info['config_name'];
									$store_address = $store_info['config_address'];
									$store_telephone = $store_info['config_telephone'];
								} else {
									$store_name = $this->config->get('config_name');
									$store_address = $this->config->get('config_address');
									$store_telephone = $this->config->get('config_telephone');
								}

								preg_match('/[0-9]{5}/', $store_address, $matches);
								$postcode = isset($matches[0]) ? $matches[0] : "";
								$cuscode = $this->model_setting_setting->getSettingValue('shipping_jnt_vip_code', $order_info['store_id']);
								$cuspass = $this->model_setting_setting->getSettingValue('shipping_jnt_vip_pass', $order_info['store_id']);

								$sender = array(
									'sender_name'	=> $store_name,
									'sender_phone'	=> $store_telephone,
									'sender_addr'	=> $store_address,
									'sender_zip'	=> $postcode,
									'cuscode'		=> $cuscode,
									'password'		=> $cuspass,
								);

								$products = $this->model_sale_order->getOrderProducts($order_id);
								$item_name = '';

								foreach($products as $product) {
									$item_name .= $product['quantity'].' X '.$product['name'].', ';
								}

								$weight = $this->model_sale_order->getOrderWeight($order_id);
								$weight = json_decode($weight, true);

								if ($weight['weight'] <= '0') {
									$weight = 0.1;
								} else {
									if ($weight['unit'] == 'kg') {
										$weight = $weight['weight'];
									} else if ( $weight['unit'] == 'g') {
										$weight = $weight['weight'] / 1000;
										if ($weight <= 0.01) {
											$weight = 0.01;
										}
									}
								}

								$servicetype = $this->model_setting_setting->getSettingValue('shipping_jnt_service_type', $order_info['store_id']);

								$items = array(
									'id'			=> $order_id,
									'orderid'		=> date('ymdHi').str_pad($order_id, 6, 0, STR_PAD_LEFT),
									'weight'		=> number_format($weight, 2),
									'item'			=> substr($item_name, 0, -2),
									'qty'			=> '1',
									'payType'		=> 'PP_PM',
									'goodsType'		=> 'PARCEL',
									'servicetype'	=> $servicetype,
									'expresstype'	=> 'EZ',
								);

								array_push($merge, array_merge($sender, $receiver, $items));
								$result = $this->model_sale_order->pushOrdertoJnt($merge);

								$res = json_decode($result);

								foreach( $res->detail as $d) {
									$awb = isset($d->awb_no) ? $d->awb_no : '';
						    		$orderno = isset($d->orderid) ? $d->orderid : '';
						    		$status = isset($d->status) ? $d->status : '';
						    		$code = isset($d->data->code) ? $d->data->code : '';
						    		$reason = isset($d->reason) ? $d->reason : '';
								}

								if ($awb) {
									$this->model_sale_order->addJntInfo($order_id, $awb, $orderno, $code);
								} else {
									array_push($reasons, array('id'=>$order_id, 'reason'=> $reason));
								}
								
							}
						} else {
							array_push($reasons, array('id'=>$order_id, 'reason'=> "Already Order"));
						}

					}
					
					if (!empty($reasons)) {
						$warning = json_encode($reasons);
						$this->error['warning'] = $warning;
					} 
						
					$this->getList();
					
			    }

			    public function print_jnt() {

			    	$this->load->model('sale/order');

					$this->load->model('catalog/product');

					$this->load->model('setting/setting');

					$orders = array();
					$awbs = array();

					if (isset($this->request->post['selected'])) {
						$orders = $this->request->post['selected'];
					} elseif (isset($this->request->get['order_id'])) {
						$orders[] = $this->request->get['order_id'];
					}

					foreach ($orders as $order_id) {
						$awb = $this->model_sale_order->getJntTracking($order_id);
						$order_info = $this->model_sale_order->getOrder($order_id);

						if ( $awb != "" ) {
							array_push($awbs, $awb);
						}
					}

					$cuscode = $this->model_setting_setting->getSettingValue('shipping_jnt_vip_code', $order_info['store_id']);
					$awbs = implode(",", $awbs);
					
					$print = $this->model_sale_order->printJntConsignment($awbs, $cuscode);
			    }

			    public function print_jnt_a4() {

			    	$this->load->model('sale/order');

					$this->load->model('catalog/product');

					$this->load->model('setting/setting');

					$orders = array();
					$awbs = array();

					if (isset($this->request->post['selected'])) {
						$orders = $this->request->post['selected'];
					} elseif (isset($this->request->get['order_id'])) {
						$orders[] = $this->request->get['order_id'];
					}

					foreach ($orders as $order_id) {
						$awb = $this->model_sale_order->getJntTracking($order_id);
						$order_info = $this->model_sale_order->getOrder($order_id);

						if ( $awb != "" ) {
							array_push($awbs, $awb);
						}
					}

					$cuscode = $this->model_setting_setting->getSettingValue('shipping_jnt_vip_code', $order_info['store_id']);
					$awbs = implode(",", $awbs);

					$print = $this->model_sale_order->printJntConsignmenta4($awbs, $cuscode);

			    }

			    public function print_jnt_item() {

			    	$this->load->model('sale/order');

					$this->load->model('catalog/product');

					$this->load->model('setting/setting');

					$orders = array();
					$awbs = array();

					if (isset($this->request->post['selected'])) {
						$orders = $this->request->post['selected'];
					} elseif (isset($this->request->get['order_id'])) {
						$orders[] = $this->request->get['order_id'];
					}

					foreach ($orders as $order_id) {
						$awb = $this->model_sale_order->getJntTracking($order_id);
						$order_info = $this->model_sale_order->getOrder($order_id);

						if ( $awb != "" ) {
							$sixcode = $this->model_sale_order->getJntCode($order_id);

							if ($order_info) {
								$store_info = $this->model_setting_setting->getSetting('config', $order_info['store_id']);

								if ($store_info) {
									$store_name = $store_info['config_name'];
									$store_address = $store_info['config_address'];
									$store_telephone = $store_info['config_telephone'];
								} else {
									$store_name = $this->config->get('config_name');
									$store_address = $this->config->get('config_address');
									$store_telephone = $this->config->get('config_telephone');
								}

								preg_match('/[0-9]{5}/', $store_address, $matches);
								$postcode = isset($matches[0]) ? $matches[0] : "";

								$products = $this->model_sale_order->getOrderProducts($order_id);
								$item_name = array();

								foreach($products as $product) {
									$item_name[] = $product['name'].' '.$product['quantity'];
								}

								$weight = $this->model_sale_order->getOrderWeight($order_id);
								$weight = json_decode($weight, true);

								if ($weight['weight'] <= '0') {
									$weight = 0.1;
								} else {
									if ($weight['unit'] == 'kg') {
										$weight = number_format($weight['weight'], 2);
									} else if ( $weight['unit'] == 'g') {
										$weight = number_format($weight['weight'] / 1000, 2);
										if ($weight <= 0.01) {
											$weight = 0.01;
										}
									}
								}

								echo '
									<html>
									<head>
									<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
									<style type="text/css">
										body, html {
											margin: 0;
											padding: 0;
											box-sizing: border-box;
											font-family: "Roboto", sans-serif;
										}

										.container {
											height: 680px;
											width: 374px;
											border: 1px solid black;
											margin: 0 auto;
											display: grid;
											grid-template-columns: 1fr;
											grid-template-rows: 0.8fr 1.2fr 1.2fr;
											grid-template-areas: 
												"receiverCopy"
												"dispatcherCopy"
												"senderCopy";
										}

										#receiverCopy {
											grid-area: receiverCopy;
											border-bottom: 1px dotted black;
											display: grid;
											grid-template-columns: 1fr;
											grid-template-rows: 0.5fr 1fr 1fr 0.1fr;
											grid-template-areas: 
												"receiverCopyRow1"
												"receiverCopyRow2"
												"receiverCopyRow3"
												"receiverCopyRow4";
										}

										#receiverCopyRow1 {
											grid-area: receiverCopyRow1;
											display: grid;
											grid-template-columns: 1fr 0.5fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"receiverRow1barcode receiverRow1AwbNo";
											border-bottom: 1px solid black;
										}
										#receiverRow1barcode {
											grid-area: receiverRow1barcode;
											display: flex;
											align-items: flex-end;
											justify-content: flex-end;
										}
										#receiverRow1AwbNo {
											grid-area: receiverRow1AwbNo;
											display: flex;
											align-items: flex-end;
											justify-content: flex-end;
										}

										#receiverRow1barcode img {
											max-width: 80%;
										}

										#receiverCopyRow2 {
											grid-area: receiverCopyRow2;
											display: grid;
											grid-template-columns: 0.2fr 1fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"receiverCopyRow2Postcode receiverCopyRow2Details";
											border-bottom: 1px solid black;
										}
										#receiverCopyRow2Postcode {
											grid-area: receiverCopyRow2Postcode;
											border-right: 1px solid black;
											display: grid;
											grid-template-columns: 1fr;
											grid-template-rows: 1fr 1fr;
											grid-template-areas: 
												"PostcodeTo"
												"PostcodeNo";
											justify-items: center;
										}
										.PostcodeTo {
											grid-area: PostcodeTo;
											font-weight: bold;
										}
										.PostcodeNo {
											grid-area: PostcodeNo;
										}
										#receiverCopyRow2Details {
											grid-area: receiverCopyRow2Details;
											display: grid;
											grid-template-columns: 1fr 0.3fr;
											grid-template-rows: 0.5fr 1fr;
											grid-template-areas: 
												"DetailsName DetailsPhone"
												"DetailsAddress DetailsPhone";
											font-size: 12px;
										}

										.DetailsName {
											grid-area: DetailsName;
											overflow: hidden;
										}
										.DetailsPhone {
											grid-area: DetailsPhone;
										}
										.DetailsAddress {
											grid-area: DetailsAddress;
											overflow: hidden;
										}

										#receiverCopyRow3 {
											grid-area: receiverCopyRow3;
											display: grid;
											grid-template-columns: 0.2fr 1fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"awbInfoPostcode awbInfoDetails";
											border-bottom: 1px solid black;
										}
										.awbInfoPostcode {
											grid-area: awbInfoPostcode;
											border-right: 1px solid black;
											display: grid;
											grid-template-columns: 1fr;
											grid-template-rows: 1fr 1fr;
											grid-template-areas: 
												"PostcodeTo"
												"PostcodeNo";
											justify-items: center;
										}
										.awbInfoDetails {
											grid-area: awbInfoDetails;
											display: grid;
											grid-template-columns: 1fr 0.3fr;
											grid-template-rows: 0.5fr 1fr;
											grid-template-areas: 
												"DetailsName DetailsPhone"
												"DetailsAddress DetailsPhone";
											font-size: 11px;
										}
										#receiverCopyRow4 {
											grid-area: receiverCopyRow4;
											display: grid;
											grid-template-columns: 0.25fr 1fr 0.25fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"receiverWeight receiverLabel receiverPaymentType";
											font-size: 9px;
											text-align: center;
										}

										#receiverWeight {
											grid-area: receiverWeight;
										}
										#receiverLabel {
											grid-area: receiverLabel;
											background: black;
											color: white;
										}
										#receiverPaymentType {
											grid-area: receiverPaymentType;
										}

										#dispatcherCopy {
											grid-area: dispatcherCopy;
											border-bottom: 1px dotted black;
											display: grid;
											grid-template-columns: 1fr;
											grid-template-rows: 1fr 0.5fr 1fr 0.6fr 0.7fr 0.1fr;
											grid-template-areas: 
												"dispatcherCopyRouteCode"
												"dispatcherCopyBarcode"
												"dispatcherCopyDeliveryDetails"
												"dispatcherCopyRemarks"
												"dispatcherCopySign"
												"dispatcherCopyLabel";
										}

										#dispatcherCopyRouteCode {
											grid-area: dispatcherCopyRouteCode;
											border-bottom: 1px solid black;
											display: flex;
											align-items: center;
											justify-content: center;
											font-weight: 900;
											font-size: 40px;
										}
										#dispatcherCopyBarcode {
											grid-area: dispatcherCopyBarcode;
											border-bottom: 1px solid black;
											display: grid;
											grid-template-columns: 0.2fr 1fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"pickupDate dispatcherSenderBarcode";
										}
										#pickupDate {
											grid-area: pickupDate;
											display: flex;
											align-items: flex-end;
											justify-content: center;
											font-size: 9px;
											font-weight: 900;
										}
										.dispatcherSenderBarcode {
											grid-area: dispatcherSenderBarcode;
										}

										.dispatcherSenderBarcode img {
											max-width: 70%;
										}

										#dispatcherCopyDeliveryDetails {
											grid-area: dispatcherCopyDeliveryDetails;
											border-bottom: 1px solid black;
											display: grid;
											grid-template-columns: 0.2fr 1fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"awbInfoPostcode awbInfoDetails";
										}
										#dispatcherCopyParcelInfo {
											grid-area: dispatcherCopyParcelInfo;
											border-bottom: 1px solid black;
											display: grid;
											grid-template-columns: 1fr;
											grid-template-rows: 1fr 1fr;
											grid-template-areas: 
												"infoLabel"
												"infoDetails";
											font-size: 9px;
											padding-left: 10px;
										}
										#infoLabel {
											grid-area: infoLabel;
											font-weight: 900;
										}
										#infoDetails {
											grid-area: infoDetails;
											white-space: nowrap;
											overflow: hidden;
											text-overflow: ellipsis;
										}
										#dispatcherCopyRemarks {
											grid-area: dispatcherCopyRemarks;
											border-bottom: 1px solid black;
											display: grid;
											grid-template-columns: 0.2fr 1fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"remarksLabel remarksDetails";
											font-size: 9px;
											align-items: center;
										}
										#remarksLabel {
											grid-area: remarksLabel;
											padding-left: 10px;
										}
										#remarksDetails {
											grid-area: remarksDetails;
										}
										#dispatcherCopySign {
											grid-area: dispatcherCopySign;
											border-bottom: 1px dotted black;
											display: grid;
											grid-template-columns: 1fr 1fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"signDisclaimer signSpace";
											padding-left: 10px;
											font-weight: 900;
										}
										#signDisclaimer {
											grid-area: signDisclaimer;
											border-right: 1px solid black;
											font-style: italic;
											font-size: 8px;
										}
										#signSpace {
											grid-area: signSpace;
											font-size: 11px;
										}
										#dispatcherCopyLabel {
											grid-area: dispatcherCopyLabel;
											display: grid;
											grid-template-columns: 0.53fr 0.25fr 0.25fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"distLabel icSpace distPaymentType";
											font-size: 9px;
										}

										#distLabel {
											grid-area: distLabel;
											background: black;
											color: white;
											text-align: center;
										}
										#icSpace {
											grid-area: icSpace;
											font-weight: 900;
											padding-left: 5px;
										}
										#distPaymentType {
											grid-area: distPaymentType;
											text-align: right;
										}

										#senderCopy {
											grid-area: senderCopy;
											display: grid;
											grid-template-columns: 1fr;
											grid-template-rows: 0.7fr 0.7fr 1.4fr 0.1fr;
											grid-template-areas: 
												"senderBarcode"
												"senderDetailsTo"
												"senderInfoDetails"
												"senderLabel";
										}

										#senderBarcode {
											grid-area: senderBarcode;
											border-bottom: 1px solid black;
											text-align: center;
											margin-top: 11px;
										}
										#senderBarcode img {
											max-width: 65%;
										}
										#senderDetailsTo {
											grid-area: senderDetailsTo;
											border-bottom: 1px solid black;
											display: grid;
											grid-template-columns: 0.2fr 1fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"awbInfoPostcode awbInfoDetails";
										}
										#senderDetailsFrom {
											grid-area: senderDetailsFrom;
											border-bottom: 1px solid black;
											display: grid;
											grid-template-columns: 0.2fr 1fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"awbInfoPostcode awbInfoDetails";
										}
										#senderInfoDetails {
											grid-area: senderInfoDetails;
											border-bottom: 1px solid black;
											display: grid;
											grid-template-columns: /*0.2fr*/ 1fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"senderInfoDetailsComplicated";
										}
										#senderInfoDetailsComplicated {
											grid-area: senderInfoDetailsComplicated;
											display: grid;
											grid-template-columns:1fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"senderInfoDetailsComplicatedParcelInfo";
												font-size: 11px;
										}
										#senderInfoDetailsComplicatedParcelInfo {
											grid-area: senderInfoDetailsComplicatedParcelInfo;
											border-bottom: 1px solid black;
											display: grid;
											grid-template-columns:1fr;
											grid-template-rows: 1fr;
											grid-template-areas: 
												"parcelInfoDetailsSender";
												font-size: 10px;
										}
										#parcelInfoDetailsSender {
											grid-area: parcelInfoDetailsSender;
											white-space: nowrap;
											overflow: hidden;
											text-overflow: ellipsis;
										}
										#remarksSenderLabel {
											grid-area: remarksSenderLabel;
										}
										#remarksSenderDetails {
											grid-area: remarksSenderDetails;
										}
										#senderLabel {
											grid-area: senderLabel;
											text-align: center;
											background: black;
											color: white;
											font-size: 9px;
										}
										div.container { page-break-before: always; }
									</style>
									</head>
									<body>
										<div class="container">
											<div id="receiverCopy">
												<div id="receiverCopyRow1" style="height: 39px;">
													<div id="receiverRow1barcode">
														'.$this->generate2($awb).'
													</div>
													<div id="receiverRow1AwbNo">'.$awb.'</div>
												</div>
												<div id="receiverCopyRow2">
													<div id="receiverCopyRow2Postcode">
														<div class="PostcodeTo">TO</div>
														<div class="PostcodeNo">'.$order_info['shipping_postcode'].'</div>
													</div>
													<div id="receiverCopyRow2Details">
														<div class="DetailsName">'.$order_info['shipping_firstname'].' '.$order_info['shipping_lastname'].'</div>
														<div class="DetailsPhone">'.$order_info['telephone'].'</div>
														<div class="DetailsAddress" style="height: 39px;">'.implode(" ",array(
																$order_info['shipping_address_1'], 
																$order_info['shipping_address_2'], 
																$order_info['shipping_city'],
																$order_info['shipping_postcode'],
															))
															.'</div>
													</div>
												</div>
												<div id="receiverCopyRow3">
													<div class="awbInfoPostcode">
														<div class="PostcodeTo">FROM</div>
														<div class="PostcodeNo">'.$postcode.'</div>
													</div>
													<div class="awbInfoDetails">
														<div class="DetailsName">'.$store_name.'</div>
														<div class="DetailsPhone">'.$store_telephone.'</div>
														<div class="DetailsAddress" style="height: 39px;">'.$store_address.'</div>
													</div>
												</div>
												<div id="receiverCopyRow4">
													<div id="receiverWeight">'.$weight.' KG</div>
													<div id="receiverLabel">Receiver Copy</div>
													<div id="receiverPaymentType">MONTHLY</div>
												</div>
											</div>
											<div id="dispatcherCopy">
												<div id="dispatcherCopyRouteCode">'.$sixcode.'</div>
												<div id="dispatcherCopyBarcode">
													<div id="pickupDate">'.date('Y-m-d').'</div>
													<div class="dispatcherSenderBarcode">
														<center>
															'.$this->generate($awb).'
															<span class="font12 bold">'.$awb.'</span>
														</center>
													</div>
												</div>
												<div id="dispatcherCopyDeliveryDetails">
													<div class="awbInfoPostcode">
														<div class="PostcodeTo">TO</div>
														<div class="PostcodeNo">'.$order_info['shipping_postcode'].'</div>
													</div>
													<div class="awbInfoDetails">
														<div class="DetailsName">'.$order_info['shipping_firstname'].' '.$order_info['shipping_lastname'].'</div>
														<div class="DetailsPhone">'.$order_info['telephone'].'</div>
														<div class="DetailsAddress" style="height: 42px;">'.implode(" ",array(
																$order_info['shipping_address_1'], 
																$order_info['shipping_address_2'], 
																$order_info['shipping_city'],
																$order_info['shipping_postcode'],
															))
															.'</div>
													</div>
												</div>
												<div id="dispatcherCopyRemarks">
													<div id="remarksLabel">Remarks:</div>
													<div id="remarksDetails"></div>
												</div>
												<div id="dispatcherCopySign">
													<div id="signDisclaimer">
														By signing this package, receiver confirms all of the information of the customer and parcel are true, and understand and agree to all the rules and regulation of using J&T Express
													</div>
													<div id="signSpace">
														Signature
													</div>
												</div>
												<div id="dispatcherCopyLabel">
													<div id="distLabel">Dispatcher Copy</div>
													<div id="icSpace">IC</div>
													<div id="distPaymentType">MONTHLY</div>
												</div>
											</div>
											<div id="senderCopy">
												<div id="senderBarcode">
													<center>
														'.$this->generate($awb).'
														<span class="font12 bold">'.$awb.'</span>
													</center>
												</div>
												<div id="senderDetailsTo">
													<div class="awbInfoPostcode">
														<div class="PostcodeTo">TO</div>
														<div class="PostcodeNo">'.$order_info['shipping_postcode'].'</div>
													</div>
													<div class="awbInfoDetails">
														<div class="DetailsName">'.$order_info['shipping_firstname'].' '.$order_info['shipping_lastname'].'</div>
														<div class="DetailsPhone">'.$order_info['telephone'].'</div>
														<div class="DetailsAddress" style="height: 36px;">'.implode(" ",array(
																$order_info['shipping_address_1'], 
																$order_info['shipping_address_2'], 
																$order_info['shipping_city'],
																$order_info['shipping_postcode'],
															))
															.'</div>
													</div>
												</div>
												<div id="senderInfoDetails">
													<div id="senderInfoDetailsComplicated">
														<div id="senderInfoDetailsComplicatedParcelInfo">
															<div id="parcelInfoDetailsSender" style="height: 50px;">';
																$lists = array_chunk($item_name, 4);
																echo '<table width="100%" style="text-align:center; font-size: 9px">';
																foreach ($lists as $list) {
																	echo '<tr>';
																	foreach ($list as $item) {
																		echo '<td>'.$item.'</td>';
																	}
																	echo '</tr>';
																}
																echo '</table>
															</div>
														</div>
													</div>
												</div>
												<div id="senderLabel">Sender Copy</div>
											</div>
										</div>
									</body>
									</html>
								';
							}		
						}
					}

					
			    }

			    public function generate2($value){
					$url = "http://share.jtexpress.my:8000/wordpresslib/barcode/generate2.php";
					$post = [ "awb" => $value ];

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
					$result = curl_exec($ch);
					curl_close($ch);

					return $result;
				}

				public function generate($value){
					$url = "http://share.jtexpress.my:8000/wordpresslib/barcode/generate.php";
					$post = [ "awb" => $value ];

					$ch = curl_init();
					curl_setopt($ch, CURLOPT_URL, $url);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
					$result = curl_exec($ch);
					curl_close($ch);

					return $result;
				}
    		
	public function shipping() {
		$this->load->language('sale/order');

		$data['title'] = $this->language->get('text_shipping');

		if ($this->request->server['HTTPS']) {
			$data['base'] = HTTPS_SERVER;
		} else {
			$data['base'] = HTTP_SERVER;
		}

		$data['direction'] = $this->language->get('direction');
		$data['lang'] = $this->language->get('code');

		$this->load->model('sale/order');

		$this->load->model('catalog/product');

		$this->load->model('setting/setting');

		$data['orders'] = array();

		$orders = array();

		if (isset($this->request->post['selected'])) {
			$orders = $this->request->post['selected'];
		} elseif (isset($this->request->get['order_id'])) {
			$orders[] = $this->request->get['order_id'];
		}

		foreach ($orders as $order_id) {
			$order_info = $this->model_sale_order->getOrder($order_id);

			// Make sure there is a shipping method
			if ($order_info && $order_info['shipping_code']) {
				$store_info = $this->model_setting_setting->getSetting('config', $order_info['store_id']);

				if ($store_info) {
					$store_address = $store_info['config_address'];
					$store_email = $store_info['config_email'];
					$store_telephone = $store_info['config_telephone'];
				} else {
					$store_address = $this->config->get('config_address');
					$store_email = $this->config->get('config_email');
					$store_telephone = $this->config->get('config_telephone');
				}

				if ($order_info['invoice_no']) {
					$invoice_no = $order_info['invoice_prefix'] . $order_info['invoice_no'];
				} else {
					$invoice_no = '';
				}

				if ($order_info['shipping_address_format']) {
					$format = $order_info['shipping_address_format'];
				} else {
					$format = '{firstname} {lastname}' . "\n" . '{company}' . "\n" . '{address_1}' . "\n" . '{address_2}' . "\n" . '{city} {postcode}' . "\n" . '{zone}' . "\n" . '{country}';
				}

				$find = array(
					'{firstname}',
					'{lastname}',
					'{company}',
					'{address_1}',
					'{address_2}',
					'{city}',
					'{postcode}',
					'{zone}',
					'{zone_code}',
					'{country}'
				);

				$replace = array(
					'firstname' => $order_info['shipping_firstname'],
					'lastname'  => $order_info['shipping_lastname'],
					'company'   => $order_info['shipping_company'],
					'address_1' => $order_info['shipping_address_1'],
					'address_2' => $order_info['shipping_address_2'],
					'city'      => $order_info['shipping_city'],
					'postcode'  => $order_info['shipping_postcode'],
					'zone'      => $order_info['shipping_zone'],
					'zone_code' => $order_info['shipping_zone_code'],
					'country'   => $order_info['shipping_country']
				);

				$shipping_address = str_replace(array("\r\n", "\r", "\n"), '<br />', preg_replace(array("/\s\s+/", "/\r\r+/", "/\n\n+/"), '<br />', trim(str_replace($find, $replace, $format))));

				$this->load->model('tool/upload');

				$product_data = array();

				$products = $this->model_sale_order->getOrderProducts($order_id);

				foreach ($products as $product) {
					$option_weight = '';

					$product_info = $this->model_catalog_product->getProduct($product['product_id']);

					if ($product_info) {
						$option_data = array();

						$options = $this->model_sale_order->getOrderOptions($order_id, $product['order_product_id']);

						foreach ($options as $option) {
							if ($option['type'] != 'file') {
								$value = $option['value'];
							} else {
								$upload_info = $this->model_tool_upload->getUploadByCode($option['value']);

								if ($upload_info) {
									$value = $upload_info['name'];
								} else {
									$value = '';
								}
							}

							$option_data[] = array(
								'name'  => $option['name'],
								'value' => $value
							);

							$product_option_value_info = $this->model_catalog_product->getProductOptionValue($product['product_id'], $option['product_option_value_id']);

							if ($product_option_value_info) {
								if ($product_option_value_info['weight_prefix'] == '+') {
									$option_weight += $product_option_value_info['weight'];
								} elseif ($product_option_value_info['weight_prefix'] == '-') {
									$option_weight -= $product_option_value_info['weight'];
								}
							}
						}

						$product_data[] = array(
							'name'     => $product_info['name'],
							'model'    => $product_info['model'],
							'option'   => $option_data,
							'quantity' => $product['quantity'],
							'location' => $product_info['location'],
							'sku'      => $product_info['sku'],
							'upc'      => $product_info['upc'],
							'ean'      => $product_info['ean'],
							'jan'      => $product_info['jan'],
							'isbn'     => $product_info['isbn'],
							'mpn'      => $product_info['mpn'],
							'weight'   => $this->weight->format(($product_info['weight'] + (float)$option_weight) * $product['quantity'], $product_info['weight_class_id'], $this->language->get('decimal_point'), $this->language->get('thousand_point'))
						);
					}
				}

				$data['orders'][] = array(
					'order_id'	       => $order_id,
					'invoice_no'       => $invoice_no,
					'date_added'       => date($this->language->get('date_format_short'), strtotime($order_info['date_added'])),
					'store_name'       => $order_info['store_name'],
					'store_url'        => rtrim($order_info['store_url'], '/'),
					'store_address'    => nl2br($store_address),
					'store_email'      => $store_email,
					'store_telephone'  => $store_telephone,
					'email'            => $order_info['email'],
					'telephone'        => $order_info['telephone'],
					'shipping_address' => $shipping_address,
					'shipping_method'  => $order_info['shipping_method'],
					'product'          => $product_data,
					'comment'          => nl2br($order_info['comment'])
				);
			}
		}

		$this->response->setOutput($this->load->view('sale/order_shipping', $data));
	}
}
