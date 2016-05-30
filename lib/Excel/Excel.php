<?php

require_once dirname(__FILE__).'/Classes/PHPExcel.php';

class ExcelPHP {

    protected static $instance;

    private $_excelObj;
    private $_activeSheet = 0;
    private $_table = array('firstColumn' => 0, 'firstRow'=>1);
    private $_headers = [];
    private $_data = [];

    public function __construct() {
        $this->_excelObj = new PHPExcel();
    }

    /**
     * Devuelve una instancia de la clase, si no existe la crea
     * Singleton Method
     * @return ExcelPHP|null
     */
    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Setea el idx de la hoja activa
     * @param $idx
     */
    public function setActiveSheet($idx) {
        $this->_activeSheet = $idx;
    }

    /**
     * Setea las propiedades basicas del documento
     * @param array $properties
     */
    public function setProperties($properties = array()){
        // Set document properties
        if(!empty($properties['creator']))
            $this->_excelObj->getProperties()->setCreator($properties['creator']);
        if(!empty($properties['lastModifiedBy']))
            $this->_excelObj->getProperties()->setLastModifiedBy($properties['lastModifiedBy']);
        if(!empty($properties['title']))
            $this->_excelObj->getProperties()->setTitle($properties['title']);
        if(!empty($properties['subject']))
            $this->_excelObj->getProperties()->setSubject($properties['subject']);
        if(!empty($properties['description']))
            $this->_excelObj->getProperties()->setDescription($properties['description']);
        if(!empty($properties['keywords']))
            $this->_excelObj->getProperties()->setKeywords($properties['keywords']);
        if(!empty($properties['category']))
            $this->_excelObj->getProperties()->setCategory($properties['category']);
    }

    /**
     * Crea una nueva tabla asignandole la primera fila y la primera columna (Default: 0;1)
     * @param null $firstColumn
     * @param null $firstRow
     */
    public function newTable($firstColumn = null, $firstRow = null){
        if(!is_null($firstColumn))
            $this->_table['firstColumn'] = $firstColumn;
        if(!is_null($firstRow))
            $this->_table['firstRow'] = $firstRow;
    }

    /**
     * Setea los headers del listado en la hoja activa
     * @param array $headers
     * @throws Exception
     */
    public function setHeaders($headers = array()) {
        if(empty($headers)){
            throw new Exception('Empty Headers');
        }
        $this->_headers = $headers;
        //Le asignamos la hoja activa
        $sheet = $this->getActiveSheet();

        $this->completeRowData($sheet, $this->_table['firstRow'], $this->_headers);

        // Set fills
        $firstRow = $this->_table['firstRow'];
        $firstCol = $this->equalNumbersAlphabet($this->_table['firstColumn']);
        $lastCol = $this->equalNumbersAlphabet(count($this->_headers) -1);
        $range = $firstCol.$firstRow. ':' .$lastCol.$firstRow;

        $sheet->getStyle($range)->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID);
        $sheet->getStyle($range)->getFill()->getStartColor()->setRGB('BD0000');
        $sheet->getStyle($range)->getFont()->getColor()->setRGB('FFFFFF');
    }

    /**
     * Setea el contenido de la tabla
     * @param array $data
     * @throws Exception
     * @throws PHPExcel_Exception
     */
    public function setData(array $data = array()){
        if(empty($data)){
            throw new Exception('Empty Data');
        }
        $this->_data = $data;

        $sheet = $this->getActiveSheet();

        //Seteamos como primera fila la siguiente a los headers
        $initRow = $this->_table['firstRow'] + 1;
        foreach($this->_data as $rowData){
            $this->completeRowData($sheet, $initRow, $rowData);
            $initRow++;
        }
    }

    /**
     * Completa una fila de datos
     * @param $sheet
     * @param $row
     * @param $data
     */
    private function completeRowData(&$sheet, $row, $data){
        $idx = 0;
        $cantCols = count($data);
        for($col = $this->_table['firstColumn'];$idx <= $cantCols -1 ; $col++){
            $sheet->setCellValueByColumnAndRow($col, $row, $data[$idx]);
            $idx++;
        }
    }

    /**
     * Dispara la descarga del .xls en el browser
     * @throws PHPExcel_Reader_Exception
     */
    public function download() {
        $this->addHeadersMetaData();

        $objWriter = PHPExcel_IOFactory::createWriter($this->_excelObj, 'Excel5');
        $objWriter->save('php://output');
    }

    /**
     * Setea el ajuste del width para las columnas enviadas por parametro (Letras)
     * Si no llega ese parametro, toma todas
     * @param array $columns
     * @throws PHPExcel_Exception
     */
    public function setAutoSizeColumns($columns = array()){
        if(empty($columns)){
            $initCol = $this->equalNumbersAlphabet($this->_table['firstColumn']);
            $lastCol = $this->equalNumbersAlphabet(count($this->_headers)-1);
            for($i = $initCol;$i <= $lastCol;$i++){
                $columns[] = $i;
            }
        }

        $sheet = $this->getActiveSheet();
        foreach($columns as $col){
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }
    }

    /**
     * Setea los estilos de la hoja
     * Si no llega parametro usa los default ($this->_defaultStyles)
     * @param array $styles
     */
    public function setDefaultSheetStyles(){
        $ranges = $this->getTableRanges();

        $this->setVerticalAlignment($ranges['allTables']);
    }

    /**
     * Setea la alineacion vertical de todas las celdas de la hoja
     * @param string $alignment
     */
    public function setVerticalAlignment($range = null, $alignment = PHPExcel_Style_Alignment::VERTICAL_CENTER){
        if(is_null($range)){
            $tableRanges = $this->getTableRanges();
            $range = $tableRanges['allTable'];
        }

        $this->getActiveSheet()->getStyle($range)->getAlignment()->setVertical($alignment);
    }


    /**
     * Devuelve un array con los valores de rango
     * @return array
     */
    private function getTableRanges() {
        $ranges = [
            'firstCol' => $this->equalNumbersAlphabet($this->_table['firstColumn']),
            'lastCol'  => $this->equalNumbersAlphabet(count($this->_headers)-1),
            'firstRow' => $this->_table['firstRow'],
            'lastRow'  => count($this->_data) +1,
        ];

        $ranges['allTable'] = $ranges['firstCol'].$ranges['firstRow'].':'.$ranges['lastCol'].$ranges['lastRow'];
        return $ranges;
    }
    /**
     * Agrega los headers(MetaData) necesarios para exportar el excel
     */
    private function addHeadersMetaData() {
        $title = $this->_excelObj->getProperties()->getTitle();

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$title.'.xls"');
        header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
        header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
        header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header ('Pragma: public');
    }

    /**
     * Recibe un numero o una letra y devuelve el equivalente (letra => numero; numero => letra)
     * @param $char
     * @return int|string
     */
    public function equalNumbersAlphabet($char) {
        if(is_numeric($char)){
            foreach(range('A','Z') as $idx => $letter){
                if($idx == $char){
                    return $letter;
                }
            }
        }else{
            foreach(range('A','Z') as $idx => $letter){
                if($letter == $char){
                    return $idx;
                }
            }
        }
    }

    public function getActiveSheet() {
        return $this->_excelObj->setActiveSheetIndex($this->_activeSheet);
    }



}