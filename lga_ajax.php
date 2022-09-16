<?php 
    
    // var_dump($_REQUEST);
    // exit;

    // store
    $stateid = $_REQUEST['mystateid'];

    // 
    include_once ("common/zone.php");

    // create Object
    $obj = new Zone();

    // getLga method and pass Param
    $lgas = $obj->getLga($stateid);

    // check if not Empty
    // create empty avariable to store the result
    $options = "<option value=''>Select LGA</option>";

    if (!empty($lgas)) {
        foreach ($lgas as $key => $value) {
            $lgaid = $value['lga_id'];
            $lganame = $value['lga_name'];

            //concatenate the result with the empty variable Option
            $options .="<option value='$lgaid'>$lganame</option>";
        }
    }

    echo $options;
?>