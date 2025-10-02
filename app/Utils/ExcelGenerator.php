<?php

namespace App\Utils;

class ExcelGenerator
{
    private $data;
    private $headers;
    private $filename;

    public function __construct($data, $headers, $filename)
    {
        $this->data = $data;
        $this->headers = $headers;
        $this->filename = $filename;
    }

    public function download()
    {
        // Set headers for Excel download
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment; filename="' . $this->filename . '"');
        header('Cache-Control: max-age=0');

        // Start output
        echo $this->generateExcelContent();
        exit;
    }

    private function generateExcelContent()
    {
        $html = '<html>';
        $html .= '<head>';
        $html .= '<meta charset="UTF-8">';
        $html .= '<style>';
        $html .= 'table { border-collapse: collapse; width: 100%; }';
        $html .= 'th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }';
        $html .= 'th { background-color: #4472C4; color: white; font-weight: bold; }';
        $html .= 'tr:nth-child(even) { background-color: #f2f2f2; }';
        $html .= '.number { mso-number-format: "0"; }';
        $html .= '.date { mso-number-format: "dd/mm/yyyy"; }';
        $html .= '.text { mso-number-format: "@"; }';
        $html .= '</style>';
        $html .= '</head>';
        $html .= '<body>';

        $html .= '<table>';

        // Headers
        $html .= '<tr>';
        foreach ($this->headers as $header) {
            $html .= '<th>' . htmlspecialchars($header) . '</th>';
        }
        $html .= '</tr>';

        // Data rows
        foreach ($this->data as $row) {
            $html .= '<tr>';
            foreach ($row as $index => $cell) {
                $class = $this->getCellClass($index, $cell);
                $html .= '<td class="' . $class . '">' . htmlspecialchars($cell ?? '') . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</table>';
        $html .= '</body>';
        $html .= '</html>';

        return $html;
    }

    private function getCellClass($index, $value)
    {
        // Determine cell class based on column index and value
        if ($index === 0) return 'text'; // Alamat
        if ($index === 1) return 'text'; // Dusun
        if ($index === 2) return 'text'; // RW - force text to preserve leading zeros
        if ($index === 3) return 'text'; // RT - force text to preserve leading zeros
        if ($index === 4) return 'text'; // Nama Lengkap
        if ($index === 5) return 'text'; // No KK
        if ($index === 6) return 'text'; // NIK
        if ($index === 7) return 'text'; // Jenis Kelamin - force text to show ID properly
        if (in_array($index, [9, 22, 24, 26, 36, 37])) return 'date'; // Date columns (adjusted indices)
        if (is_numeric($value)) return 'number';
        return 'text';
    }
}
