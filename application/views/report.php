<!-- views/pages/index.ejs -->

<!DOCTYPE html>
<html lang="en">

<style type="text/css">
    .list-group {
        margin-bottom: 0px;
    }

    .list-group.list-group-root {
        padding: 0;
        overflow: hidden;
    }

    .list-group.list-group-root .list-group {
        margin-bottom: 0;
    }

    .list-group.list-group-root .list-group-item {
        border-radius: 0;
        border-width: 1px 0 0 0;
    }

    .list-group.list-group-root>.list-group-item:first-child {
        border-top-width: 0;
    }

    .list-group.list-group-root>.list-group>.list-group-item {
        padding-left: 30px;
    }

    .list-group.list-group-root>.list-group>.list-group>.list-group-item {
        padding-left: 45px;
    }

    .list-group-item .glyphicon {
        margin-right: 5px;
    }


    .badge:hover {
        color: #ffffff;
        text-decoration: none;
        cursor: pointer;
    }

    .badge-error {
        background-color: #d9534f;
    }

    .badge-error:hover {
        background-color: #953b39;
    }

    .badge-warning {
        background-color: #f0ad4e;
    }

    .badge-warning:hover {
        background-color: #c67605;
    }

    .badge-success {
        background-color: #5cb85c;
    }

    .badge-success:hover {
        background-color: #356635;
    }

    .badge-primary {
        background-color: #337ab7;
    }

    .badge-primary:hover {
        background-color: #2d6987;
    }

    .badge-info {
        background-color: #5bc0de;
    }

    .badge-info:hover {
        background-color: #2d6987;
    }

    .badge-inverse {
        background-color: #333333;
    }

    .badge-inverse:hover {
        background-color: #1a1a1a;
    }
</style>

