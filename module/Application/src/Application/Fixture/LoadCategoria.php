<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\Categoria;

class LoadCategoria extends AbstractFixture implements OrderedFixtureInterface
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
		$this->addReference('categoria-livros', $categoria);

		$manager->persist($categoria);

		$categoria = new Categoria();
		$categoria->setNome('Computadores');
		$this->addReference('categoria-computadores', $categoria);

		$manager->persist($categoria);

		$manager->flush();
	}

	/**
	 * Get the order of this fixture
	 *
	 * @return integer
	 */
	public function getOrder()
	{
		return 1;
	}
}
