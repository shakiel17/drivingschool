<?php
$query=$this->School_model->db->query("SELECT c.lastname,c.firstname,c.middlename,c.address,c.contactno FROM customer c INNER JOIN enrollee e ON e.customer_no=c.customer_no WHERE e.regno='$regno'");
$user=$query->row_array();
?>
<center>
    <div style="width:876px;">
        <table width="100%" border="0" style="font-family:Arial;">
            <tr>
                <td colspan="3"><h3>Flores 1 on 1 Driving Tutorial <br><small style="font-size:14px;">Roxas St., Kidapawan City</small></h3></td>
            </tr>
            <tr>
                <td align="center" colspan="3">&nbsp;</td>
            </tr>
            <tr>
                <td coslpan="2" width="70%">&nbsp;</td>
                <td align="right"><h3><?=$user['firstname'];?> <?=$user['lastname'];?><br><small><?=$user['address'];?><br><?=$user['contactno'];?></small></h3></td>
            </tr>
            <tr>
                <td align="center" colspan="3">&nbsp;</td>
            </tr> 
            <tr>
                <td align="center" colspan="3"><h3>INVOICE SUMMARY DETAILS</h3></td>
            </tr>           
        </table>
        <table width="100%" border="1" style="font-family:Arial; border-collapse:collapse;" cellpadding="2">
            <tr>
                <td align="center"><b>Invoice #</b></td>
                <td align="center"><b>Amount</b></td>
                <td align="center"><b>Date & Time</b></td>
            </tr>
            <?php
            $totalamount=0;
            foreach($items as $item){
                ?>
                <tr>
                    <td><?=$item['invno'];?></td>
                    <td align="right"><?=number_format($item['amount'],2);?></td>
                    <td align="center"><?=date('M-d-Y',strtotime($item['datearray']));?> <?=date('h:i A',strtotime($item['timearray']));?></td>
                </tr>
                <?php
                $totalamount += $item['amount'];
            }
            ?>
            
        </table>
        <br><br>
        <table width="100%" border="0">
            <tr>                
                <td><b>Total Amount Paid: <?=number_format($totalamount,2);?></b></td>
            </tr>
        </table>
        <br><br>
        <br><br>
        <table width="100%" border="0">
            <tr>
                <td><b>Prepared by:</b></td>
            </tr>
            <tr>
                <td>___________________</td>
            </tr>
            <tr>
                <td>Cashier</td>
            </tr>
        </table>
    </div>
</center>