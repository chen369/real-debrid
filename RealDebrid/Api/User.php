<?php

namespace RealDebrid\Api;

use RealDebrid\Request\User\UserRequest;
use RealDebrid\Response\Handlers\User\UserHandler;

/**
 * /user namespace
 *
 * Provides a set of methods to retrieve some information about a Real-Debrid user
 * @package RealDebrid\Api
 * @author Valentin GOT
 * @license MIT
 * @api
 */
class User extends EndPoint {

    /**
     * Returns some information on the current user.
     *
     * @return \RealDebrid\Response\User Some information on the current user
     */
    public function get() {
        return $this->request(new UserRequest($this->token), new UserHandler());
    }
}