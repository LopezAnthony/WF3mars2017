<?php

namespace Service;


use Entity\User;
use Symfony\Component\HttpFoundation\Session\Session;

class UserManager
{
    /**
     * @var Session
     */
    private $session;

    /**
     * UserManager constructor.
     * @param Session $session
     */
    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    /**
     * Encode un mot de passe avec l'algo Bcrypt
     *
     * @param string $password
     * @return string
     */
    public function encodePassword($password)
    {
        return password_hash($password, PASSWORD_BCRYPT);
    }

    /**
     * Vérifie la correspondance entre un mdp en clair et un mdp encodé
     *
     * @param string $plainPassword
     * @param string $encodePassword
     * @return bool
     */
    public function verifyPassword($plainPassword, $encodePassword)
    {
        return password_verify($plainPassword, $encodePassword);
    }

    /**
     * @param User $user
     */
    public function login(User $user)
    {
        $this->session->set('user', $user);
    }
}