<?php
try{
$db = new PDO("mysql:host=localhost;dbname=lonely deneme;charset=utf8","root","");
}catch (PDOException $mesaj){
echo $mesaj->getmessage();
}

$v = $db->prepare("insert into uyeler set

         uye_adi=?, uye_sifre=?, uye_eposta=?

");
if ($_POST) {
  $isim = $_POST["isim"];
  $sifre = $_POST["sifre"];
  $eposta = $_POST["eposta"];

  if (!$isim || !$sifre || !$eposta) {
    echo "<center> message from lonely: user name, password or e-mail cant be blank </center>","<center>     <form class='' method='post'>
           <table border='0px'>
             <tr bgcolor='coral'>
             <td>
               <h2>Sign up</h2>
             </td>
           </tr>
           <tr bgcolor='green'>
             <td>
        <p> name: </p><input type='text' name='isim' value='' placeholder='name'>
        <p> password: </p><input type='password' name='sifre' value='' placeholder='password (do not write your real password)'>
        <p> mail: </p><input type='text' name='eposta' value='' placeholder='mail'>
        <input type='submit' value='Sign up'>
             </td>
             </tr>
           </table>
         </form>
         </center>";         
  }else{

$x = $v->execute(array($isim,$sifre,$eposta));

if($x) {
  echo "<script> alert('welcome to Lonely $isim'); </script> <span style='color: blue; font-family: arial;'> You will see a control panel down here! </span>";
}
}
}else{
echo '
        <center>
     <form class="" method="post">
       <table border="0px">
         <tr bgcolor="coral">
         <td>
           <h2>Sign up</h2>
         </td>
       </tr>
       <tr bgcolor="green">
         <td>
    <p> name: </p><input type="text" name="isim" value="" placeholder="name">
    <p> password: </p><input type="password" name="sifre" value="" placeholder="password (do not write your real password)">
    <p> e-mail: </p><input type="text" name="eposta" value="" placeholder="e-mail">
    <input type="submit" value="Sign up">
         </td>
         </tr>
       </table>
     </form>
     </center>
     ';
}
}
?>
