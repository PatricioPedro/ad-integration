<?php

namespace App\Models;
use LdapRecord\Models\Model;

class LdapUser extends Model{
    public static $objectClasses = [
        'top',
        'person',
        'organizationalperson',
        'user',
    ];
    
}

