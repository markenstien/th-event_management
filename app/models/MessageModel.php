<?php 

    class MessageModel extends Model
    {
        public $table = 'messages';

        public $_fillables = [
            'sender_type',
            'parent_id',
            'sender_id',
            'reciever_id',
            'content',
            'timesent'
        ];

        public function create($data) {
            $_fillables = parent::getFillablesOnly($data);
            $_fillables['timesent'] = nowMilitary();
           return parent::store($_fillables);
        }
    }