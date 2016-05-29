<?php

namespace User\Auth;

use Doctrine\ORM\EntityManager;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

class DoctrineAdapter implements AdapterInterface
{
	/**
	 * @var EntityManager
	 */
	private $entityManager;

	protected $username;
	protected $password;

	public function __construct(EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	/**
	 * @return mixed
	 */
	public function getUsername()
	{
		return $this->username;
	}

	/**
	 * @param mixed $username
	 *
	 * @return DoctrineAdapter
	 */
	public function setUsername($username)
	{
		$this->username = $username;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPassword()
	{
		return $this->password;
	}

	/**
	 * @param mixed $password
	 *
	 * @return DoctrineAdapter
	 */
	public function setPassword($password)
	{
		$this->password = $password;

		return $this;
	}

	/**
	 * Performs an authentication attempt
	 *
	 * @return \Zend\Authentication\Result
	 * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface If authentication cannot be performed
	 */
	public function authenticate()
	{
		$repository = $this->entityManager->getRepository('User\Entity\User');

		$user = $repository->findOneBy(array('username' => $this->getUsername(), 'password' => $this->getPassword()));

		if ($user) {
			return new Result(Result::SUCCESS, array('user' => $user), array('OK'));
		} else {
			return new Result(Result::FAILURE_CREDENTIAL_INVALID, null, array());
		}
	}
}