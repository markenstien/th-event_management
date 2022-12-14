<?php

	use Services\CategoryService;
	load(['CategoryService'],SERVICES);


	class ServiceBundleItemController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->bundle = model('ServiceBundleModel');
			$this->service = model('ServiceModel');
			$this->model = model('ServiceBundleItemModel');
			$this->category = model('CategoryModel');
		}	


		public function delete($id)
		{
			 $this->model->delete($id);

			 return request()->return();
		}


		public function add($bundle_id)
		{
			if( isSubmitted() )
			{
				$post = request()->posts();

				$res = $this->model->add($post['service_id'] , $post['bundle_id']);

				Flash::set("Service added to bundle");

				if(!$res) 
					Flash::set( $this->model->getErrorString() , 'danger');

				return request()->return();

			}

			if( isset($_GET['btn_filter']) )
			{	
				$rq  = request()->inputs();

				if( empty($rq['key_word']) && !isset($rq['categories']) )
				{
					Flash::set("Filter failed" , 'danger');
					return request()->return();
				}

				$services = $this->service->getByFilter( $rq );
				$service_bundles = $this->bundle->getByFilter($rq);
			}elseif(isset($_GET['category']))
			{
				$services = $this->service->getAll([
					'where' => [
						'category' => $_GET['category']
					]
				]);

				$service_bundles = $this->bundle->getAll([
					'where' => [
						'category' => $_GET['category']
					]
				]);
			}else
			{

				$services = $this->service->getAll([
					'where' => [
						'is_visible' => true
					]
				]);

				$service_bundles = $this->bundle->getAll([
					'where' => [
						'is_visible' => true
					]
				]);
			}

			$categories = $this->category->getAll([
				'where' => [
					'cat_key' => CategoryService::PACKAGE
				]
			]);

			$bundle = $this->bundle->get($bundle_id);
			$bundle_items = $this->model->getByBundle($bundle_id);
			

			$this->_attachmentForm->setValue('global_id', $bundle_id);
			$this->_attachmentForm->setValue('global_key', CategoryService::GLOBAL_PACKAGE_KEY);
			$data = [
				'title' => "{$bundle->name} | Service Bundles",
				'services' => $services,
				'bundle_id' => $bundle_id,
				'bundle_items' => $bundle_items,
				'bundle' => $bundle,
				'categories' => $categories,
				'attachmentForm' => $this->_attachmentForm,
				'attachments' => $this->_attachmentModel->all([
					'global_key' => CategoryService::GLOBAL_PACKAGE_KEY,
					'global_id' => $bundle_id
				])
			];

			return $this->view('service_bundle/add_item' , $data);
		}
	}