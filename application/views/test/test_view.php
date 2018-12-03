
<?
    //barcode( "", "TESTING", 60, horizontal, code39, true, 2 );
?>
<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Submit the Barcode Data</h3>
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
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <!-- img alt="TESTING" src="<?php echo $base_url."barcode/code39"; ?>" / -->
                                    <?php
                                        if($debug == 1) {
                                            echo "<pre>";
                                            print_r($multiple_each_line);
                                            echo "</pre>";

                                        }
                                        $label = array("DESCRIPTION:", "PART No.:", "P/O No.:", "D/O No.:", "QUANTITY:");
                                        if(validation_errors()) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php
                                                    echo validation_errors();
                                                ?>
                                            </div>
                                    <?php } ?>
                                    <form class="form-horizontal form-label-right input_mask" method="POST" action="<?php echo $base_url."test"; ?>">

                                        <label for="dates">Multiple data testing: <span class="required">*</span></label>
                                        <textarea name="multiple" id="multiple" required="required" style="width: 100%;height:500px;resize: vertical;"></textarea>
                                        <div class="clearfix"></div>
                                        <br/>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="hidden" name="debug" value="1" />
                                                <button class="btn btn-primary" type="reset">Reset</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <?  if ($multiple != "")
                            {
                        ?>
                             <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_content">
                                        <?php

                                            foreach ($multiple_each_line as $line)
                                            {
                                                $barcode_data = explode(",", $line);

                                        ?>
                                                <div style="display:block;float:left;width:100%;border:1px solid black;height:410px;margin: 0 0 10px 0;">
                                                    <div class="row" style="margin: 10px;">
                                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                                        <h3 style="font-size:24px;text-decoration:underline;color: black;font-weight:800;">
                                                            PECKO ELECTRONICS INDUSTRIES PTE. LTD.
                                                        </h3>
                                                    </div>
                                        <?php

                                                foreach ($barcode_data as $key => $data)
                                                {

                                        ?>
                                                    <div class="col-md-2 col-sm-2 col-xs-12" style="margin:5px 0;font-weight:800;">
                                                        <?php echo $label[$key]; ?>
                                                    </div>
                                                    <div class="col-md-10 col-sm-10 col-xs-12" style="margin:5px 0;padding: 0 0 0 15px;">

                                                        <?php
                                                            if($key == 0) {
                                                                echo $data;
                                                            }  else {
                                                        ?>
                                                                <img alt="Quantity" src="<?php echo $base_url."barcode/code39/".$data; ?>" />
                                                        <?php
                                                            }
                                                        ?>
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