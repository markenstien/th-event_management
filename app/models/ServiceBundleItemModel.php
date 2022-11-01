<?php 

	class ServiceBundleItemModel extends Model 
	{
		public $table = 'package_items';

		public function add($item_id , $parent_id)
		{
			if( parent::single(['item_id' => $item_id , 'parent_id' => $parent_id]) )
			{
				$this->addError("Service is already in the bundle");
				return false;
			}

			$res = parent::store([
				'item_id' => $item_id,
				'parent_id'  => $parent_id
			]);

			$this->reloadBundlePrice($parent_id);
			//re-load service-bundle price
			return $res;
		}


		public function delete($id)
		{
			$instance = parent::get($id);
			$res = parent::delete($id);;

			$this->reloadBundlePrice($instance->parent_id);
			return $res; 
		}

		public function reloadBundlePrice($parent_id)
		{
			$items = $this->getByBundle($parent_id);

			$total = 0;

			foreach($items as $item) {
				$total += $item->price;
			}

			$service_bundle = model('ServiceBundleModel');

			$res = $service_bundle->update([
				'price' => $total
			] , $parent_id);
		}

		public function getByBundle($parent_id)
		{
			$this->db->query(
				"SELECT sbi.* , ss.service , ss.code , ss.description ,
					ss.price , ss.is_visible, ss.status as status,
					ss.created_by ,cat.category as category, 
					cat.description as cat_description,
					sbi.id as id , ss.id as item_id

					FROM {$this->table} as sbi

					LEFT JOIN services as ss
					ON sbi.item_id = ss.id

					LEFT JOIN categories as cat 
					ON cat.id = ss.category_id

					WHERE sbi.parent_id = '{$parent_id}'

					ORDER BY ss.service asc"
			);

			$results = $this->db->resultSet();

			return $results;
		}
	}