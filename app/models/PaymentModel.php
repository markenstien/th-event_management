<?php

	class PaymentModel extends Model
	{	
		public $table = 'payments';

		protected $_fillables = [
			'id' , 'reference','amount',
			'meta_key', 'parent_id',
			'method' , 'notes', 'org',
			'external_reference' , 'acc_no',
			'acc_name' , 'bill_id' , 'created_by'
		];

		public function get($id)
		{
			$payment = parent::get($id);

			if(!$payment) {
				return false;
			}
			$this->metaModel = model('metaModel');
			
			$payment->pictures = $this->metaModel->all([
				'meta_key' => 'PAYMENT',
				'meta_id' => $id
			]);

			return $payment;
		}
		public function create($payment_data)
		{

			if (!isset($payment_data['reference'])) {
				$payment_data['reference'] = $this->getReference();
			}

			$fillable_datas = $this->getFillablesOnly($payment_data);
			$payment_id = parent::store($fillable_datas);
			$payment_link = _route('payment:show' , $payment_id);

			if($payment_id)
			{
				/*
				*if there's a user on bill
				*/
				// if( $bill->user_id )
				// {
				// 	$this->user_model = model('UserModel');

				// 	$user = $this->user_model->single(['id' => $bill_id->user_id]);

				// 	$user_email = $user->email;
				// 	$user_mobile_number = $user->phone_number;


				// 	$notify_include_email_data = [
				// 		"You have paid your balance {$fillable_datas['amount']} via {$fillable_datas['method']}.#{$payment_data['reference']} Payment reference",
				// 			[$bill->user_id],
				// 			[$user_email],
				// 			['href' => $payment_link]
				// 	];

				// 	_notify_include_email(...$notify_include_email_data);

				// 	send_sms("You have paid your balance {$fillable_datas['amount']} via {$fillable_datas['method']}.#{$payment_data['reference']} Payment reference" , [$user_mobile_number]);
				// }

				// _notify_operations( $user_first_name ?? 'Guest' . ' ' .'submitted a payment of '.$fillable_datas['amount'] , ['href' => $payment_link]);

				$this->addMessage("Payment saved");
				return $payment_id;
			}

			$this->addError("Error to save payment!");
			
			return false;
		}

		public function getReference()
		{
			return referenceSeries(parent::lastId(), 4, date('ym'));
		}


		public function getByBill($billId)
		{
			return $this->getAssoc('id' , [
				'parent_id' => $billId
			]);
		}

		public function decline($id) {
			return parent::update([
				'status' => 'declined'
			], $id);
		}

		public function approve($id) {
			return parent::update([
				'status' => 'approved'
			], $id);
		}

		public function amountTotal() {
			$this->db->query(
				"SELECT SUM(amount) as total_amount FROM {$this->table}
					WHERE status = 'approved' "
			);
			return $this->db->single()->total_amount ?? 0;
		}
	}