<body class="container">
    <main>
        <div class="col-sm-12">
            <form method="POST" action="">
                <div class="row">
                    <div class="col-md-2 mb-3">
                        <label for="sel1">รับฟ้องเมื่อ : </label>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <select class="form-control" id="sel1" name="month">
                                <option value="0" <?php echo ($selected_month == "0" ? "selected" : "");?>>## ทุกเดือน ##</option>
                                <option value="1" <?php echo ($selected_month == "1" ? "selected" : "");?>>มกราคม</option>
                                <option value="2" <?php echo ($selected_month == "2" ? "selected" : "");?>>กุมภาพันธ์</option>
                                <option value="3" <?php echo ($selected_month == "3" ? "selected" : "");?>>มีนาคม</option>
                                <option value="4" <?php echo ($selected_month == "4" ? "selected" : "");?>>เมษายน</option>
                                <option value="5" <?php echo ($selected_month == "5" ? "selected" : "");?>>พฤษภาคม</option>
                                <option value="6" <?php echo ($selected_month == "6" ? "selected" : "");?>>มิถุนายน</option>
                                <option value="7" <?php echo ($selected_month == "7" ? "selected" : "");?>>กรกฎาคม</option>
                                <option value="8" <?php echo ($selected_month == "8" ? "selected" : "");?>>สิงหาคม</option>
                                <option value="9" <?php echo ($selected_month == "9" ? "selected" : "");?>>กันยายน</option>
                                <option value="10" <?php echo ($selected_month == "10" ? "selected" : "");?>>ตุลาคม</option>
                                <option value="11" <?php echo ($selected_month == "11" ? "selected" : "");?>>พฤศจิกายน</option>
                                <option value="12" <?php echo ($selected_month == "12" ? "selected" : "");?>>ธันวาคม</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 mb-3">
                        <div class="form-group">
                            <select class="form-control" id="sel2" name="year">
                                <option value="0">## ทุกปี ##</option>
                                <?php
                                    for($i=date("Y");$i>=date("Y")-20;$i--) {
                                        $sel = ($i == $selected_year) ? 'selected' : '';
                                        $yearList = $i+543;
                                        echo "<option value=".$i." ".$sel.">".$yearList."</option>"; 
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2 mb-3">
                        <button type="submit" class="btn btn-warning">ค้นหา</button>
                    </div>
                </form>
            </div>
        
       
            
            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="panel panel-primary">
                        <!-- Default panel contents -->
                        <div class="panel-heading" style="font-size:18px">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            <label> รายงาน : </label> สรุปข้อมูลคดี 4 ประเภท (แยกตามภาค)

                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">รายชื่อศาล</th>
                                    <th class="text-center">ม.112</th>
                                    <th class="text-center">ค้ามนุษย์</th>
                                    <th class="text-center">ความมั่นคง</th>
                                    <th class="text-center">ประมง</th>
                                    <th class="text-center">รวม</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i=1; 
                                $summary_t1 = 0;
                                $summary_t2 = 0;
                                $summary_t3 = 0;
                                $summary_t4 = 0;
                                $summary_all = 0;
                            ?>
                            <?php foreach($datas as $data) { ?>

  
                                                <tr>
                                                    <td width="5%" class="text-center">
                                                        
                                                        <?php echo $i; ?>
                                                    </td>
                                                    <td width="35%">

                                                        <!--div class="just-padding"><div-->
                                                        <div class="list-group list-group-root expand" id="expand" expand_id="<?php echo $i; ?>">
                                                            
                                                            <!--a href="/report/department/<%= department.dept_id %>/parts" call="dept" dept="<%= department.dept_id %>" class="list-group-item">
                                                                </a-->
                                                            <i class="glyphicon glyphicon-chevron-right" ></i>
                                                                <?php echo $data->dept_name; ?>

                                                                    <!--span class="badge badge-primary">
                                                                            echo $data->count_all; 
                                                                    </span-->
                                                            
                                                            </div>
                                                        <!--div class="info" id="info<?php echo $i; ?>" style="">
                                                            <ul>
                                                                <li>info1</li>
                                                                <li>info2</li>
                                                                <li>info3</li>
                                                                <li>info4</li>
                                                                <li>info5</li>
                                                            </ul>
                                                        </div-->
                                
                                                    </td>
                                                    <td align="center" width="10%">
                                                        <?php echo $data->count_t1;?>
                                                    </td>
                                                    <td align="center" width="10%">
                                                        <?php echo $data->count_t2;?>
                                                    </td>
                                                    <td align="center" width="10%">
                                                        <?php echo $data->count_t3;?>
                                                    </td>
                                                    <td align="center" width="10%">
                                                        <?php echo $data->count_t4;?>
                                                    </td>
                                                    <td align="center" width="10%">
                                                        <b><?php echo $data->count_all;?></b>
                                                    </td>
                                                    <td align="center" width="10%">
                                                        <!--a href="/report/persons/department/<%= department.dept_id %>" class="btn btn-info" target="_blank">
                                                            view
                                                        </a>
                                                        <a href="/excel/persons/department/<%= department.dept_id %>" class="btn btn-success" target="_blank">
                                                            excel
                                                        </a-->
                                                    </td>
                                                </tr>
                                                <?php 
                                                
                                                        $summary_t1 += $data->count_t1;
                                                        $summary_t2 += $data->count_t2;
                                                        $summary_t3 += $data->count_t3;
                                                        $summary_t4 += $data->count_t4;
                                                        $summary_all += $data->count_all;
                                                        $i++;
                                                    }
                                                ?>
                                                <tr>
                                                    <td colspan="2" align="center">
                                                        <b>รวมทั้งหมด</b>
                                                    </td> 
                                                    <td align="center">
                                                        <b><?php echo $summary_t1;?></b>
                                                    </td> 
                                                    <td  align="center">
                                                        <b><?php echo $summary_t2;?></b>
                                                    </td> 
                                                    <td align="center">
                                                        <b><?php echo $summary_t3;?></b>
                                                    </td> 
                                                    <td align="center">
                                                        <b><?php echo $summary_t4;?></b>
                                                    </td> 
                                                    <td align="center">
                                                        <b><?php echo $summary_all;?></b>
                                                    </td> 
                                                    <td>
                                                    </td>
                                                </tr>
                            </tbody>
                        </table>


                        </div>
                        <!-- End count by department-->
                        </div>
                        </div>
                        </div>

                        <div class="col-sm-12">
                            <hr>

                        </div>



    </main>

</body>




<body class="container">
    <main>
        <div class="col-sm-12">

            <div class="row">
                <div class="col-md-12 mb-3">
                    <div class="panel panel-primary">
                        <!-- Default panel contents -->
                        <div class="panel-heading" style="font-size:18px">
                            <span class="glyphicon glyphicon-list" aria-hidden="true"></span>
                            <label> รายงาน : </label> สรุปข้อมูลคดี 4 ประเภท (แยกตามภาค และศาล)

                        </div>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">รายชื่อศาล</th>
                                    <th class="text-center">ม.112</th>
                                    <th class="text-center">ค้ามนุษย์</th>
                                    <th class="text-center">ความมั่นคง</th>
                                    <th class="text-center">ประมง</th>
                                    <th class="text-center">รวม</th>
                                    <th class="text-center"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                $i=1; 
                                $i_display = 1;
                                $summary_t1 = 0;
                                $summary_t2 = 0;
                                $summary_t3 = 0;
                                $summary_t4 = 0;
                                $summary_all = 0;

                                
                                $summary_sector_t1 = 0;
                                $summary_sector_t2 = 0;
                                $summary_sector_t3 = 0;
                                $summary_sector_t4 = 0;
                                $summary_sector_all = 0;


                                $temp_dept_id = 0;
                                $temp_footer_dept_id = 0;
                                $flag = 0;

                                $max_item = 1;
                            ?>
                            <?php foreach($datas_by_sector as $data) { 
                                    //Group  header
                                    if($temp_dept_id == 0 || $temp_dept_id != $data->dept_id){
                                ?>
                                    <tr>
                                        <td width="100%" colspan="8">
                                            <b><?php
                                                echo $data->dept_name; 
                                            ?></b>
                                        </td>
                                    </tr>
                                <?php
                                        //Reset data
                                        $temp_dept_id = $data->dept_id;
                                        $i_display = 1;
                                    }                                                  
                                ?>
                            <tr>
                                <td width="5%" class="text-center">
                                    <?php echo $i_display; ?>
                                </td>
                                <td width="35%">

                                    <!--div class="just-padding"><div-->
                                    <div class="list-group list-group-root expand" id="expand" expand_id="<?php echo $i; ?>">
                                        
                                        <!--a href="/report/department/<%= department.dept_id %>/parts" call="dept" dept="<%= department.dept_id %>" class="list-group-item">
                                            </a-->
                                        
                                        <i class="glyphicon glyphicon-chevron-right" ></i>
                                        <?php echo $data->sector_name; ?>
                                                <!--span class="badge badge-primary">
                                                        echo $data->count_all; 
                                                </span-->
                                        
                                    </div>                                
                                </td>
                                <td align="center" width="10%">
                                    <?php echo $data->count_t1;?>
                                </td>
                                <td align="center" width="10%">
                                    <?php echo $data->count_t2;?>
                                </td>
                                <td align="center" width="10%">
                                    <?php echo $data->count_t3;?>
                                </td>
                                <td align="center" width="10%">
                                    <?php echo $data->count_t4;?>
                                </td>
                                <td align="center" width="10%">
                                    <b><?php echo $data->count_all;?></b>
                                </td>
                                <td align="center" width="10%">
                                    <!--a href="/report/persons/department/<%= department.dept_id %>" class="btn btn-info" target="_blank">
                                        view
                                    </a>
                                    <a href="/excel/persons/department/<%= department.dept_id %>" class="btn btn-success" target="_blank">
                                        excel
                                    </a-->
                                </td>
                            </tr>
                                <?php
                                
                                
                                    $summary_sector_t1 += $data->count_t1;
                                    $summary_sector_t2 += $data->count_t2;
                                    $summary_sector_t3 += $data->count_t3;
                                    $summary_sector_t4 += $data->count_t4;
                                    $summary_sector_all += $data->count_all;
                                    //Group  header

                                    


                                    if($temp_footer_dept_id  < 0){
                                        $temp_footer_dept_id = $data->dept_id;
                                    //}else if($temp_footer_dept_id != $data->dept_id){
                                        //Reset data
                                        $temp_footer_dept_id = $data->dept_id;
                                ?>
                                    <tr>
                                        <td colspan="2" align="center">
                                            <b>รวมคดีรายภาค</b>
                                        </td> 
                                        <td align="center">
                                            <b><?php echo $summary_sector_t1;?></b>
                                        </td> 
                                        <td  align="center">
                                            <b><?php echo $summary_sector_t2;?></b>
                                        </td> 
                                        <td align="center">
                                            <b><?php echo $summary_sector_t3;?></b>
                                        </td> 
                                        <td align="center">
                                            <b><?php echo $summary_sector_t4;?></b>
                                        </td> 
                                        <td align="center">
                                            <b><?php echo $summary_sector_all;?></b>
                                        </td> 
                                        <td>
                                        </td>
                                    </tr>
                                <?php

                                
                                        $max_item = 1;
                                        $summary_sector_t1 = 0;
                                        $summary_sector_t2 = 0;
                                        $summary_sector_t3 = 0;
                                        $summary_sector_t4 = 0;
                                        $summary_sector_all = 0;
                                   }  

                                ?>
                            <?php 

                                    $summary_t1 += $data->count_t1;
                                    $summary_t2 += $data->count_t2;
                                    $summary_t3 += $data->count_t3;
                                    $summary_t4 += $data->count_t4;
                                    $summary_all += $data->count_all;
                                    $i++;
                                    $i_display++;
                                }
                            ?>
                            <tr>
                                <td colspan="2" align="center">
                                    <b>รวมทั้งหมด</b>
                                </td> 
                                <td align="center">
                                    <b><?php echo $summary_t1;?></b>
                                </td> 
                                <td  align="center">
                                    <b><?php echo $summary_t2;?></b>
                                </td> 
                                <td align="center">
                                    <b><?php echo $summary_t3;?></b>
                                </td> 
                                <td align="center">
                                    <b><?php echo $summary_t4;?></b>
                                </td> 
                                <td align="center">
                                    <b><?php echo $summary_all;?></b>
                                </td> 
                                <td>
                                </td>
                            </tr>
                            </tbody>
                        </table>


                        </div>
                        <!-- End count by department-->
                        </div>
                        </div>
                        </div>

                        <div class="col-sm-12">
                            <hr>

                        </div>



    </main>

</body>

<script>
    // $(document).ready(function(){
    
    //     $(".info").hide();

    //     $('tr').click(function(){
    //         var i =  $('tr').index(this);
    //         $("#info"+i).slideToggle(400);
    //     }); 
    // });

</script>

</html>
