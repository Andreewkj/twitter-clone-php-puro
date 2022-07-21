<?php

namespace App\Controllers;

use MF\Controller\Action;
use MF\Model\Container;

class IndexController extends Action {

    public function index(): void
    {
        $this->view->dados = (Container::getModel('Produto'))->getProdutos();
        $this->render('index', 'layout1');
    }

    public function sobreNos(): void
    {
        $this->view->dados = (Container::getModel('Info'))->getInfo();
        $this->render('sobreNos', 'layout1');
    }

}

?>