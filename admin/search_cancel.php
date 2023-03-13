<html>
	<body>
    
<?php

date_default_timezone_set("Asia/Bangkok");
?>
             <div id='show' class="table-responsive p-10">
                <table class='table table-bordered' style="width: 390%">
                    <thead>
                    <tr>
                    <th>ເລກນັບ</th>
                    <th>ລະຫັດຄະດີ</th>
                    <th>ເລກທີຂາເຂົ້າ</th>
                    <th>ວັນທີເດືອນປີ</th>
                    <th>ເລກທີສຳນວນ</th>
                    <th>ວ.ດ.ປ ລົງສຳນວນ</th>
                    <th>ສະຖານການກະທຳຜິດ</th>
                    <th>ໂຈດທາງອາຍາ</th>
                    <th>ໂຈດທາງແພ່ງ</th>
                    <th>ຈຳເລີຍ</th>
                    <th>ພະແນກຮັບຜິດຊອຍ</th>
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
                $Doc_No=$_POST['Doc_No'];
            
              
              


                
                if($start=="" or $end==""){$btw="";}
                else{ $btw="and Cri_CancelIn.Item_Date between '$start' and '$end'";}


               


              

                if($Item_No==""){$b="";}
                else{ $b="and (Cri_CancelIn.Item_No like N'%$Item_No%' or Cri_CancelIn.Item_No like N'$Item_No%')";}

                if($Doc_No==""){$d="";}
                else{ $d="and (Cri_CancelIn.Doc_No like N'%$Doc_No%' or Cri_CancelIn.Doc_No like N'$Doc_No%')";}

               


                $i=1;
                $sql = "select *from Cri_CancelIn where 1=1 $btw $b $d ORDER BY item_Cnt ASC";
                $query = sqlsrv_query( $conn, $sql );


          

                while($result = sqlsrv_fetch_array($query, SQLSRV_FETCH_ASSOC))
                {
                  $i++;
                ?>

                    <tbody>

                      <tr>  
                       
                      <td><?PHP echo $result["item_Cnt"]; ?></td>        
                      <td><?PHP echo $result["Item_ID"]; ?></td>
                      <td><?PHP echo $result["Item_No"]; ?></td>
                      <?php
                      $date=$result["Item_Date"];
                      ?>
                      <td align='center'><?PHP echo date_format($date,'d/m/Y');?></td>
                      <td><?PHP echo $result["Doc_No"]; ?></td>
                      <?php
                      $datse=$result["Last_Update"];
                      ?>
                      <td align='center'><?PHP echo date_format($datse,'d/m/Y');?></td>
                      <td><?PHP echo $result["Problem"]; ?></td>
                      <td><?PHP echo $result["Request_Crim"]; ?></td>
                      <td><?PHP echo $result["Request_Civil"]; ?></td>
                      <td><?PHP echo $result["Related_Pers"]; ?></td>
                      <td><?PHP echo $result["Dept_Respond"]; ?></td>
                      <td><?PHP echo $result["Staff_Respond"]; ?></td>


                      <td align='center'>
           
                      <a href="pages/from_update_cancel.php?Item_ID=<?PHP echo $result["Item_ID"]; ?>" class="btn btn-success"><i class="fas fa-edit fa-sm"></i> </a>
                      
                      </td>
                      <td align='center'>
                      <a href="pages/delete_canecl.php?Item_ID=<?php echo $result['Item_ID']?>" class="btn btn-danger"  onclick=" return confirm('ທານຕ້ອງການລົບຂໍ້ມູນນີ້ແທ້ ຫຼື ບໍ..?')"><i class="fas fa-trash fa-sm"></i></a>
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
