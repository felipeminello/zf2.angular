<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\Categoria;

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

		$categorias = $repository->findAll();

        return new ViewModel(array('categorias' => $categorias));
    }
}
