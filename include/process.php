<?php

require('../include/connection.php');

if(isset($_POST['type']) != ''){

  if($_POST['type']=='delete'){
    $course_id = $_POST['course_id'];

    //Back-end Validation.
    $sql = " DELETE FROM course WHERE id ='$course_id' ";

    

    $conn->close();
  }


  if($_POST['type']=='category'){

    $course_code = $_POST['newCat'];
    

    //Back-end Validation.
    if($course_code == "")
    {
      $response = array('title' => 'Warning', 'message' => 'Data is invalid');
      echo json_encode($response);
      return;
    }

    $sql = "INSERT INTO category (category_name)
    VALUES ('$course_code')";

    if ($conn->query($sql) === TRUE) {
      $response = array('title' => 'Success', 'message' => 'Course has been successfully created.');

    } else {
      $response = array('title' => 'Error', 'message' => $conn->error . '. Please contact system administrator.');
    }

    $conn->close();
  }

}
?>




























?>