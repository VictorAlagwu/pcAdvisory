<?php

function insert_symptom()
{
	global $con;
	if (isset($_POST['submit'])) 
{
   $cat_id = $_POST['cat_id'];
   $sym_body = $_POST['sym_body'];
   $sym_pro = $_POST['sym_pro'];
   $sym_ans = $_POST['sym_ans'];
   $sym_tags = $_POST['sym_tags'];
   $sym_checker = $_POST['sym_checker'];

     //--ADDING QUERY---
     try {
       $add_symptoms_query = "INSERT INTO symptoms(cat_id,sym_pro,";
       $add_symptoms_query.= "sym_body,sym_answer,sym_tags,checker)";
       $add_symptoms_query.= "VALUES (:cat_id,:sym_pro,:sym_body,";
       $add_symptoms_query.= ":sym_ans,:sym_tags,:sym_checker) ";
       $statement = $con->prepare($add_symptoms_query);
       $statement->execute(array(':cat_id' => $cat_id, ':sym_pro' => $sym_pro, ':sym_body' => $sym_body,':sym_ans' =>$sym_ans, ':sym_tags' => $sym_tags, ':sym_checker' => $sym_checker));
       // echo '<script>
       //           setTimeout(function(){
       //              swal({
       //                title: "Congrat!",
       //                text: "Category was added successfully added",
       //                type: "success"

       //              }, function(){
       //                window.location = "symptoms.php";
       //              });
       //            }, 1000);

       //          </script>';
       header('Location:symptoms.php');
     } catch (PDOException $e) {
       die($e->getMessage());
     }
    
   
 }
}

function update_symptom()
{
	global $con;

	include 'symptoms_edit.php';
}

function delete_symptom()
{
	global $con;
	if (isset($_GET['del'])) {
		$sym_del = $_GET['del'];
		$del_query = "DELETE FROM symptoms WHERE id = :sym_del";
		$run_del_query = $con->prepare($del_query);
		$run_del_query->execute(array(':sym_del'=>$sym_del));
		header('Location: symptoms.php');
	}
	
}