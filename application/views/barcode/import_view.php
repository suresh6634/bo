
<?
    //barcode( "", "TESTING", 60, horizontal, code39, true, 2 );
?>
<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Paste the CSV Barcode Data</h3>
                        </div>
                    </div>
                    <div class="title_right">
                        <div class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
                            <p style="text-align:right;">Fields highlight with <span class="required" style="color:red;">*</span> are mandatory</p>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <!-- img alt="TESTING" src="<?php echo $base_url."barcode/code39"; ?>" / -->
                                    <?php
                                        if($debug == 1 && $file_uploaded && $error == 0) {
                                            echo "<pre>";
                                               print_r($file);
                                            echo "</pre>";

                                        }

                                        $label = array("Cust. Order No.:", "D.O. No.:", "Pecko Part No.:", "Cust Part No.:", "QUANTITY:");

                                        if($error) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php
                                                    echo $error;
                                                ?>
                                            </div>
                                    <?php } ?>
                                    <h3>Sample format:</h3>
                                    <p style="border:1px solid black;background:#FFF;padding:10px;line-height:1.9em;">
                                        Download the Sample CSV format <br/>
                                        <a href="../assets/csv/sample.csv">
                                            <img src="../assets/images/sample-csv.png" alt="Sample CSV" />
                                        </a>
                                    </p>
                                    <!-- form enctype="multipart/form-data" class="form-horizontal form-label-right input_mask" method="POST" action="<?php echo $base_url."barcode/import"; ?>" -->
                                    <form enctype="multipart/form-data" method="post" style="" action="<?php echo $base_url."barcode/do_import";?>" name="uploadfile">
                                        <label for="dates">Choose the CSV file to import: <span class="required">*</span></label>
                                        <input type="file" id="csv" accept=".csv" name="csv" size="40" />
                                        <div class="clearfix"></div>
                                        <br/>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="hidden" name="debug" value="0" />
                                                <button class="btn btn-primary" type="reset">Reset form</button>
                                                <button type="submit" class="btn btn-success">Generate barcode</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <?   if ($error == 0 && $file_uploaded != 0)
                            {
                        ?>
                             <div class="col-md-8 col-sm-8 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content">
                                        <?php

                                            foreach ($multiple_each_line as $line)
                                            {
                                                $barcode_data = explode(",", $line);

                                        ?>
                                                <div style="display:block;background:#FFF;float:left;width:100%;border:1px solid black;height:374px;margin: 0 0 10px 0;">
                                                    <div class="row" style="margin: 10px;">
                                                    <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1">
                                                        <h3 style="font-size:18px;text-decoration:underline;color: black;font-weight:800;margin-left: 10px;">
                                                            PECKO ELECTRONICS INDUSTRIES PTE. LTD.
                                                        </h3>
                                                    </div>
                                        <?php
                                                foreach ($barcode_data as $key => $data)
                                                {

                                             /* Add a new div to the outside*/
                                        ?>     <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-1" style="display: inline-block">
                                                    <div style="padding:10px 0 0 10px;font-weight:800;">
                                                   <!-- <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;font-weight:800;">-->
                                                        <?php echo $label[$key];?>
                                                    </div>
                                                    <div style="margin:5px 0;padding: 0 0px 0 10px;" class="import_view_one">
                                                   <!-- <div class="col-md-10 col-sm-10 col-xs-12" style="margin:5px 0;padding: 0 0 0 15px;">-->
                                                        <img alt="Quantity" src="<?php echo $base_url."barcode/code39/".$data; ?>" style="margin-left: -8px;" />

                                                       <!-- reference multiple_view.php-->
                                                        <?php
/*                                                            if($key == 0) {
                                                                echo $data;
                                                            }  else {
                                                        */?><!--
                                                            <img alt="Quantity" src="<?php /*echo $base_url."barcode/code39/".$data; */?>" style="margin-left: -8px;" />
                                                        --><?php
/*                                                            }
                                                        */?>


                                                    </div>
                                                </div>
                                        <?php
                                                 }
                                        ?>
                                                </div>
                                              </div>
                                        <?php

                                            }
                                        ?>
                                    </div>
                                </div>
                            <?php
                              }

                        ?>
                    </div>
                </div>
            </div>
            <!-- /page content -->