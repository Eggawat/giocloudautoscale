<?php
    //php config
    include 'config.php';

    $zoneid=ZONE_ID;
    $svcid=SVC_ID;
    
    //monitoring
    $cpu = shell_exec("top -bn2 | awk '/Cpu\(s\):/ { print 100-$8 }'| awk 'NR==2'");
    $memory = shell_exec("free | grep Mem | awk '{print $3/$2 * 100.0}'");

    //db connection
    $con = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    //query database
    $query = "SELECT * FROM vm ORDER BY id DESC LIMIT 1";
    $result = mysqli_query($con,$query);
    $row=mysqli_fetch_assoc($result);
    $id=$row['id'];
    $vmid=$row['vmid'];
    $vmclone= $row['id']+1;
    $name="Web-$vmclone";

    //condition
    if ($memory > 40 || $cpu > 40){

    //deploy vm
    $deploy = shell_exec("cs deployVirtualMachine zoneid=$zoneid serviceofferingid=$svcid templateid=$templateid networkids=$networkid name=$name --region=$region 2>&1");

    //get vm id
    $getvmid = shell_exec("cs listVirtualMachines name='$name' --region=$region | grep -m 1 '\"id\":'|awk '{print substr($2,2,36)}'");
    $getvmid = str_replace("\n", '', $getvmid);
    $getvmid = str_replace('\n', '', $getvmid);

    //get ip address
    $getip = shell_exec("cs listVirtualMachines name='$name' --region=$region|grep ipaddress|awk '{print substr($2,2,16)}'");
    $getip = str_replace('",', '', $getip);
    $getip = str_replace("\n", '', $getip);
    $getip = str_replace('\n', '', $getip);

    //assign to lb
    $tolb = shell_exec("cs assignToLoadBalancerRule id='$lbid' virtualmachineids='$getvmid' --region=$region 2>&1");

    //insert database
    mysqli_query($con,"INSERT INTO vm (vmname,vmid,ip) values('$name','$getvmid','$getip')");
    mysqli_close($con);
        } else {

        if ($memory < 20 && $cpu < 20){
            //destroy vm
            $output = shell_exec("cs destroyVirtualMachine id=$vmid expunge=true --region=$region 2>&1");

            //delete database
            mysqli_query($con,"DELETE FROM vm WHERE vmid='$vmid'");
            mysqli_close($con);
            } else {
        }
}
?>
