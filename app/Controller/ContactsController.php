<!-- Controller: Controller/ContactsController.php -->

<?php
App::uses('CakeEmail', 'Network/Email');
class ContactsController extends AppController
{

    public function index() {
      if(isset($this->data['Contact'])) {
				$userName = $this->data['Contact']['name'];
        $userEmail = $this->data['Contact']['email'];
        $userMessage = $this->data['Contact']['message'];
				echo "mensagem enviada de $userName";



				$email = new CakeEmail();
				$email->from(array($userEmail));
				$email->to('renatosorespro@gmail.com');
				$email->subject('Website Contact Form Submission');
				$email->send($userMessage);

				if ($email->send($userMessage)) {
						$this->Session->setFlash("Obrigado $userName por entrar em contato conosco");
				}
				else {
						$this->Session->setFlash('Mail Not Sent');
				}
			}
    }

    // public function contact() {
    //     if(isset($this->data['Contact'])) {
    //         $userEmail = $this->data['Contact']['email'];
    //         $userMessage = $this->data['Contact']['message'];
    //
    //         $email = new CakeEmail();
    //         $email->from(array($userEmail));
    //         $email->to('email@example.com');
    //         $email->subject('Website Contact Form Submission');
    //         $email->send($userMessage);
    //
    //         if ($email->send($userMessage)) {
    //             $this->Session->setFlash('Thank you for contacting us');
    //         //  $this->redirect(array('controller' => 'pages', 'action' => 'index'));
    //         }
    //         else {
    //             $this->Session->setFlash('Mail Not Sent');
    //         }
    //
    //     }
    // }

}
