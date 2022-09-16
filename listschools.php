<!-- page content -->
<div class="container">
	<!-- page heading -->
	<h1 class="mt-4 mb-3">
		<small>List of Schools</small>
	</h1>
</div>
<div class="row">
	<div class="col-lg-8 mb-4"></div>
</div>

<!-- <a href="addschool.php" class="btn btn-danger mb-3">Add School</a> -->
     <?php 
        if (isset($_REQUEST['m'])) {
    ?>
        <div class="alert alert-success">
            <?php echo $_REQUEST['m']; ?>
        </div>
    <?php        
        }
    ?> 

    <?php 
        if (isset($_REQUEST['info'])) {
    ?>
        <div class="alert alert-info">
            <?php echo $_REQUEST['info']; ?>
        </div>
    <?php        
        }
    ?>

    <?php 
        if (isset($_REQUEST['err'])) {
    ?>
        <div class="alert alert-danger">
            <?php echo $_REQUEST['err']; ?>
        </div>
    <?php        
        }
    ?>
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>School Name</th>
                <th>School Type</th>
                <th>School Section</th>
                <th>State</th>
                <th>LGA</th>
                <th>School Address</th>
                <th>School Description</th>
                <th>Total Student</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                // include the class School
                include_once "common/schoolacad.php";

                //create school object
                $schoolacadobj = new School();

                $schoolacad = $schoolacadobj->listSchool();

                // echo "<pre>";
                // print_r($clubs);
                // echo "</pre>";

                if (count($schoolacad) > 0) {
                    
                    foreach ($schoolacad as $key => $value) {
                        $schoolid = $value['school_id'];
            ?>
                <tr>
                    <td>#</td>
                    <td><?php echo $value['school_name']; ?></td>
                    <td><?php echo $value['school_type']; ?></td>
                    <td><?php echo $value['school_section']; ?></td>
                    <td><?php echo $value['state']; ?></td>
                    <td><?php echo $value['lga']; ?></td>
                    <td><?php echo $value['school_address']; ?></td>
                    <td><?php echo $value['school_description']; ?></td>
                    <td><?php echo $value['total_student']; ?></td>
                    <td>
                        <?php 
                            if (!empty($value['emblem'])) {
                        ?>
                            <img src="schoollogo/<?php echo $value['emblem']; ?>" alt="<?php echo $value['school_name']; ?> emblem" class="img-fluid">
                        <?php
                            }
                        ?>
                    
            <?php
                    }
                }
            ?>
        </tbody>
    </table>
  </div>

</div>

</div>
