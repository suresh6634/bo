
<?
    //barcode( "", "TESTING", 60, horizontal, code39, true, 2 );
?>
<!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title hidden-print">
                        <div class="title_left">
                            <h3>Submit the Barcode Data</h3>
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
                                    <?php if(validation_errors()) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php

                                            if($debug == 1) {
                                                echo "<pre>";
                                                    print_r($formatted_date);
                                                echo "</pre>";
                                            }
                                        echo validation_errors();
                                        ?>
                                    </div>
                                    <?php } ?>
                                    <form class="form-horizontal form-label-right input_mask" method="POST" action="<?php echo $base_url."barcode"; ?>">
                                        <label for="dates">Enter Description: <span class="required">*</span></label>
                                        <input type="text" placeholder="CBL_HPCU_DPL_CTRL_EXT" required="required" class="form-control" name="description" id="description" value="" />
                                        <div class="clearfix"></div>
                                        <br/>

                                        <label for="dates">Enter Part No.: <span class="required">*</span></label>
                                        <input type="text" placeholder="09510-2176-000-08" required="required" class="form-control" name="part-no" id="part-no" value="" />
                                        <div class="clearfix"></div>
                                        <br/>

                                        <label for="dates">Enter P/O No.: <span class="required">*</span></label>
                                        <input type="text" placeholder="20091774" required="required" class="form-control" name="po-no" id="po-no" value="" />
                                        <div class="clearfix"></div>
                                        <br/>

                                        <label for="dates">Enter D/O No.: <span class="required">*</span></label>
                                        <input type="text" placeholder="15-0215" required="required" class="form-control" name="do-no" id="do-no" value="" />
                                        <div class="clearfix"></div>
                                        <br/>

                                        <label for="dates">Enter Quantity: <span class="required">*</span></label>
                                        <input type="text" placeholder="10" required="required" class="form-control" name="qty" id="qty" value="" />
                                        <div class="clearfix"></div>
                                        <br/>

                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary" type="reset">Reset form</button>
                                                <button type="submit" class="btn btn-success">Generate Barcode</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <?  if ($description != "" && $part_no != ""  && $po_no != "" && $do_no != "" && $qty != "")
                            {
                        ?>
                                <div class="col-md-8 col-sm-8 col-xs-12">

                                        <div class="barcode_view_div_root">
                                            <div class="row barcode_view_div" >
                                                <div class="col-md-10 col-sm-10 col-xs-10 col-md-offset-1">
                                                    <h3>
                                                        PECKO ELECTRONICS INDUSTRIES PTE. LTD.
                                                    </h3>
                                                </div>

                                               <!--  Add a new div to the outside-->
                                                <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-1 barcode_view_div_div2" >
                                                    <div class="desc">
                                                        DESCRIPTION:
                                                    </div>
                                                    <div class="desc_val">
                                                        <?php echo $description; ?>
                                                    </div>
                                                </div>
                                                <!--  Add a new div to the outside-->
                                                <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-1 common" >
                                                    <div class="common1">
                                                        PART NO.:
                                                    </div>
                                                    <div class="common2">
                                                        <img alt="Part Number" src="<?php echo $base_url."barcode/code39/".$part_no; ?>" />
                                                    </div>
                                                </div>
                                                <!--  Add a new div to the outside-->
                                                <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-1 common" >
                                                    <div class="common1">
                                                        P/O No.:
                                                    </div>
                                                    <div class="common2">
                                                        <img alt="P/O Number" src="<?php echo $base_url."barcode/code39/".$po_no; ?>" />
                                                    </div>
                                                </div>
                                                <!--  Add a new div to the outside-->
                                                <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-1 common" >
                                                    <div class="common1">
                                                        D/O No.:
                                                    </div>
                                                    <div class="common2">
                                                        <img alt="D/O Number" src="<?php echo $base_url."barcode/code39/".$do_no; ?>" />
                                                    </div>
                                                </div>
                                                <!--  Add a new div to the outside-->
                                                <div class="col-md-5 col-sm-5 col-xs-12 col-md-offset-1 common">
                                                    <div class="common1">
                                                        QTY:
                                                    </div>
                                                    <div class="common2">
                                                    <img alt="Quantity" src="<?php echo $base_url."barcode/code39/".$qty; ?>" />
                                                    </div>

                                                </div>
                                            </div>


                                </div>
                            <?php
                              }
                            ?>
                    </div>
                </div>
            </div>
            <!-- /page content -->