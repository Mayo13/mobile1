<?php defined('BASEPATH') or exit('No direct script access allowed');

require_once 'dompdf/autoload.inc.php';
// use \Mpdf\Mpdf

class mpdf extends Mpdf
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
