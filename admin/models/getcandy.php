<?php
  require_once $_SERVER['DOCUMENT_ROOT'].'/Private/Express Vote/core/init.php';

  $candy = isset($_POST['candy'])?$_POST['candy']:'';


  if(isset($candy) and !empty($candy)){
    $result_candid = $db->query("SELECT c.*, p.* FROM candidates c, position p WHERE c.parent_id = p.parent_id AND c.deleted = p.deleted AND id = $candy");

    while($row = mysqli_fetch_assoc($result_candid)):
    $position = $row['post'];
    $name = $row['firstname'].' '.$row['lastname'];
    $level = $row['level'];
    $gender = $row['gender'];
    $image = $row['image'];

    $data = 
      '
      <div class="table-responsive">
        <img src="'.$image.'" class="img-thumbnail mx-auto d-block" style="width: 200px; height:200px;" alt="Image">
        <br>
        <table class="table table-borderless table-hover table-sm">
          <tr>
            <th>Position :</th>
            <td>'.$position.'</td>
          </tr>
          <tr>
            <th>Name :</th>
            <td>'.$name.'</td>            
          </tr>            
          <tr>
            <th>Level :</th>
            <td>'.$level.'</td>            
          </tr> 
          <tr>
            <th>Gender :</th>
            <td>'.$gender.'</td>            
          </tr>                     
        </table>
      </div>
      ';
    endwhile;
    echo $data;
  }
  else {
  echo '<center><ul class="list-group"><li class="list-group-item">'.'Nothing to show'.'</li></ul></center>';
  }
?>