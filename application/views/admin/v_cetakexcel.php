<?php 
 //membuat objek PHPExcel
$objPHPExcel = new PHPExcel();

            //set Sheet yang akan diolah 
/*
 //First sheet
    $sheet = $objPHPExcel->getActiveSheet();

    //Start adding next sheets
    
    $countsheet=0;
    while ($countsheet < 3) {

    // Add new sheet
    $objWorkSheet = $objPHPExcel->createSheet($countsheet); //Setting index when creating
    

    // Rename sheet
    $objWorkSheet->setTitle("$countsheet");

    $countsheet++;
    }
*/

    $objPHPExcel->setActiveSheetIndex(0);

//header

    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0 , 1, 'ID');
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1 , 1, 'PASSWORD');
    

    $i=2;
    foreach ($datapemilih->result() as $row){
            //isi atau content
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(0 ,  $i, $row->idpemilih);
    $objPHPExcel->getActiveSheet()->setCellValueByColumnAndRow(1 ,  $i, $row->password);
       
        $i++;
    }


    $objPHPExcel->setActiveSheetIndex(0);

            //change the font size
    $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setSize(12);
			//make the font become bold
    $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFont()->setBold(true);
            //set Color
    $objPHPExcel->getActiveSheet()->getStyle('A1:B1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setARGB('92D14F');

            //set title pada sheet (me rename nama sheet)
    $objPHPExcel->getActiveSheet()->setTitle('Data Pemilih Evote'); //dijadikan nama kelompok

            //mulai menyimpan excel format xlsx, kalau ingin xls ganti Excel2007 menjadi Excel5          
    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

            //sesuaikan headernya 
    header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
    header("Cache-Control: no-store, no-cache, must-revalidate");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            //ubah nama file saat diunduh
    header('Content-Disposition: attachment;filename="Data Pemilih Evote.xlsx"');
            //unduh file
    $objWriter->save("php://output");

            //Mulai dari create object PHPExcel itu ada dokumentasi lengkapnya di PHPExcel, 
            // Folder Documentation dan Example
            // untuk belajar lebih jauh mengenai PHPExcel silakan buka disitu
    ?>