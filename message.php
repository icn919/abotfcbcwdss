<?php
  $page_title = 'Messaging';
  require_once('includes/load.php');
?>

<?php include_once('layouts/header.php'); ?>
    <link href="libs/css/reset.css" rel="stylesheet" type="text/css">
    <link href="libs/css/style.css" rel="stylesheet" type="text/css">
<div class="col-md-12">
    <div class="panel panel-default">
        <div class="panel-heading clearfix">
                <strong>
                    <span class="glyphicon glyphicon-th"></span>
                    <span>Messaging</span>
                </strong>
    </div> 
        <div id="container">
                <div class="page_content">
                </div>
                    <div class="comment_input">
                           <form name="form1">
                               <input type="text" name="name" placeholder="<?php echo remove_junk(ucfirst($user['name'])); ?>" value="<?php echo remove_junk(ucfirst($user['name'])); ?>" class="left field" readonly/></br></br>
                                <textarea id="comments" name="comments" placeholder="Leave Message Here..." style="width:440px; height:100px;"></textarea></br></br>
                                <a href="#" onClick="commentSubmit(); clearText(); reload()" class="button">Post</a></br>
                            </form>
                    </div>
                <div id="comment_logs" style="overflow-y:scroll; overflow-x:hidden; height:400px;">
                            Loading message...
            </div>
        </div>
    </div> 
</div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <script>

            function reload() {
                    reload = location.reload("message.php");
                }

            function clearText() {
                    document.getElementById("comments").value = "";
                }

            function commentSubmit(){
                if(form1.name.value == '' && form1.comments.value == ''){ //exit if one of the field is blank
                    alert('Enter your message !');
                    return;
                }
                var name = form1.name.value;
                var comments = form1.comments.value;
                var xmlhttp = new XMLHttpRequest(); //http request instance
                
                xmlhttp.onreadystatechange = function(){ //display the content of insert.php once successfully loaded
                    if(xmlhttp.readyState==4&&xmlhttp.status==200){
                        document.getElementById('comment_logs').innerHTML = xmlhttp.responseText; //the chatlogs from the db will be displayed inside the div section
                    }
                }
                xmlhttp.open('GET', 'insert_message.php?name='+name+'&comments='+comments, true); //open and send http request
                xmlhttp.send();
                }
            
                $(document).ready(function(e) {
                    $.ajaxSetup({cache:false});
                    setInterval(function() {$('#comment_logs').load('logs.php');}, 2000);
                });
                
        </script>
        
<?php include_once('layouts/footer.php'); ?>
