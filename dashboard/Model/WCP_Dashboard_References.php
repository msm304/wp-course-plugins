<?php
class WCP_Dashboard_References
{
    private $db,
        $referencesTable;
    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->referencesTable = $this->db->prefix . 'wcp_course_references';
    }

    public function find()
    {
    }
}
