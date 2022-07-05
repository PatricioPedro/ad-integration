<?php

namespace App\Application\User;

use App\Http\Interfaces\User\IUserLdap;
use Adldap\AdldapInterface;
use App\Exceptions\UserLDAPNotFoundException;

class UserLdap implements IUserLdap
{

    private $ldap;

    public function __construct(AdldapInterface $ldap)
    {
        $this->ldap = $ldap;
    }

    function save($user)
    {
        $user->save();
    }

    function search($info)
    {
        $user = $this->ldap->search()->users()->find($info);

        if ($user == NULL) {
            throw new UserLDAPNotFoundException;
        }

        return $user;
    }
}
