<?php 

    class MetaModel extends Model
    {
        public $table = 'module_meta';

        public $_fillables = [
            'search_key',
            'category',
            'meta_key',
            'meta_id',
            'meta_value'
        ];
        public function createOrUpdate($platformData, $id = null)
        {
            $_fillables = parent::getFillablesOnly($platformData);
            if (isset($_fillables['meta_value'])) {
                $_fillables['meta_value'] = json_encode($_fillables['meta_value']);
            }

            //check if exists
            if(!is_null($id)) {
                $isExist = parent::single([
                    'search_key' => $id
                ]);

                if($isExist) {
                    return parent::createOrUpdate($_fillables, [
                        'search_key' => $id
                    ]);
                } else {
                    return parent::createOrUpdate($_fillables);
                }
            } else {
                return parent::createOrUpdate($_fillables);
            }
        }

        public function get($searchKey) {
           $meta = parent::single([
                'search_key' => $searchKey,
            ])->meta_value ?? '';

            if(empty($meta)) {
                return $meta;
            }
            return json_decode($meta);
        }

        public function getComplete($searchKey) {
            $get = $this->get($searchKey);
            if(!$searchKey){
                $this->addError("Data not found");
                return false;
            }
            $parent = parent::single([
                'search_key' => $searchKey
            ]);

            if($parent && !is_null($parent)) {
                $parent->meta_value = $get;
            }
            return $parent;
        }
    }