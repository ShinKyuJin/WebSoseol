<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="galleryBoard.css">
</head>

<body>
    <?php include "nav.php"; ?>
    <div class="container">
        <div class="tab_menu">
            <ul style="height: auto;">
            </ul>
        </div>
        <form class="bbs" enctype="multipart/form-data" action="galleryUpload_ok.php" method="post" style="width: 100%;">
            <table class="writing">
                <tbody>
                    <tr class="form-group">
                        <th scope="row">제목</th>
                        <td colspan="3">
                            <input type="text" name="boardTitle" class="form-control" placeholder="제목">
                        </td>
                        </th>

                    <tr class="md-form">
                        <th scope="row">내용</th>
                        <td colspan="3">
                            <textarea name="boardContent" id="ckeditor" style="resize: none; border: 1px solid #e1e1e1;"></textarea>
                        </td>
                        </th>

                    <tr class="md-form">
                        <th scope="row">사진첨부</th>
                        <td colspan="3">
                        <form id="form" runat="server">
                            <input type='file' id="imgfile" name="boardImage"/>
                            <br /><b>미리보기</b><br />
                            <img id="image_preview" src="#" width="200px" height="200px" alt="your image"/>
                        </form>
                        </td>
                        </th>
                </tbody>
            </table>

            <div class="buttonBox">
              <input type="hidden" name="userID" value="<?php echo $_SESSION['userID']; ?>">
              <div id="buttonSub"></div>
            </div>
         </form>
    </div>
    <?php include "footer.php"; ?>
</body>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">
window.onload = function() {
    CKEDITOR.replace('ckeditor', {
        height: '500px'
    });
};

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            $("#buttonSub").innerHTML = '<input type="submit" name="" value="저장" style="float:right;" class="buttons">';

            reader.onload = function(e) {
                $('#image_preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
            }
    }

    $("#imgfile").change(function() {
        readURL(this);
    });
</script>

</html>
