<?php
class ModelExtensionShippingHpGrab extends Model {
	function getQuote($address) {
		$this->load->language('extension/shipping/hp_grab');

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "zone_to_geo_zone WHERE geo_zone_id = '" . (int)$this->config->get('shipping_hp_grab_geo_zone_id') . "' AND country_id = '" . (int)$address['country_id'] . "' AND (zone_id = '" . (int)$address['zone_id'] . "' OR zone_id = '0')");

		if (!$this->config->get('shipping_hp_grab_geo_zone_id')) {
			$status = true;
		} elseif ($query->num_rows) {
			$status = true;
		} else {
			$status = false;
		}

        if ($this->cart->getSubTotal() < $this->config->get('shipping_hp_grab_total')) {
			$status = false;
		}
        
		$method_data = array();
        
        $berat = $this->cart->getWeight();

        $unit = $this->weight->getUnit($this->config->get('config_weight_class_id'));

        if ($unit == 'g') {
            $berat = $berat;
        } else if ($unit == 'kg') {
            $berat = $berat * 1000;
        }

        // normalization
        if ($berat == 0) {
            $berat = 1;
        }
		
        if ($status) {
			$quote_data = array();

			$quote_data['hp_grab'] = array(
				'code'         => 'hp_grab.hp_grab',
				'title'        => $this->language->get('text_description'),
				'cost'         => $this->config->get('shipping_hp_grab_cost'),
                'weight'       => $berat/1000,
				'etd'          => 1,
                'text_kg'      => $this->language->get('text_kg'),
                'text_day'     => $this->language->get('text_day'),
                'image'        => 'catalog/view/theme/default/image/shipping/hp_grab.png',
				'tax_class_id' => $this->config->get('hp_grab_tax_class_id'),
				'text'         => $this->currency->format($this->tax->calculate($this->config->get('shipping_hp_grab_cost'), $this->config->get('shipping_hp_grab_tax_class_id'), $this->config->get('config_tax')), $this->session->data['currency'])
			);

			$method_data = array(
				'code'       => 'hp_grab',
				'title'      => $this->language->get('text_title'),
				'quote'      => $quote_data,
				'sort_order' => $this->config->get('hp_grab_sort_order'),
				'error'      => false
			);
		}

		return $method_data;
	}
}
