<?php

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
		$em = $this->getServiceLocator()->get('Doctrine\ORM\EntityManager');
		$repository = $em->getRepository('Application\Entity\Categoria');

		$categorias = $repository->findAll();

        return new ViewModel(array('categorias' => $categorias));
    }
}
