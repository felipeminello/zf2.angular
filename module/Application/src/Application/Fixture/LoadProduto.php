<?php

namespace Application\Fixture;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Application\Entity\Produto;

class LoadProduto extends AbstractFixture implements OrderedFixtureInterface
{
	/**
	 * Load data fixtures with the passed EntityManager
	 *
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		$categoriaLivros = $this->getReference('categoria-livros');
		$categoriaComputadores = $this->getReference('categoria-computadores');

		$produto = new Produto();
		$produto->setNome('Livro 1')
				->setDescricao('Descrição do livro 1')
				->setCategoria($categoriaLivros);

		$manager->persist($produto);

		$produto = new Produto();
		$produto->setNome('Livro 2')
				->setDescricao('Descrição do livro 2')
				->setCategoria($categoriaLivros);

		$manager->persist($produto);

		$produto = new Produto();
		$produto->setNome('Computador')
				->setDescricao('Descrição do computador')
				->setCategoria($categoriaComputadores);

		$manager->persist($produto);

		$manager->flush();
	}

	/**
	 * Get the order of this fixture
	 *
	 * @return integer
	 */
	public function getOrder()
	{
		return 2;
	}
}