<?php
//Code Sample

// Update Query
$this->db->update('mytable', $data, array('id' => $id));

// Join Query
$this->db->select('users.usrID, users_profiles.usrpID')
         ->from('users')
         ->join('users_profiles', 'users.usrID = users_profiles.usrpID')
         ->get();

// Delete Query
$this->db->where('id', $id)->delete('users');

// Last Inserted ID
$insert_id = $this->db->insert_id();

// dual database
//database1 configuration 
// application/config/database.php
$db['default'] = array(
    'dsn'       => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'database1',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt'  => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);

//database2 configuration
$db['db2'] = array(
    'dsn'       => '',
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'database2',
    'dbdriver' => 'mysqli',
    'dbprefix' => '',
    'pconnect' => FALSE,
    'db_debug' => (ENVIRONMENT !== 'production'),
    'cache_on' => FALSE,
    'cachedir' => '',
    'char_set' => 'utf8',
    'dbcollat' => 'utf8_general_ci',
    'swap_pre' => '',
    'encrypt'  => FALSE,
    'compress' => FALSE,
    'stricton' => FALSE,
    'failover' => array(),
    'save_queries' => TRUE
);


$database2 = $this->load->database('db2', TRUE);

//database2 query
$database2->select('*');
$database2->from('users');
$q = $database2->get();

