<?php
class ControllerCommonResponse extends Controller { 
public function index() { 

 $this->load->language('common/EBS');
$this->data['button_confirm'] = $this->language->get('button_confirm');
$this->data['button_continue'] = $this->language->get('button_continue');
$this->data['heading_title'] = $this->language->get('heading_title');
$this->data['continue'] = HTTP_SERVER . 'index.php?route=common/home';

$secret_key = $this->config->get('EBS_secret_key'); // Your Secret Key
if(isset($_GET['DR'])) {
	 require('Rc43.php');
	 $DR = preg_replace("/\s/","+",$_GET['DR']);

	 $rc4 = new Crypt_RC4($secret_key);
 	 $QueryString = base64_decode($DR);
	 $rc4->decrypt($QueryString);
	 $QueryString = split('&',$QueryString);

	 $response = array();
	 foreach($QueryString as $param){
	 	$param = split('=',$param);
		$response[$param[0]] = urldecode($param[1]);
	 }
	 $this->data['response']=$response;

   
$this->load->model('checkout/order');
	if($response['ResponseCode']=='0')
{

//$this->model_checkout_order->confirm($response['MerchantRefNo'], $this->config->get('cod_order_status_id'));
	
		if (isset($this->session->data['order_id'])) {
			$this->cart->clear();
			
			unset($this->session->data['shipping_method']);
			unset($this->session->data['shipping_methods']);
			unset($this->session->data['payment_method']);
			unset($this->session->data['payment_methods']);
			unset($this->session->data['guest']);
			unset($this->session->data['comment']);
			unset($this->session->data['order_id']);	
			unset($this->session->data['coupon']);
		}


//$order_info = $this->model_checkout_order->getOrder($response['MerchantRefNo']);

//print_r($order_info);

		$this->model_checkout_order->confirm($response['MerchantRefNo'],'5');

	 $this->data['responseMsg']='<h2>Thank you for your Order.</h2><br/><b>Payment Successful<br/> Your Order id - '.$response['MerchantRefNo'].'</b>';
}
else
{

		
	$this->model_checkout_order->confirm($response['MerchantRefNo'],'10');
	 $this->data['responseMsg']='<h2>Sorry, Try Again !! </h2><br/><b>Payment Failed</b>';
}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/response.tpl')) {
			$this->template = $this->config->get('config_template') . '/template/common/response.tpl';
		} else {
			$this->template = 'default/template/common/response.tpl';
		}
	
			$this->children = array(
			'common/header',
			'common/footer',
			'common/column_left',
			'common/column_right'
		);
		$this->response->setOutput($this->render(TRUE), $this->config->get('config_compression'));
	 }
	 
	 }
}
?>
