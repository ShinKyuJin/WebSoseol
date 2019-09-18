<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<div class="container" style="text-align:center;">
  <h1 style="margin-top:10%;">순위</h1>
  <table class="table">
    <thead>
      <th>이름</th>
      <th>점수</th>
    </thead>
    <tbody>
      <?php
      include "db.php";
      $stmt = mq("SELECT * FROM USERPROFILE");
      while($stmtRow = mysqli_fetch_array($stmt)) :
       ?>
       <tr>
         <td><?php echo $stmtRow['userName']; ?></td>
         <td><?php echo $stmtRow['userPoint']; ?></td>
       </tr>
     <?php endwhile; ?>
    </tbody>
  </table>
</div>
