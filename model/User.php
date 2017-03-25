<?php

class User
{
    private $id;
    private $username;
    private $password;
    private $forename;
    private $name;
    private $mail;

    public function __construct(int $id, string $username, string $password, string $forename, string $name, string $mail)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->forename = $forename;
        $this->name = $name;
        $this->mail = $mail;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getForename(): string
    {
        return $this->forename;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getMail(): string
    {
        return $this->mail;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

}