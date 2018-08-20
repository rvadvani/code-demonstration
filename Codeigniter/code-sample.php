<?php
//Code Sample

// Update Query
$this->db->update('mytable', $data, array('id' => $id));

// Join Query
$this->db->select('users.usrID, users_profiles.usrpID')
         ->from('users')
         ->join('users_profiles', 'users.usrID = users_profiles.usrpID')
         ->get();
$this->db->where('id', $id)->delete('users');
