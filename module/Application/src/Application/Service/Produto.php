<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Produto as ProdutoEntity;

class Produto
{
	/**
	 * @var EntityManager
	 */
	private $entityManager;

	/**
	 * Produto constructor.
	 *
	 * @param EntityManager $entityManager
	 */
	public function __construct(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	public function insert(array $data)
	{
		$categoriaEntity = $this->entityManager->getReference('Application\Entity\Categoria', $data['categoriaId']);

		$produtoEntity = new ProdutoEntity();
		$produtoEntity->setNome('Macbook 15')
					  ->setDescricao('Puta máquina')
					  ->setCategoria($categoriaEntity);

		$this->entityManager->persist($produtoEntity);
		$this->entityManager->flush();

		return $produtoEntity;
	}

	public function update(array $data)
	{
		$categoriaEntity = $this->entityManager->getReference('Application\Entity\Categoria', $data['categoriaId']);
		$produtoEntity = $this->entityManager->getReference('Application\Entity\Produto', $data['id']);

		$produtoEntity->setNome($data['nome'])
					  ->setDescricao($data['descricao'])
					  ->setCategoria($categoriaEntity);

		$this->entityManager->persist($produtoEntity);
		$this->entityManager->flush();

		return $produtoEntity;
	}

	public function delete($id)
	{
		$produtoEntity = $this->entityManager->getReference('Application\Entity\Produto', $id);

		$this->entityManager->remove($produtoEntity);
		$this->entityManager->flush();

		return $id;
	}
}