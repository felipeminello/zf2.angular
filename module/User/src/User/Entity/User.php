<?php

namespace User\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User
{
	/**
	 * @ORM\Id
	 * @ORM\Column(type="integer")
	 * @ORM\GeneratedValue
	 */
	private $id;

	/**
	 * @ORM\Column(type="string")
	 */
	private $nome;

	/**
	 * @ORM\Column(type="string")
	 */
	private $email;

	/**
	 * @ORM\Column(type="string")
	 */
	private $password;

	/**
	 * @return mixed
	 */
	public function getId()
	{
		return $this->id;
	}

	/**
	 * @param mixed $id
	 *
	 * @return User
	 */
	public function setId($id)
	{
		$this->id = $id;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNome()
	{
		return $this->nome;
	}

	/**
	 * @param mixed $nome
	 *
	 * @return User
	 */
	public function setNome($nome)
	{
		$this->nome = $nome;

		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getEmail()
	{
		return $this->email;
	}

	/**
	 * @param mixed $email
	 *
	 * @return User
	 */
	public function setEmail($email)
	{
		$this->email = $email;

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
	 * @return User
	 */
	public function setPassword($password)
	{
		$this->password = sha1($password);

		return $this;
	}


}