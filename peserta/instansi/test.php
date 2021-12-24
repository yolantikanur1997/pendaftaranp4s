<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
</head>
<body>
<div class="container">
    <h1>Check Nama</h1>
    <div class="form-group">
        <input class="form-control" placeholder="Check Nama dsini" id="username">
    </div>
    <div class="output"></div>
</div>
</body>
</html>
<script type="text/javascript">
    $(document).ready(function(){
        var app = {
            check: function(){
                var userVal = $("#username").val();
                $.ajax({
                    url: "cekusername.php",
                    method: "POST",
                    data: {userVal: userVal},
                    success: function(response){
                        $(".output").html(response).fadeIn("slow")
                        
                    }
                })
            }
        }

    $("#username").keyup(app.check)
    })
</script>