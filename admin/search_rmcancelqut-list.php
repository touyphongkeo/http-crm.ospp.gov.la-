<html>
	<body>
    

             <div id='show' class="table-responsive p-10">
                <table class='table table-bordered' style="width: 440%">
                    <thead>
                    <tr align='center'>
                        <th>ລຳດັບ</th>
                        <th>ລະຫັດຄະດີ</th>
                        <th>ເລກທີຂາອອກ</th>
                        <th>ວັນເດືອນປີອອກ</th>
                        <th>ເລກທີຂາເຂົ້າ</th>
                        <th>ລັກສະນະການແກ້ໄຂ</th>
                        <th>ລັກສະນະຄຳຖະແຫຼງຂຶ້ນສານ</th>
                        <th>ສະຖານການກະທຳຜິດ</th>
                        <th>ໂຈດທາງອາຍາ</th>
                        <th>ໂຈດທາງແພ່ງ</th>
                        <th>ຈຳເລີຍ </th>
                        <th>ພະແນກຮັບຜິດຊອບ </th>
                        <th>ພະນັກງານຮັບຜິດຊອບ </th>
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
                else{ $btw="and Cri_CancelOut.Item_Date between '$start' and '$end'";}


              

                if($Item_No==""){$b="";}
                else{ $b="and (Cri_CancelOut.Item_No like N'%$Item_No%' or Cri_CancelOut.Item_No like N'$Item_No%')";}

                if($Item_ID==""){$d="";}
                else{ $d="and (Cri_CancelOut.Item_ID like N'%$Item_ID%' or Cri_CancelOut.Item_ID like N'$Item_ID%')";}

               


                $i=1;
                $sql = "select *from Cri_CancelOut where 1=1 $btw $b $d order by Cri_CancelOut.item_Cnt asc";
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
                        <td align='center'><?PHP echo $result["In_No"]; ?></td>
                        <td><?PHP echo $result["Solv_Name"]; ?></td>
                        <td><?PHP echo $result["Submit_Name"]; ?></td>
                        <td><?PHP echo $result["Problem"]; ?></td>
                        <td><?PHP echo $result["Request_Crim"]; ?></td>
                        <td align='center'><?PHP echo $result["Request_Civil"]; ?></td>
                        <td><?PHP echo $result["Related_Pers"]; ?></td>
                        <td><?PHP echo $result["Dept_Respond"]; ?></td>
                        <td><?PHP echo $result["Staff_Respond"]; ?></td>

                       <td align='center'>
           
                        <a href="#?Item_ID=<?PHP echo $result["Item_ID"]; ?>" class="btn btn-success"><i class="fas fa-edit fa-sm"></i> </a>
                        
                        </td>
                        <td align='center'>
                        <a href="pages/delete_rmcancelqut.php?Item_ID=<?php echo $result['Item_ID']?>" class="btn btn-danger"  onclick=" return confirm('ທານຕ້ອງການລົບຂໍ້ມູນນີ້ແທ້ ຫຼື ບໍ..?')"><i class="fas fa-trash fa-sm"></i></a>
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
