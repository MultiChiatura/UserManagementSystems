<?php

if (! function_exists('checkRole')) {
    function checkRole($roles)
    {
        $authRole = auth()->user()->role->name;
        if (in_array($authRole, $roles)) {
            return true;
        }
        return false;
    }
}
