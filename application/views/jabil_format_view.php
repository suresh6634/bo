<?php $baseUrl = ''; ?>
<?php $this->load->view('template/html-head-start', $baseUrl); ?>

    <?php $this->load->view('template/css-and-js', $baseUrl); ?>

    <?php $this->load->view('template/head-close-body-start', $baseUrl); ?>

        <?php $this->load->view('template/body-start-container', $baseUrl); ?>

        <?php $this->load->view('template/sidebar', $baseUrl); ?>

        <?php $this->load->view('template/top-navigation', $baseUrl); ?>

        <?php $this->load->view('jabil_format/jabil_format_view', $baseUrl); ?>

        <?php $this->load->view('template/footer-content', $baseUrl); ?>

    <?php $this->load->view('template/footer-body-js', $baseUrl); ?>
<?php $this->load->view('template/body-html-end', $baseUrl); ?>
