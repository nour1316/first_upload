<?php
require("vendor/autoload.php");
require "api/user.php";


$url= explode("/",$_SERVER['QUERY_STRING']);

header('Access-Control-Allow-Origin: application/json');
header("Content-type: application/json");


if ($url[1]=='v1'){

if($url[2]=='user'){
$user=new user();
if($url[3]=='all'){
 $data=$user->all();
 $res=[
  'status'=>200,
  'data'=>$data
 ];
 echo json_encode($res);

}


if($url[3]=="update"){
  header('Access-Control-Allow-Method:PUT');
  $d=file_get_contents("php://input");
$re=json_decode($d,true);

 $id=['user_id'=> $re['user_id']];
 $data=$re['userdata'];
 $result=$user->update($id,$data);
 
if($result){
  $r=[
  "status"=>201,
  "msg"=>"update successfully"
  ];
  }else{
    $r=[
      "status"=>400,
      "msg"=>"update faild"
    ];
  }

  echo json_encode($r);
}





if($url[3]=='delete'){
  header('Access-Control-Allow-Method:DELETE');
  $d=file_get_contents("php://input");
  $data=json_decode($d,true);
  
  $id=$data['id'];
 $res= $user->delete($id);
 
if($res){
  $re=[
  "status"=>201,
  "msg"=>"delete successfully"
  ];
  }else{
    $re=[
      "status"=>400,
      "msg"=>"delete faild"
    ];
  }
  
  echo json_encode($re);

}
if($url[3]=='add'){
  
  header('Access-Control-Allow-Method:POST');
  $d=file_get_contents("php://input");
$data=json_decode($d,true);
     $res=$user->add($data);
if($res){
$re=[
"status"=>201,
"msg"=>"add successfully"
];
}else{
  $re=[
    "status"=>400,
    "msg"=>"add faild"
  ];
}

echo json_encode($re);

}


}


}else{
  echo 'mklf';
}