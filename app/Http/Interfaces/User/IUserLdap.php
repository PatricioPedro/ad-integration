<?php

namespace  App\Http\Interfaces\User;

interface IUserLdap {
    function save ($user);
    function search ($info);
}