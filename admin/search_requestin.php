<html>
	<body>
    

             <div id='show' class="table-responsive p-10">
                <table class='table table-bordered' style="width: 250%">
                    <thead>
                    <tr align='center'>
                        <th>ລຳດັບ</th>
                        <th>ລະຫັດເອກະສານ</th>
                        <th>ເລກທີຂາເຂົ້າ</th>
                        <th>ວັນເດືອນປີເຂົ້າ</th>
                        <th>ປະເພດຄຳຮ້ອງກ່ຽວກັບບັນຫາໃດ</th>
                        <th>ເຈົ້າຂອງຄຳຮ້ອງ</th>
                        <th>ເຈົ້າຂອງຄຳຮ້ອງ</th>
                        <th>ໜ່ວຍງານຮັບຜິດຊອບ</th>
                        <th>ພະນັກງານຮັບຜິດຊອບ</th>
                        <th>ແກ້ໄຂຂໍ້ມູນ</th>
                        <th>ລົບຂໍ້ມູນ</th>
                        
                      </tr>
                </thead>
                   
                <?php
                include 'server/connect.php';
                $start=$_POST['start'];
                $end=$_POST['end'];
                $Item_No=$_POST['Item_No'];
                $Item_ID=$_POST['Item_ID'];
            
              
              


                
                if($start=="" or $end==""){$btw="";}
                else{ $btw="and Cri_ReQuestIn.Item_Date between '$start' and '$end'";}


              

                if($Item_No==""){$b="";}
                else{ $b="and (Cri_ReQuestIn.Item_No like N'%$Item_No%' or Cri_ReQuestIn.Item_No like N'$Item_No%')";}

                if($Item_ID==""){$d="";}
                else{ $d="and (Cri_ReQuestIn.Item_ID like N'%$Item_ID%' or Cri_ReQuestIn.Item_ID like N'$Item_ID%')";}

               


                $i=1;
                $sql = "select *from Cri_ReQuestIn where 1=1 $btw $b $d order by Cri_ReQuestIn.item_Cnt asc";
                $query = sqlsrv_query( $conn, $sql );

                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
                {
                  $i++;
                ?>

                    <tbody>

                    <tr>
                        <td align='center'><?PHP echo $result["item_Cnt"]; ?></td>
                        <td align='center'><?PHP echo $result["Item_ID"]; ?></td>
                        <td align='center'><?PHP echo $result["Item_No"]; ?></td>
                        <?php
                        $date=$result["Item_Date"];
                        ?>
                        <td align='center'><?PHP echo date_format($date,'d/m/Y');?></td>
                        <td align='center'><?PHP echo $result["Request_Type"]; ?></td>
                        <td align='center'><?PHP echo $result["Request_Pers"]; ?></td>
                        <td align='center'><?PHP echo $result["About"]; ?></td>
                        <td align='center'><?PHP echo $result["Dept_Respond"]; ?></td>
                        <td align='center'><?PHP echo $result["Staff_Respond"]; ?></td>

                        
                      <td align='center'>
                      <a href="#?Item_ID=<?PHP echo $result["Item_ID"]; ?>" class="btn btn-success"><i class="fas fa-edit fa-sm"></i> </a> 
                      </td>
                      <td align='center'>
                      <a href="pages/delete_requestin.php?Item_ID=<?php echo $result['Item_ID']?>" class="btn btn-danger"  onclick=" return confirm('ທານຕ້ອງການລົບຂໍ້ມູນນີ້ແທ້ ຫຼື ບໍ..?')"><i class="fas fa-trash fa-sm"></i></a>
                      </td>
                      
                    </tr>
                    </tbody>
                    <?php
                  }
                  ?>
                </table>
                </div>
	</body>
</html>
