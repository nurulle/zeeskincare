<?php
class ControllerExtensionPaymentBankCimb extends Controller {
	public function index() {
		$this->load->language('extension/payment/bank_cimb');

		$data['bank'] = nl2br($this->config->get('payment_bank_cimb_bank' . $this->config->get('config_language_id')));
        $data['bank_code'] = "cimb_logo";
        $data['bank'] = "CIMB Niaga Syariah";
        $data['text_loading'] = "CIMB";

		return $this->load->view('extension/payment/bank_cimb', $data);
	}

	public function confirm() {
		$json = array();
		
		if ($this->session->data['payment_method']['code'] == 'bank_cimb') {
			$this->load->language('extension/payment/bank_cimb');

			$this->load->model('checkout/order');

			$comment  = $this->language->get('text_instruction') . "\n\n";
			$comment .= $this->config->get('payment_bank_cimb_bank' . $this->config->get('config_language_id')) . "\n\n";
			$comment .= $this->language->get('text_payment');

			$this->model_checkout_order->addOrderHistory($this->session->data['order_id'], $this->config->get('payment_bank_cimb_order_status_id'), $comment, true);
		
			$json['redirect'] = $this->url->link('checkout/success');
		}
		
		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));		
	}
}