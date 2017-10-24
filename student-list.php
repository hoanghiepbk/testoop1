<?php

require 'student_db.php';

$a = new DB_student;
$sql = "SELECT * FROM tb_sinhvien";
$a->query($sql);


?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Danh sách sinh vien</title>
       
    </head>
    <body>
        <h1>Danh sách sinh vien</h1>
        <a href="student-add.php">Thêm sinh viên</a> <br/> <br/>
        <table width="100%" border="2" cellspacing="0" cellpadding="15">
            <tr>
                <td>ID</td>
                <td>Name</td>
                <td>Gender</td>
                <td>Birthday</td>
                <td>Options</td>
            </tr>
            <?php while ($data=$a->get_students()){ ?>
            <tr>
                <td><?php echo $data['sv_id']; ?></td>
                <td><?php echo $data['sv_name']; ?></td>
                <td><?php echo $data['sv_sex']; ?></td>
                <td><?php echo $data['sv_birthday']; ?></td>
                <td>
                    <form method="post" action="student-delete.php">
                        <input onclick="window.location = 'student-edit.php?id=<?php echo $data['sv_id']; ?>'" type="button" value="Sửa"/>
                        <input type="hidden" name="id" value="<?php echo $data['sv_id']; ?>"/>
                        <input onclick="return confirm('Bạn có chắc muốn xóa không?');" type="submit" name="delete" value="Xóa"/>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </body>
</html>