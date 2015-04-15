<?php 
/*
	O controller é onde toda a lógica de negócio para interações vai acontecer.
	De uma forma geral, é o local onde você vai manipular os models e lidar com
	o resultado das ações feitas sobre nossos posts.
*/

class PostsController extends AppController {
    public $helpers = array ('Html','Form');
    public $name = 'Posts';

    // Listagem dos posts
    /*
		Definindo a função index() em nosso PostsController,
		os usuários podem acessar esta lógica visitando o endereço www.exemplo.com/posts/index.
		De maneira semelhante, se definirmos um método chamado foobar() dentro do controller,
		os usuários deveriam ser capazes de acessá-lo pelo endereço www.exemplo.com/posts/foobar.
    */
    function index() {
    	/*
			A única declaração na nossa action utiliza o método set() para passar dados do controller para a view.
			A linha define uma variável na view chamada ‘posts’ que vai conter o retorno da chamada do método find('all')
			do model Post. Nosso model Post está automaticamente disponível como $this->Post uma vez que seguimos as convenções de nomenclatura do Cake.
    	*/
    	$this->set('posts', $this->Post->find('all'));
    }

    /*
    	A chamada do método set() deve lhe parece familiar. Perceba
		que estamos usando o método read() ao invés do find('all')
		porque nós realmente só queremos informações de um único post.

		Note que a action de nossa view recebe um parâmetro: O ID do post que
		queremos ver. Este parâmetro é repassado à action por meio da URL
		requisitada. Se um usuário acessar uma URL /posts/view/3, então o
		valor ‘3’ será atribuído ao parâmetro $id.

    */
    public function view($id = null) {
    	/*
			O ID do post que queremos ver. Este parâmetro é repassado
			à action por meio da URL requisitada. Se um usuário
			acessar uma URL /posts/view/3, então o valor ‘3’ será
			atribuído ao parâmetro $id.    	
    	*/
		$this->Post->id = $id;
        $this->set('post', $this->Post->read());
    }

    /*
		Aqui está o que a action add() faz: se o método da requisição
		feita pelo cliente for do tipo post, ou seja, se ele enviou
		dados pelo formulário, tenta salvar os dados usando o model
		Post. Se, por alguma razão ele não salvar, apenas renderize a
		view. Isto nos dá uma oportunidade de mostrar erros de
		validação e outros avisos ao usuário.
    */
    public function add() {
        if ($this->request->is('post')) {
            if ($this->Post->save($this->request->data)) {

            	/*
					Nós usamos o método SessionComponent::setFlash()
					do componente SessionComponent para definir uma
					variável de sessão com uma mensagem a ser exibida
					na página depois de ser redirecionada. No layout,
					nós temos SessionHelper::flash que exibe a
					mensagem e limpa a variável de sessão
					correspondente.
            	*/
                $this->Session->setFlash('Seu post foi salvo.');

                /*                
					O parâmetro array('action' => 'index') é
					convertido para a URL /posts, em outras palavras,
					a action index do controller posts.
                */
                $this->redirect(array('action' => 'index'));
            }
        }
    }

    function edit($id = null) {
    	$this->Post->id = $id;

    	/*
			Esta action primeiro verifica se a requisição é do tipo GET.
			Se for, nós buscamos o Post e passamos para a view. Se a
			requisição não for do tipo GET, provavelmente esta contém
			dados de um formulário POST. Nós usaremos estes dados para
			atualizar o registro do nosso Post ou exibir novamente a view
			mostrando para o usuário os erros de validação.
    	*/
    	if ($this->request->is('get')) {
    	    $this->request->data = $this->Post->read();
    	} else {
    	    if ($this->Post->save($this->request->data)) {
    	        $this->Session->setFlash('Seu post foi atualizado.');
    	        $this->redirect(array('action' => 'index'));
    	    }
    	}
	}

	function delete($id) {

		// Se o usuário tentar deletar um post usando uma requisição do tipo GET, nós lançamos uma exceção.
	    if (!$this->request->is('post')) {
	        throw new MethodNotAllowedException();
	    }
	    if ($this->Post->delete($id)) {

	    	// mostrar uma mensagem de confirmação para o usuário
	        $this->Session->setFlash('The post with id: ' . $id . ' has been deleted.'); 
	        $this->redirect(array('action' => 'index'));
	    }
	}
}
?>