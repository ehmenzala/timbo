<?php

class UserService {

  public function __construct($conn, $userId) {
    $this->conn = $conn;
    $this->userId = $userId;
  }

  public function getUserMenuData() {
    $personInfoSQL = "";
    $personInfoQuery = sqlsrv_query($this->conn, $personInfoSQL);
    $personInfo = sqlsrv_fetch_array($personInfoQuery);

    $userInfoSQL = "SELECT * FROM bt_tb_user WHERE user_id='$this->userId'";
    $userInfoQuery = sqlsrv_query($this->conn, $userInfoSQL);
    $userInfo = sqlsrv_fetch_array($userInfoQuery);
    
    $userSkeySQL = "SELECT CONVERT(VARCHAR(8), GETDATE(),112) + '_' + '$this->userId' AS skey";
    $userSkeyQuery = sqlsrv_query($this->conn, $userSkeySQL);
    $userSkey = sqlsrv_fetch_array($userSkeyQuery);

    $getAppsSQL="SELECT * FROM bt_portal_apps WHERE estado='1' ORDER BY cod_id";
    $apps = sqlsrv_query($this->conn, $getAppsSQL);

    return [
      'nombres' => $personInfo['nombres'] ?? '',
      'registro' => $personInfo['user_id'] ?? '',
      'avatar' => $userInfo['avatar'] ?? 'default.png',
      'skey' => $userSkey['skey'] ?? '',
      'apps' => $apps ?? ''
    ];

  }
}
