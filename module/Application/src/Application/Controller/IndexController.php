<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Categoria;
use Application\Entity\Produto;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$repository = $em->getRepository('Application\Entity\Categoria');

//		$categoria = new Categoria();
//		$categoria->setNome("Laptops");
//
//		$em->persist($categoria); // preparar para gravar
//		$em->flush(); // grava no banco

		$categoriaService = $this->getServiceLocator()->get('Application\Service\Categoria');
		$categoriaService->delete(4);

		$categorias = $repository->findAll();

//		$categoria = $repository->find(1);
//
//		$produto = new Produto();
//		$produto->setNome('Game B')
//				->setDescricao('Game B é muito legal')
//				->setCategoria($categoria);
//
//		$em->persist($produto);
//		$em->flush();

        return new ViewModel(array('categorias' => $categorias));
    }
}
