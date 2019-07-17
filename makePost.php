<?php
  include "db.php";
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form action="makePost_ok.php" method="post">
      <table>
        <thead>
          <th>
            id:
            <input type="text" name="userID" value="">
            <input type="text" name="boardTitle">
          </th>

        </thead>
        <tbody>
          <td>
            <textarea name="boardContent" rows="8" cols="80"></textarea>
          </td>
          <td> <input type="submit"> </td>
        </tbody>
      </table>
    </form>
  </body>
</html>
