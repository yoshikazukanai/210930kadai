<?php
// POSTデータ確認
if (
    !isset($_POST['todo']) || $_POST['todo']=='' ||
    !isset($_POST['deadline']) || $_POST['deadline']=='' ||
    !isset($_POST['iken']) || $_POST['iken']==''
  ) {
    exit('ParamError');
  }

  $todo = $_POST['todo'];
  $deadline = $_POST['deadline'];
  $iken = $_POST['iken'];

// DB接続
$dbn ='mysql:dbname=gsacs_d03_03;charset=utf8;port=3306;host=localhost';
$user = 'root';
$pwd = '';

// DB接続
try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}

// 「dbError:...」が表示されたらdb接続でエラーが発生していることがわかる．

// SQL作成&実行

// todo_create.php

// SQL作成&実行
$sql = 'INSERT INTO kadai_table (id, todo, deadline, created_at, updated_at, iken) VALUES (NULL, :todo, :deadline, now(), now(), :iken)';

$stmt = $pdo->prepare($sql);

// バインド変数を設定
$stmt->bindValue(':todo', $todo, PDO::PARAM_STR);
$stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
$stmt->bindValue(':iken', $iken, PDO::PARAM_STR);
// SQL実行（実行に失敗すると$statusにfalseが返ってくる）
$status = $stmt->execute();


if ($status == false) {
    $error = $stmt->errorInfo();
    exit('sqlError:'.$error[2]);
  } else {
    header('Location:index.php');
  }
