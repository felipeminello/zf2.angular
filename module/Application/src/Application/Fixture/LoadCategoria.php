<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\Categoria;

class LoadCategoria extends AbstractFixture
{
	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		$categoria = new Categoria();
		$categoria->setNome('Livros');

		$manager->persist($categoria);

		$categoria = new Categoria();
		$categoria->setNome('Computadores');

		$manager->persist($categoria);

		$manager->flush();
	}
}