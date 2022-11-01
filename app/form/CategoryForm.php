<?php

	namespace Form;
	use Core\Form;
	use Services\CategoryService;

	load(['Form'] , CORE);
	load(['CategoryService'], SERVICES);

	class CategoryForm extends Form
	{
		public function __construct()
		{
			parent::__construct();

			$this->name = 'category_form';

			$this->init([
				'url' => _route('category:create')
			]);
			$this->addCategory();
			$this->addKey();
			$this->customSubmit('Save');
		}

		public function addCategory()
		{
			$this->add([
				'type' => 'text',
				'name' => 'category',
				'options' => [
					'label' => 'Category',
				],
				'attributes' => [
					'placeholder' => 'Enter Category'
				],
				'class' => 'form-control'
			]);
		}

		public function addKey()
		{
			$this->add([
				'type' => 'select',
				'name' => 'cat_key',
				'options' => [
					'label' => 'Category Key',
					'option_values' => [
						CategoryService::PACKAGE, CategoryService::PACKAGE_ITEM, CategoryService::EVENT
					]
				],
				'class' => 'form-control'
			]);
		}
	}