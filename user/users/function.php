
<?php
require_once '../utils/dbconfig.php';
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: GET');

function error($message){
    $data=[
        'message'=>$message
    ];
    echo json_encode($data);
    exit();
}

function getUserList() {
    global $conn;

    $query = "SELECT * FROM user";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        if (mysqli_num_rows($query_run) > 0) {
            $res = mysqli_fetch_all($query_run, MYSQLI_ASSOC);
            $data = [
                'message' => 'user list fetched successfully',
                'data' => $res
            ];
        } else {
            $data = [
                'message' => 'no users found'
            ];
        }
    } else {
        $data = [
            'message' => 'internal error',
        ];
       
    }
    return json_encode($data);
   
}

// create api for fetch single api from database

function getUser($userParams){

    global $conn;

    if($userParams['id']==null){
        return error('enter your user id');
    }
   
    $userId = mysqli_real_escape_string($conn, $userParams['id']);

    $query = "SELECT * FROM user where id='$userId' LIMIT 1";
    $result = mysqli_query($conn,$query);

    if($result){
        if(mysqli_num_rows($result)==1){
            $res = mysqli_fetch_assoc($result);

            $data = [
                'message' => 'user fetched successfully',
                'data' =>  $res
            ];
            return json_encode($data);


        }
        else{
            $data = [
                'message' => 'not found user',
            ];
            return json_encode($data);

        }

    }
    else{
        $data = [
            'message' => 'internal error',
        ];
        return json_encode($data);

    }



}//create api for insert data in database

function storeUsers($userInput){
    global $conn;

    $name = mysqli_real_escape_string($conn,$userInput['name']);
    $password = mysqli_real_escape_string($conn,$userInput['password']);
    $email = mysqli_real_escape_string($conn,$userInput['email']);

        $query ="INSERT INTO user (name,email,password) values ('$name','$email','$password')";
        $result= mysqli_query($conn,$query);


        if($result){
            $data = [
                'message' => 'user created'
            ];
            return json_encode($data); 

        }
        else{
            $data = [
                'message' => 'internal error'
            ];
            return json_encode($data); 
        }
    }
    function updateUsers($userInput , $userParams){
        global $conn;
    
        if(!isset($userParams['id'])){
    
            return error('user id is not found');
    
        }else{
    
            return error('enter the user id');
    
        }
    
        $id = mysqli_real_escape_string($conn,$userParams['id']);
    
        $name = mysqli_real_escape_string($conn,$userInput['name']);
        $password = mysqli_real_escape_string($conn,$userInput['password']);
        $email = mysqli_real_escape_string($conn,$userInput['email']);
    
            $query ="UPDATE user SET name='$name',password='$password',email='$email' where id='$id'";
            $result= mysqli_query($conn,$query);
    
    
            if($result){
                $data = [
                    'message' => 'user updated'
                ];
                return json_encode($data); 
    
            }
            else{
                $data = [
                    'message' => 'internal error'
                ];
                return json_encode($data); 
            }
        }
    
    
    
    
    ?>
?>