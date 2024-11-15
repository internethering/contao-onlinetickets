<?php

/**
 * This file is part of internethering/contao-onlinetickets.
 *
 * Copyright (c) 2016-2017 Richard Henkenjohann
 *
 * @package   internethering/contao-onlinetickets
 * @author    Richard Henkenjohann <richardhenkenjohann@googlemail.com>
 * @copyright 2016-2017 Richard Henkenjohann
 * @license   https://github.com/internethering/contao-onlinetickets/blob/master/LICENSE
 */


namespace Internethering\Isotope\OnlineTickets\Helper;

use Haste\IO\Reader\ArrayReader;
use Haste\IO\Writer\ExcelFileWriter;


/**
 * Class ExcelReport
 *
 * @package Internethering\Isotope\OnlineTickets\Helper
 */
class ExcelReport extends ExcelFileWriter
{

    protected $arrTmpCurrentRows;

    /**
     * {@inheritdoc}
     */
    public function __construct($file = '', $extension = '.xlsx')
    {
        parent::__construct($file, $extension);

        if (parent::prepare(new ArrayReader([]))) {
            // Set default font size to 12
            $this->spreadsheet->getDefaultStyle()->getFont()->setSize(12);
        }
    }


    /**
     * Return the current row
     *
     * @return int
     */
    public function getCurrentRow()
    {
        return $this->currentRow;
    }


    /**
     * Return the PHPExcel instance
     *
     * @return \PHPExcel
     */
    public function getPHPExcel()
    {
        return $this->spreadsheet;
    }


    /**
     * Write row to CSV file
     *
     * @param   array
     *
     * @return  bool
     */
    public function writeRow(array $data)
    {
        if (!is_array($data)) {
            return false;
        }

        $this->currentRow += 1;
        $currentColumn    = 0;

        foreach ($data as $value) {
            $this->spreadsheet->getActiveSheet()->setCellValueByColumnAndRow
            (
                $currentColumn++,
                $this->currentRow,
                (string) $value
            );
        }

        return true;
    }


    public function switchSheet($index)
    {
        // Save current row
        $this->arrTmpCurrentRows[$this->spreadsheet->getActiveSheetIndex()] = $this->currentRow;

        try {
            $this->spreadsheet->setActiveSheetIndex($index);
        } catch (\PhpOffice\PhpSpreadsheet\Exception $e) {
            $this->spreadsheet->createSheet($index);
            $this->spreadsheet->setActiveSheetIndex($index);
        }

        // Load current row from temp array
        try {
            $this->currentRow = $this->arrTmpCurrentRows[$index] ?: 0;
        } catch(\Throwable $e) {
            $this->currentRow = 0;
        }
    }


    /**
     * {@inheritdoc}
     */
    public function finish()
    {
        //parent::finish();

        $writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($this->spreadsheet, 'Xlsx');

        // Disable pre calculation to be able to use new formulas
        /** @noinspection PhpUndefinedMethodInspection */
        $writer->setPreCalculateFormulas(false);

        $writer->save(TL_ROOT . '/' . $this->strFile);
    }


    /**
     * Set the headline 1 style for a given length of columns
     *
     * @param int $columnLength
     */
    public function setH1Style($columnLength = 1)
    {
        $this
            ->setStyle(1, $columnLength)->getFont()
            ->setBold(true)
            ->setSize(18);
    }

    /**
     * Set the headline 2 style for a given length of columns
     *
     * @param int $columnLength
     */
    public function setH2Style($columnLength = 1)
    {
        $this
            ->setStyle(1, $columnLength)->getFont()
            ->setBold(true)
            ->setSize(16);
    }


    /**
     * Set the headline 1 style for a given length of columns
     *
     * @param int $columnLength
     */
    public function setH3Style($columnLength = 1)
    {
        $this
            ->setStyle(1, $columnLength)->getFont()
            ->setBold(true);
    }


    /**
     * @param int $rowLength    Quantity of rows selected
     * @param int $columnLength Quantity of columns selected
     * @param int $rowStart     Start point of row selection or <0> to use current row
     * @param int $columnStart  Start point of column selection
     *
     * @return \PHPExcel_Style
     */
    public function setStyle($rowLength = 1, $columnLength = 1, $rowStart = 1, $columnStart = 1)
    {
        $rowStart = $rowStart ?: $this->currentRow;

        if ($columnStart < 1) {
            $columnStart = 1;
        }
        return $this
            ->spreadsheet
            ->getActiveSheet()
            ->getStyleByColumnAndRow(
                $columnStart,
                $rowStart,
                $columnStart + $columnLength - 1,
                $rowStart + $rowLength - 1
            );
    }
}
