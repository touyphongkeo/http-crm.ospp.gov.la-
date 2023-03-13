<html>
	<body>
    

             <div id='show' class="table-responsive p-10">
                <table class='table table-bordered' style="width: 250%">
                    <thead>
                    <tr align='center'>
                        <th>ລຳດັບ</th>
                        <th>ລະຫັດແບບຟອມ</th>
                        <th>ເລກທີຄຳສະເໜີຮື້ຟື້ນ</th>
                        <th>ວັນເດືອນປີ</th>
                        <th>ບ່ອນອີງ</th>
                        <th>ລະຫວ່າງ</th>
                        <th>ດ້ວຍເຫດນີ້</th>
                      </tr>
                </thead>
                   
                <?php
                include 'server/connect.php';
                $start=$_POST['start'];
                $end=$_POST['end'];
               
            
              
              


                
                if($start=="" or $end==""){$btw="";}
                else{ $btw="and Cri_ReviseOrders.Item_Date between '$start' and '$end'";}


                $i=1;
                $sql = "SELECT * FROM Cri_ReviseOrders where 1=1 $btw order by Cri_ReviseOrders.item_Cnt asc";
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
                        <td><?PHP echo $result["Refer_To"]; ?></td>
                        <td><?PHP echo $result["OSPP_Prov"]; ?></td>
                        <td><?PHP echo $result["Conclution"]; ?></td>
                     
                    </tr>
                    </tbody>
                    <?php
                  }
                  ?>
                </table>
                </div>
	</body>
</html>
