<?php
    $input_date = "";
    $date_output = "";
    if(!empty($jabil_mpn_output)) {



        if (is_array($jabil_mpn_output)) {
            $totalRows = count($jabil_mpn_output);
            foreach ($jabil_mpn_output as $rowValue => $mpn) {
                end($jabil_mpn_output);
                if ($rowValue === key($formatted_date)) {
                    $jabil_mpn_output .= $mpn;
                } else {
                    $jabil_mpn_output .= $mpn."\n";
                }
            }
        }

    }


?>
            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Modify date format</h3>
                        </div>
                    </div>
                    <div class="title_right">
                        <div class="col-md-3 col-sm-3 col-xs-12 form-group pull-right top_search">
                            <p>Fields highlight with <span class="required" style="color:red;">*</span> are mandatory</p>
                            <div class="clearfix"></div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <?php
                    /*
                        if($debug == 1) {
                            echo "<pre>";
                                print_r($formatted_date);
                            echo "</pre>";
                        }
                    */
                    ?>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <form class="form-horizontal form-label-right input_mask" method="POST" action="<?php echo $base_url."jabil_format"; ?>">
                                        <label for="dates">Paste the date column selected from Excel: <span class="required">*</span></label>
                                        <textarea name="jabil_mpns" id="dates" required="required" style="width: 100%;height:500px;resize: vertical;"><?php echo $jabil_mpns; ?></textarea>
                                        <div class="clearfix"></div>
                                        <!-- br/>
                                        <label for="date-format">Select the date format you would like to have: <span class="required">*</span></label>
                                        <select id="format" name="format" class="form-control" required="required">
                                            <option value="d/m/Y" <?php echo (($format == 'd/m/Y') ? 'selected="selected"' : "" ); ?>>DD/MM/YYYY (Example: 25/08/2017) Default</option>
                                            <option value="m/d/Y" <?php echo (($format == 'm/d/Y') ? 'selected="selected"' : "" ); ?>>MM/DD/YYYY (Example: 08/25/2017)</option>
                                            <option value="Y/m/d"<?php echo (($format == 'Y/m/d') ? 'selected="selected"' : "" ); ?>>YYYY/MM/DD (Example: 2017/08/25)</option>
                                            <option value="Y/d/m" <?php echo (($format == 'Y/d/m') ? 'selected="selected"' : "" ); ?>>YYYY/DD/MM (Example: 2017/25/08)</option>
                                        </select -->

                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-12 col-sm-12 col-xs-12">
                                                <button class="btn btn-primary" type="reset">Reset</button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="x_panel">
                                <div class="x_content">
                                    <form class="form-horizontal form-label-right input_mask">
                                        <label for="fullname">Copy the formatted data</label>
                                        <textarea name="textarea-formatted-dates" id="textarea-formatted-dates" style="width: 100%;height:575px;resize: vertical;"><?php echo $jabil_mpn_output; ?></textarea>
                                        <div class="form-group">
                                            <label class="control-label col-md-12 col-sm-12 col-xs-12">
                                            </label>
                                            <div class="col-md-12 col-sm-12 col-xs-12">

                                            </div>
                                        </div>
                                        <div class="ln_solid"></div>
                                        <div class="form-group">
                                            <div class="col-md-2 col-sm-2 col-xs-12">
                                                <button type="button" id="btn-copy" class="btn <?php echo (($jabil_mpn_output != "") ? "btn-success" : "btn-disabled");?>">Copy</button>
                                            </div>
                                            <div class="col-md-10 col-sm-10 col-xs-12">
                                                <div class="alert alert-success alert-dismissible fade in" role="alert" style="display:none;">
                                                    Formatted dates copied successfully!
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->