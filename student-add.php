<?php
 
require 'student_db.php';
 
// Nếu người dùng submit form
if (!empty($_POST['add_student']))
{
    // Lay data
    $name       = isset($_POST['name']) ? $_POST['name'] : '';
    $sex        = isset($_POST['sex']) ? $_POST['sex'] : '';
    $birthday   = isset($_POST['birthday']) ? $_POST['birthday'] : '';
     
    
    $errors = array();
    if (empty($name)){
        $errors['sv_name'] = 'Chưa nhập tên sinh vien';
    }
     
    if (empty($sex)){
        $errors['sv_sex'] = 'Chưa nhập giới tính sinh vien';
    }
    if (empty($birthday)){
        $errors['sv_birthay'] = 'Chưa nhập tuổi  sinh vien';
    }
     
    // Neu ko co loi thi insert
    if (!$errors){
    	
    	$add = new DB_student;
    	$sql = "INSERT INTO tb_sinhvien(sv_name,sv_sex,sv_birthday) VALUES ('$name','$sex','$birthday')";
      $add->query($sql);
      
        // Trở về trang danh sách
        header("location: student-list.php");
    }
}
 
?>
 
<!DOCTYPE html>
<html>
    <head>
        <title>Thêm sinh vien</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <h1>Thêm sinh vien </h1>
        <a href="student-list.php">Trở về</a> <br/> <br/>
        <form method="post" action="student-add.php">
            <table width="50%" border="1" cellspacing="0" cellpadding="10">
                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="<?php echo !empty($name['sv_name']) ? $name['sv_name'] : ''; ?>"/>
                        <?php if (!empty($errors['sv_name'])) echo $errors['sv_name']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Gender</td>
                    <td>
                        <select name="sex">
                            <option value="Nam">Nam</option>
                            <option value="Nữ" <?php if (!empty($sex['sv_sex']) && $sex['sv_sex'] == 'Nữ') echo 'selected'; ?>>Nu</option>
                        </select>
                        <?php if (!empty($errors['sv_sex'])) echo $errors['sv_sex']; ?>
                    </td>
                </tr>
                <tr>
                    <td>Birthday</td>
                    <td>
                        <input type="text" name="birthday" value="<?php echo !empty($birthday['sv_birthday']) ? $birthday['sv_birthday'] : ''; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="add_student" value="Lưu"/>
                    </td>
                </tr>
            </table>
        </form>
    </body>
</html>