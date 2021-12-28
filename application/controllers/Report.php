<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Report extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('report_model');
    }

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()


    {
        $object['controller'] = $this;
        $object['active_tab'] = "Dashboard";
        $object['title'] = "Dashboard";
        $this->load->view('include/header', $object);     //or use render method
        $this->load->view('include/sidebar');
        $this->load->view('dashboard');
        $this->load->view('include/footer');

        $this->load->model('report_model');
    }



    public function damagedbooksreport()
    {
        $dbooks['damagedBooks'] = $this->report_model->getDamagedBooks();

        $object['controller'] = $this;
        $object['active_tab'] = "report1";
        $object['active_main_tab'] = "report1";
        $object['title'] = "report1";

        $this->load->view('include/header', $object);
        $this->load->view('include/sidebar');
        $this->load->view('reports/damagedBooksReport', $dbooks);
        $this->load->view('include/footer');
    }
    public function studentreport()
    {

        $this->load->model('student_model');
        $st['students'] = $this->student_model->get_students();



        $object['controller'] = $this;
        $object['active_tab'] = "report2";
        $object['active_main_tab'] = "report2";
        $object['title'] = "report2";

        $this->load->view('include/header', $object);
        $this->load->view('include/sidebar');
        $this->load->view('reports/studentReport', $st);
        $this->load->view('include/footer');
    }

    /////////////////////////////////////////////////////////Membership Income 
    public function membershipincomereport()
    {
        $mem['membership'] = $this->report_model->membership_fee_generate();


        $object['controller'] = $this;
        $object['active_tab'] = "report3";
        $object['active_main_tab'] = "report3";
        $object['title'] = "report3";

        $this->load->view('include/header', $object);
        $this->load->view('include/sidebar');
        $this->load->view('reports/membershipIncomeReport', $mem);
        $this->load->view('include/footer');
    }

    public function latereturnreport()
    {

        $late['late_return'] = $this->report_model->All_late_return();

        $object['controller'] = $this;
        $object['active_tab'] = "report4";
        $object['active_main_tab'] = "report4";
        $object['title'] = "report4";

        $this->load->view('include/header', $object);
        $this->load->view('include/sidebar');
        $this->load->view('reports/lateReturnBooksReport', $late);
        $this->load->view('include/footer');
    }

    ////////////////////////////////////////////// Damaged Book Report

    // public function export_csv()
    // {
    //     $file_name = 'File_name_' . date("Y-m-d h-i-s") . '.csv';
    //     $query = $this->report_model->get_DamagedBook_Dates();

    //     $this->load->dbutil();
    //     $data = $this->dbutil->csv_from_result($query);
    //     $this->load->helper('download');
    //     force_download($file_name, $data);
    //     exit();
    // }




    public function generate_dbook_pdf()
    { //load pdf library
        $this->load->library('Pdf');

        $pdf = new Pdf(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dilshan');
        $pdf->SetTitle('Damaged Books');
        $pdf->SetSubject('Damaged Books');
        $pdf->SetKeywords('Damaged Books');

        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        // set font
        $pdf->SetFont('times', 'BI', 12);

        // ---------------------------------------------------------


        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );

        $this->table->set_template($template);

        $this->table->set_heading('Book Tittle', 'Damaged Book ID', 'Book Copy ID', 'Purchase Date', 'Damaged Date', 'Price');

        $DBooks = $this->report_model->get_DamagedBook_Dates();

        foreach ($DBooks as $bk) :
            $this->table->add_row($bk['book_tittle'], $bk['damagedbook_ID'], $bk['book_copyID'], $bk['purchase_date'], $bk['damaged_date'], $bk['price']);
        endforeach;



        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end

        // add a page
        $pdf->AddPage();


        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // reset pointer to the last page
        $pdf->lastPage();



        //Close and output PDF document
        $pdf->Output(md5(time()) . '.pdf', 'D');
    }

    ////////////////////////////////////////////// Student Report



    public function generate_student_pdf()
    { //load pdf library
        $this->load->library('studentPDF');

        $pdf = new studentPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dilshan');
        $pdf->SetTitle('Damaged Books');
        $pdf->SetSubject('Damaged Books');
        $pdf->SetKeywords('Damaged Books');

        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        // set font
        $pdf->SetFont('times', 'BI', 12);

        // ---------------------------------------------------------


        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );

        $this->table->set_template($template);

        $this->table->set_heading('Student ID', 'Staff ID', 'NIC', 'Email', 'Phone', 'Address', 'First Name', 'Last Name', 'Registered Date');

        $StudentR = $this->report_model->get_student_report();

        foreach ($StudentR as $st) :
            $this->table->add_row($st['student_ID'], $st['staff_id'], $st['NIC'], $st['email'], $st['phone'], $st['address'], $st['first_name'], $st['last_name'], $st['registered_date']);
        endforeach;



        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end

        // add a page
        $pdf->AddPage();


        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // reset pointer to the last page
        $pdf->lastPage();



        //Close and output PDF document
        $pdf->Output(md5(time()) . '.pdf', 'D');
    }


    ///////////////////////////////////Generate Membership Income Report


    public function generate_membershipIncome_pdf()
    { //load pdf library
        $this->load->library('membershipPDF');

        $pdf = new membershipPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dilshan');
        $pdf->SetTitle('Damaged Books');
        $pdf->SetSubject('Damaged Books');
        $pdf->SetKeywords('Damaged Books');

        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        // set font
        $pdf->SetFont('times', 'BI', 12);

        // ---------------------------------------------------------


        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );

        $this->table->set_template($template);

        $this->table->set_heading('Student ID', 'First Name', 'Last Name', 'Membership ID', 'Expire Date', 'Renew Date', 'Renew Fee');

        $memberR = $this->report_model->membership_report();

        foreach ($memberR as $mem) :
            $this->table->add_row($mem['student_id'], $mem['first_name'], $mem['last_name'], $mem['membership_ID'], $mem['expire_date'], $mem['renew_date'], $mem['renew_fee']);
        endforeach;



        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end

        // add a page
        $pdf->AddPage();


        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // reset pointer to the last page
        $pdf->lastPage();



        //Close and output PDF document
        $pdf->Output(md5(time()) . '.pdf', 'D');
    }



    public function generate_latereturn_Books_pdf()
    { //load pdf library
        $this->load->library('latereturnPDF');

        $pdf = new latereturnPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Dilshan');
        $pdf->SetTitle('Damaged Books');
        $pdf->SetSubject('Damaged Books');
        $pdf->SetKeywords('Damaged Books');

        // set default header data
        //$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);


        // set font
        $pdf->SetFont('times', 'BI', 12);

        // ---------------------------------------------------------


        //Generate HTML table data from MySQL - start
        $template = array(
            'table_open' => '<table border="1" cellpadding="2" cellspacing="1">'
        );

        $this->table->set_template($template);

        $this->table->set_heading('Student ID', 'First Name', 'Last Name', 'Phone', 'Book Copy ID', 'Book Tittle', 'Check Date', 'Return Date', 'Status');

        $lateR = $this->report_model->late_return();

        foreach ($lateR as $mem) :
            $this->table->add_row($mem['studentID'], $mem['first_name'], $mem['last_name'], $mem['phone'], $mem['book_copyID'], $mem['book_tittle'], $mem['checkout_date'], $mem['return_date'], $mem['status']);
        endforeach;



        $html = $this->table->generate();
        //Generate HTML table data from MySQL - end

        // add a page
        $pdf->AddPage();


        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');

        // reset pointer to the last page
        $pdf->lastPage();



        //Close and output PDF document
        $pdf->Output(md5(time()) . '.pdf', 'D');
    }
}
