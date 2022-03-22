<?php
  $page_title = 'Seat Monitoring';
  require_once('includes/load.php');

?>

<?php include_once('layouts/header.php'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading clearfix">
                    <strong>
                        <span class="glyphicon glyphicon-th"></span>
                        <span>Seat Monitoring</span>
                    </strong>
            </div> 
                <form id="submitForm">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <select class="form-control plate" name="plate" id="plate">
                                    <option value="">Select Bus</option>
                            <?php 

                                $query = "SELECT DISTINCT plate_num FROM bus";
                                $result = $db->query($query);
                                if ($result->num_rows > 0 ) {
                                while ($row = $result->fetch_assoc()) {
                                    $plateNum = ucwords($row['plate_num']);
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
    </div>
    <div class="col-md-12">
        <div id="plate-num"></div>
    </div>    
</div>
    <!---jQuery ajax load rcords using select box --->
    <script type="text/javascript">
    $(document).ready(function(){
        $(".plate").on("change", function(){
            var platenum = $(this).val();
            if (platenum !== "") {
            $.ajax({
                url : "display.php",
                type:"POST",
                cache:false,
                data:{platenum:platenum},
                success:function(data){
                $("#plate-num").html(data);
                $('#iframeHolder').html('<iframe id="iframe" src="monitoring/app/bin/seat-monitor.html"width="100%" height="650"></iframe>');
                }
            });
            }else{
            $("#plate-num").html(" ");
            $("#iframeHolder").html(" ");
            }
        })
    });

    </script>
    <div id="iframeHolder"></div>

<?php include_once('layouts/footer.php'); ?>
