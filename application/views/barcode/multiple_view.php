
<?
    //barcode( "", "TESTING", 60, horizontal, code39, true, 2 );
?>
<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title hidden-print">
                        <div class="title_left">
                            <h3>Paste the CSV Barcode Data</h3>
                        </div>
                    </div>
                    <div class="title_right hidden-print">
                        <div class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
                            <p style="text-align:right;">Fields highlight with <span class="required" style="color:red;">*</span> are mandatory</p>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>

                    <div class="row">
                        <div class="col-md-4 col-sm-4 col-xs-12 hidden-print">
                            <div class="x_panel">
                                <div class="x_content">
                                    <!-- img alt="TESTING" src="<?php echo $base_url."barcode/code39"; ?>" / -->
                                    <?php
                                        /*if($debug == 1) {
                                            echo "<pre>";
                                            print_r($multiple_each_line);
                                            echo "</pre>";

                                        }*/
                                        $label = array("Cust. Order No.:", "D.O. No.:", "Pecko Part No.:", "Cust Part No.:", "QUANTITY:");
                                        if(validation_errors()) { ?>
                                            <div class="alert alert-danger" role="alert">
                                                <?php
                                                    echo validation_errors();
                                                ?>
                                            </div>
                                    <?php } ?>
                                    <h3>Sample format:</h3>
                                    <p style="border:1px solid black;background:#F0F0F0;padding:10px;line-height:1.9em;">
                                        <strong>Description,Part No,Po No,Do No,Qty</strong> <br/>
                                        Description1,12345,678910,11121314,6 <br/>
                                        Description2,12346,678911,11121315,7 <br/>
                                        Description3,12347,678912,11121316,8 <br/>
                                        Description4,12348,678913,11121317,9 <br/>
                                    </p>
                                    <form class="form-horizontal form-label-right input_mask" method="POST" action="<?php echo $base_url."barcode/multiple"; ?>">

                                        <label for="dates">Paste the Barcode data: <span class="required">*</span></label>
                                        <textarea name="multiple" id="multiple" required="required" style="width: 100%;height:350px;resize: vertical;"></textarea>
                                        <div class="clearfix"></div>
                                        <br/>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <input type="hidden" name="debug" value="0" />
                                                <button class="btn btn-primary" type="reset">Reset form</button>
                                                <button type="submit" class="btn btn-success">Generate Barcode</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <?  if ($multiple != "")
                            {
                        ?>
                             <div class="col-md-8 col-sm-8 col-xs-12">
                                <?php

                                    foreach ($multiple_each_line as $line)
                                    {
                                        $barcode_data = explode(",", $line);

                                ?>
                                        <div class="multiple_view_div">
                                            <div class="row multiple_view_div_child1">
                                            <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1 multiple_view_div_child2">
                                                <h3>
                                                    PECKO ELECTRONICS INDUSTRIES PTE. LTD.
                                                </h3>
                                            </div>
                                <?php

                                        foreach ($barcode_data as $key => $data)
                                        {
                                      /* Add a new div to the outside*/
                                ?>      <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-1 multiple_view_div_div1" >
                                            <div class="multiple_view_key">
                                                <?php echo $label[$key]; ?>
                                            </div>
                                            <div class="multiple_view_barcode">
                                                <img alt="Quantity" src="<?php echo $base_url."barcode/code39/".$data; ?>" />

                                                <?php
/*                                                    if($key == 0) {
                                                        echo $data;
                                                    }  else {
                                                */?><!--
                                                        <img alt="Quantity" src="<?php /*echo $base_url."barcode/code39/".$data; */?>" />
                                                --><?php
/*                                                    }
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
                            <?php
                              }
                            ?>
                </div>
            </div>
            <!-- /page content -->