<?php
   namespace App\Controller;
   use App\Controller\AppController;
   use Cake\Mailer\Email;

   class EmailsController extends AppController{
      public function index(){
        $session = $this->request->session();
        $uuid = $session->read('uuid');
        $mail = $session->read('email');
        
         $email = new Email('default');
         $email->to($mail)->subject('Confirmation')->send("http://" . $_SERVER['HTTP_HOST'] . $this->request->webroot . "users/confirm/" . $user_uuid);

         

      }
   }
?>