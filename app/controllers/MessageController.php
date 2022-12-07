<?php 

    class MessageController extends Controller
    {

        public function __construct()
        {
            $this->model = model('MessageModel');
        }

        public function send() {

            if(isSubmitted()){
                $post = request()->posts();
                $this->model->create($post);
                Flash::set("Message sent");
                return request()->return();
            }
        }
    }