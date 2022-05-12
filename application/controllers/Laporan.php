<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Mcrud');
        if (!$this->session->logged_in) {
            redirect('Adminpanel');
        }
    }

    public function pemasukan()
    {
        // loading frontend layout
        $data['title'] = 'Laporan Pemasukan';
        $this->template->load('layout_admin', 'admin/laporan/pemasukan', $data);
    }

    public function pengeluaran()
    {
        // loading frontend layout
        $data['title'] = 'Laporan Pengeluaran';
        $this->template->load('layout_admin', 'admin/laporan/pengeluaran', $data);
    }

    public function cetakLaporanPemasukan()
    {
        $dari = date('Y-m-d', strtotime($this->input->post('dari')));
        $sampai = date('Y-m-d', strtotime($this->input->post('sampai')));
        if (isset($_POST['cetak'])) {
            $data['pemasukan'] = $this->Mcrud->pemasukan($dari, $sampai)->result();
            $data['dari'] = $dari;
            $data['sampai'] = $sampai;
            $this->load->view('admin/laporan/laporan_pemasukan', $data);
        } else if (isset($_POST['excell'])) {
            require($_SERVER['DOCUMENT_ROOT'] . '/application/third_party/phpoffice/src/Spreadsheet.php');

            $object = new Spreadsheet;
            $object->getProperties()->setCreator("Vicky Irwanto");
            $object->getProperties()->setLastModifiedBy("Vicky Irwanto");
            $object->getProperties()->setTitle("Data Pemasukan");
            $object->setActiveSheetIndex(0);

            $object->getActiveSheet()->setCellValue('A1', 'Invoice');
            $object->getActiveSheet()->setCellValue('B1', 'Nama Pemesan');
            $object->getActiveSheet()->setCellValue('C1', 'Rekening');
            $object->getActiveSheet()->setCellValue('D1', 'Alamat Pengiriman');
            $object->getActiveSheet()->setCellValue('E1', 'Sub Total');

            $baris = 2;
            foreach ($data['pemasukan'] as $item) {
                $object->setActiveSheetIndex(0)->setCellValue('A' . $baris, $item->idTransaksi);
                $object->setActiveSheetIndex(0)->setCellValue('B' . $baris, $item->namaKonsumen);
                $object->setActiveSheetIndex(0)->setCellValue('C' . $baris, $item->noRekening . '-' . $item->namaRekening);
                $object->setActiveSheetIndex(0)->setCellValue('D' . $baris, $item->alamatPengiriman);
                $object->setActiveSheetIndex(0)->setCellValue('E' . $baris, $item->totalBelanja);

                $baris++;
            }
            $filename = 'laporan-pemasukan.xlsx';
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="' . $filename . '"');
            header('Cache-control: max-age=0');
            $writer = new Xlsx($object);
            $writer->save('php://output');
            exit;
        } else {
            $data['dari'] = $dari;
            $data['sampai'] = $sampai;
            $data['pemasukan'] = $this->Mcrud->pemasukan($dari, $sampai)->result();
            $data['title_pdf'] = 'Laporan_Pemasukan';
            $file_pdf = 'laporan_pemasukan';
            $paper = 'A4';
            $orientation = "landscape";
            $html = $this->load->view('admin/laporan/pdf_pemasukan', $data, true);
            $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        }
    }

    public function cetakLaporanPengeluaran()
    {
        $dari = date('Y-m-d', strtotime($this->input->post('dari')));
        $sampai = date('Y-m-d', strtotime($this->input->post('sampai')));
        if (isset($_POST['cetak'])) {
            $data['pengeluaran'] = $this->Mcrud->pengeluaran($dari, $sampai)->result();
            $data['dari'] = $dari;
            $data['sampai'] = $sampai;
            $this->load->view('admin/laporan/laporan_pengeluaran', $data);
        } else if (isset($_POST['excell'])) {
        } else {
            $data['dari'] = $dari;
            $data['sampai'] = $sampai;
            $data['pengeluaran'] = $this->Mcrud->pengeluaran($dari, $sampai)->result();
            $data['title_pdf'] = 'Laporan_Pengeluaran';
            $file_pdf = 'laporan_pengeluaran';
            $paper = 'A4';
            $orientation = "landscape";
            $html = $this->load->view('admin/laporan/pdf_pengeluaran', $data, true);
            $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        }
    }
}
