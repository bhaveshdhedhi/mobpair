<?php

$api_url = "http://localhost/mobpair/api/users.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if(count($result) > 0)
{
 foreach($result as $row)
 {
  $output .= '
  <tr>
   <td>'.$row->first_name.'</td>
   <td>'.$row->last_name.'</td>
   <td><button type="button" name="edit" class="btn btn-primary edit" id="'.$row->id.'">Edit</button></td>
   <td><button type="button" name="delete" class="btn btn-danger delete" id="'.$row->id.'">Delete</button></td>
  </tr>
  ';
 }
}
else
{
 $output .= '
 <tr>
  <td colspan="4" align="center">No User Found</td>
 </tr>
 ';
}

echo $output;

?>