<?php 

require "conn.php";

$strSQL = "SELECT * FROM user";
$obj = mysqli_query($link, $strSQL);
// while($row = mysqli_fetch_array($obj)){
//     echo $row[0] . "<br>";
// }
?>

<div class="box-body table-responsive">
    <table class="table table-bordered table-hover" >
        <thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            
            while($rows = mysqli_fetch_array($obj)){
            
            ?>
            <tr>
                <td></td>
                <td><?=$rows[0] ?></td>
                <td><?=$rows[2] ?></td>
                <td><?=$rows['email'] ?></td>
                <td><button class="btn btn-danger btn-delUser" data="<?=$rows[0]?>">DEL</button></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>


<script>
    $(".btn-delUser").click(function(){
        // alert($(this).attr("data"));
        var idDel = $(this).attr("data");
        var request = $.ajax({
            method: "POST",
            url: "./scripts/delUser.php",
            data: {id : idDel}
        });

        request.done(function(){
            $("#showUser").load("./scripts/showUser.php");
        });
    });
</script>