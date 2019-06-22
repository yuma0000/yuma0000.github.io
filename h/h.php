<?php

$name = $_POST['name'];
$contents = $_POST['contents'];
$contents = nl2br($contents);

$data = "<hr>\r\n";
$data = $data."<p>player:".$name."</p>\r\n";
$data = $data."<p>text:</p>\r\n";
$data = $data."<p>".$contents."</p>\r\n";

 print('<p>投稿者:'.$name.'</p>');
print('<p>テキスト:</p>');
print('<p>'.$contents.'</p>');
 
 
$data = $data."";

$keijban_file = 'keijiban.html';

$fp = fopen($keijban_file, 'ab');

if ($fp){
    if (flock($fp, LOCK_EX)){
        if (fwrite($fp,  $data) === FALSE){
            print('ファイル書き込みに失敗しました');
        }

        flock($fp, LOCK_UN);
    }else{
        print('ファイルロックに失敗しました');
    }
}

fclose($fp);

?>
