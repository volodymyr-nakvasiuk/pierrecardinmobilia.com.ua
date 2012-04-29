<?PHP

/**
 * Admin CMS
 *
 */

require_once('api/Admin.php');


class PaymentModule extends Admin
{
 
	public function checkout_form()
	{
		$form = '<input type=submit value="Оплатить">';	
		return $form;
	}
	public function settings()
	{
		$form = '<input type=submit value="Оплатить">';	
		return $form;
	}
}
