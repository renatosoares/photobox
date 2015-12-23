<?php
/**
 *
 */

class CategoriesController extends AppController {
  public function index(){
    $this->set('categories', $this->Category->find('all'));
  }
  public function add()
  {
    if ($this->request->is('post')) {
       $this->Category->create();
       if ($this->Category->save($this->request->data)) {
         $this->Flash->success(__('A catagoria foi salva!'));
         return $this->redirect(array('action' => 'index' ));
       }
       $this->Flash->error(__('A categoria não pode ser salva, tente de novo'));
    }
  }
}
