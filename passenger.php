<?php
  ob_start();
  require_once('includes/load.php');
?>
    <link rel="icon" href="img/iconcelyrosa.png">
    <link rel="stylesheet" href="libs/css/main.css" />
    <meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=5.0, minimum-scale=0.86">
<body id="formlogin">
    <script type="text/javascript">
            function back(){
            window.location.replace('main.php');
            }   
    </script>

  <div class="pass-container">
      <div class="text-center"><input type="button" name="back" onclick="back()" value="Back">
            <h2>Welcome Passenger</h2>
         <p>Select and Track Bus</p>
        <form id="submitForm">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2"><label style="color: whitesmoke">Body Number</label>
                                <select class="form-control plate" name="plate" id="plate">
                                    </label><option value="">- - - - -</option>
                            <?php 

                                $query = "SELECT DISTINCT body_num FROM bus";
                                $result = $db->query($query);
                                if ($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {
                                    $plateNum = ucwords($row['body_num']);
                                    echo "<option value='$plateNum'>$plateNum</option>";
                                }
                                }

                            ?>
                                </select>
                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                            </div>
                        </div>
                    </div>
                </form>
          </div>
    </div><br><br>

        <!---jQuery ajax load rcords using select box --->
        <script type="text/javascript">
        $(document).ready(function(){
            $(".plate").on("change", function(){
                var platenum = $(this).val();
                if (platenum !== "") {
                $.ajax({
                    type:"POST",
                    cache:false,
                    data:{platenum:platenum},
                    success:function(data){
                    $('#iframeHolder').html('<iframe id="iframe" src="monitoring/app/bin/trail.html"width="97%" height="800"></iframe>');
                    }
                });
                }else{
                $("#iframeHolder").html(" ");
                }
            })
        });
        </script>
        <div style="text-align:center;" id="iframeHolder"></div>
    </div>
  </div>

</body>
<?php include_once('layouts/footer.php'); ?>
