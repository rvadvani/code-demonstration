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


// file upload
$config['upload_path'] 	= './images/website/';
$config['allowed_types']   = 'gif|jpg|png';
$config['encrypt_name']    = TRUE;
$this->load->library('upload', $config);

if(isset($_FILES['picture']['name']) && !empty($_FILES['picture']['name']))
{
   if ( ! $this->upload->do_upload('picture'))
   {
       $error = array('error' => $this->upload->display_errors());
       print_r($error); die();
   }
   else
   {
       $picture = $this->upload->data('file_name');
   }
}

public function export_orders() {
         $array = $this->orders->get_orders_array();
        $filename = "orders_data.xls";
        $delimiter=";";
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="'.$filename.'";');
        // open the "output" stream
        // see http://www.php.net/manual/en/wrappers.php.php#refsect2-wrappers.php-unknown-unknown-unknown-descriptioq
        $f = fopen('php://output', 'w');

        foreach ($array as $line) {
            fputcsv($f, $line, $delimiter);
        }
}
