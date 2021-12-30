<?php defined('BASEPATH') or exit('No direct script access allowed');



class detect extends Mobile_Detect
{
    /**
     * PDF filename
     * @var String
     */
    public $filename;
    protected $ci;

    public function __construct()
    {
        $this->ci = &get_instance();
        $this->filename = "laporan.pdf";
    }

    protected function cix()
    {
        return get_instance();
    }

    public function generate($view, $data = array(), $paper, $orientation)
    {
        $mpdf = new \Mpdf\Mpdf();
        $html = $this->ci->load->view($view, $data, TRUE);
        $mpdf->WriteHTML($html);
        $mpdf->Output();
    }
}
