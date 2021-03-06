<?php

namespace RealDebrid\Api;
use RealDebrid\Request\Forum\ForumsRequest;
use RealDebrid\Request\Forum\TopicsRequest;

/**
 * /forum namespace
 *
 * Provides a set of methods to retrieve Real-Debrid forums and their topics
 * @package RealDebrid\Api
 * @author Valentin GOT
 * @license MIT
 * @api
 */
class Forum extends EndPoint {

    /**
     * Get the list of all forums with their category names
     *
     * @return \stdClass List of forums
     */
    public function forums() {
        return $this->request(new ForumsRequest($this->token));
    }

    /**
     * Get the list of all topics inside the concerned forum
     *
     * Warning: You can not use both offset and page at the same time, page is prioritized in case it happens.
     * @param int $id Forum ID
     * @param bool|true $meta TRUE to show meta information; FALSE otherwise
     * @param int $page Pagination system
     * @param int $limit Entries returned per page / request (must be within 0 and 100, default: 50)
     * @param int|null $offset Starting offset (must be within 0 and X-Total-Count HTTP header)
     * @return \stdClass List of topics
     */
    public function topics($id, $meta = true, $page = 1, $limit = 50, $offset = null) {
        return $this->request(new TopicsRequest($this->token, $id, $meta, $page, $limit, $offset));
    }
}