<?php
include('db.php');
global $conn;


function singlestudent($sid)
{
    global $conn;
    $id = mysqli_real_escape_string($conn, $sid['id']);
    $query = "select * from user where id='$id'";
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        $request = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        $data = [
            'message' => 'request record',
            'data' => $request
        ];
        return json_encode($data);
    }
}



function getstudentlist()
{
    global $conn;
    $query = 'select * from user';
    $sql = mysqli_query($conn, $query);
    if ($sql) {
        $request = mysqli_fetch_all($sql, MYSQLI_ASSOC);
        $data = [
            'message' => 'all records',
            'data'=>$request

        ];
        return json_encode($data);
    }
}


function store($student)
{
    global $conn;
    $name = mysqli_real_escape_string($conn, $student['name']);
    $mobile = mysqli_real_escape_string($conn, $student['mobile']);
    $city = mysqli_real_escape_string($conn, $student['city']);
    $query = "insert into user (name,mobile,city)
     values ('$name','$mobile','$city')";
    $result = mysqli_query($conn, $query);
    $data = [
        'message' => 'added successfully',

    ];
    return json_encode($data);


}


function updatestore($student)
{
    error_reporting(0);
    global $conn;
    $id = mysqli_real_escape_string($conn, $student['id']);

    $name = mysqli_real_escape_string($conn, $student['name']);
    $mobile = mysqli_real_escape_string($conn, $student['mobile']);
    $city = mysqli_real_escape_string($conn, $student['city']);


    $query = "update user set  name='$name',mobile='$mobile',city='$city' 
    where id = '$id'";

    $result = mysqli_query($conn, $query);
    if ($result) {
        $data = [
            'message' => 'updated successfully',

        ];
        return json_encode($data);
    } else {
        $data = [
            'message' => 'error',

        ];
        return json_encode($data);
    }



}


function delstudent($sid)
{
    global $conn;
    $id = mysqli_real_escape_string($conn, $sid['id']);
    $query = "delete from user where id='$id'";
    $result = mysqli_query($conn, $query);
    
    $data = [
        'message' => 'deleted successfully',
        
    ];
    return json_encode($data);



}


?>