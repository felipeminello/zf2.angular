<?php

namespace Application\Service;

use Doctrine\ORM\EntityManager;
use Application\Entity\Categoria as CategoriaEntity;

class Categoria
{
	/**
	 * @var EntityManager
	 */
	private $entityManager;

	/**
	 * Categoria constructor.
	 *
	 * @param EntityManager $entityManager
	 */
	public function __construct(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	public function insert($nome)
	{
		$categoriaEntity = new CategoriaEntity();
		$categoriaEntity->setNome($nome);

		$this->entityManager->persist($categoriaEntity);
		$this->entityManager->flush();

		return $categoriaEntity;
	}

	public function update(array $data)
	{
		$categoriaEntity = $this->entityManager->getReference('Application\Entity\Categoria', $data['id']);

		$categoriaEntity->setNome($data['nome']);

		$this->entityManager->persist($categoriaEntity);
		$this->entityManager->flush();

		return $categoriaEntity;
	}

	public function delete($id)
	{
		$categoriaEntity = $this->entityManager->getReference('Application\Entity\Categoria', $id);

		$this->entityManager->remove($categoriaEntity);
		$this->entityManager->flush();

		return $id;
	}
}