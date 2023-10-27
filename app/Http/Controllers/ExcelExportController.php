<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\curso;
use App\Models\asignacion;
use App\Models\alumno;
use App\Models\Administracion;
use App\Models\Docente;
use App\Models\graduandos;
use App\Models\inscripcion;
use App\Models\padreencargado;
use App\Models\pensum;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ExcelExportController extends Controller{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function exportToExcel(){
        $cursos = Curso::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getColumnDimension('A')->setWidth(15); 
        $sheet->getColumnDimension('B')->setWidth(30); 
        $sheet->getColumnDimension('C')->setWidth(20); 
        $sheet->getColumnDimension('D')->setWidth(40);     
        $sheet->setCellValue('A1', 'Código Curso');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Área');
        $sheet->setCellValue('D1', 'Pensum');
        $row = 2;
        foreach ($cursos as $curso) {
            $sheet->setCellValue('A' . $row, $curso->codigocurso);
            $sheet->setCellValue('B' . $row, $curso->nombre);
            $sheet->setCellValue('C' . $row, $curso->area);
            $sheet->setCellValue('D' . $row, $curso->pensum->nombre);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="cursos.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }    
    public function exportAsignacionToExcel(Request $request){
        $grado = $request->input('grado');
        $query = Asignacion::query();
        if (!empty($grado)) {
            $query->where('grado', $grado);
        }
        $asignacions = $query->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getColumnDimension('A')->setWidth(20); 
        $sheet->getColumnDimension('B')->setWidth(40); 
        $sheet->getColumnDimension('C')->setWidth(20); 
        $style = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:D1')->applyFromArray($style);
        $sheet->setCellValue('A1', 'Docente');
        $sheet->setCellValue('B1', 'Curso');
        $sheet->setCellValue('C1', 'Grado');
        $row = 2;
        foreach ($asignacions as $asignacion) {
            $sheet->setCellValue('A' . $row, $asignacion->docente->nombre . ' ' . $asignacion->docente->apellido);
            $sheet->setCellValue('B' . $row, $asignacion->curso->nombre);
            $sheet->setCellValue('C' . $row, $asignacion->grado);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="asignaciones.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
    public function exportDocenteToExcel(){
        $docentes = Docente::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getColumnDimension('A')->setWidth(20); 
        $sheet->getColumnDimension('B')->setWidth(20); 
        $sheet->getColumnDimension('C')->setWidth(10); 
        $sheet->getColumnDimension('D')->setWidth(20); 
        $sheet->getColumnDimension('E')->setWidth(15); 
        $sheet->getColumnDimension('F')->setWidth(60); 
        $sheet->getColumnDimension('G')->setWidth(20); 
        $sheet->getColumnDimension('H')->setWidth(15); 
        $style = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:I1')->applyFromArray($style);
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Apellido');
        $sheet->setCellValue('C1', 'Edad');
        $sheet->setCellValue('D1', 'Fecha de Nacimiento');
        $sheet->setCellValue('E1', 'Teléfono');
        $sheet->setCellValue('F1', 'Dirección');
        $sheet->setCellValue('G1', 'Correo');
        $sheet->setCellValue('H1', 'Género');
        $row = 2;
        foreach ($docentes as $docente) {
            $sheet->setCellValue('A' . $row, $docente->nombre);
            $sheet->setCellValue('B' . $row, $docente->apellido);
            $sheet->setCellValue('C' . $row, $docente->edad);
            $sheet->setCellValue('D' . $row, $docente->fechanac);
            $sheet->setCellValue('E' . $row, $docente->telefono);
            $sheet->setCellValue('F' . $row, $docente->direccion);
            $sheet->setCellValue('G' . $row, $docente->correo);
            $sheet->setCellValue('H' . $row, $docente->genero);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="docentes.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
    public function exportAlumnoToExcel(){
        $alumnos = alumno::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getColumnDimension('A')->setWidth(20); 
        $sheet->getColumnDimension('B')->setWidth(20); 
        $sheet->getColumnDimension('C')->setWidth(20); 
        $sheet->getColumnDimension('D')->setWidth(10); 
        $sheet->getColumnDimension('E')->setWidth(20); 
        $sheet->getColumnDimension('F')->setWidth(15); 
        $sheet->getColumnDimension('G')->setWidth(60); 
        $sheet->getColumnDimension('H')->setWidth(25); 
        $sheet->getColumnDimension('I')->setWidth(20); 
        $sheet->getColumnDimension('J')->setWidth(15); 
        $style = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:K1')->applyFromArray($style);
        $sheet->setCellValue('A1', 'Código Estudiante');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Apellido');
        $sheet->setCellValue('D1', 'Edad');
        $sheet->setCellValue('E1', 'Fecha de Nacimiento');
        $sheet->setCellValue('F1', 'Teléfono');
        $sheet->setCellValue('G1', 'Dirección');
        $sheet->setCellValue('H1', 'Correo');
        $sheet->setCellValue('I1', 'CUI');
        $sheet->setCellValue('J1', 'Género');
        $row = 2;
        foreach ($alumnos as $alumno) {
            $sheet->setCellValue('A' . $row, $alumno->codigoes);
            $sheet->setCellValue('B' . $row, $alumno->nombre);
            $sheet->setCellValue('C' . $row, $alumno->apellido);
            $sheet->setCellValue('D' . $row, $alumno->edad);
            $sheet->setCellValue('E' . $row, $alumno->fechanac);
            $sheet->setCellValue('F' . $row, $alumno->telefono);
            $sheet->setCellValue('G' . $row, $alumno->direccion);
            $sheet->setCellValue('H' . $row, $alumno->correo);
            $sheet->setCellValue('I' . $row, $alumno->cui);
            $sheet->setCellValue('J' . $row, $alumno->genero);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="alumnos.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
    public function exportInscripcionToExcel(Request $request){
        $grado = $request->input('grado');
        $inscripcions = Inscripcion::where('grado', $grado)->get();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(20);
        $sheet->getColumnDimension('D')->setWidth(10);
        $sheet->getColumnDimension('E')->setWidth(20);
        $sheet->getColumnDimension('F')->setWidth(20);
        $sheet->getColumnDimension('G')->setWidth(15);
        $sheet->getColumnDimension('H')->setWidth(20);
        $sheet->getColumnDimension('I')->setWidth(20);
        $sheet->getColumnDimension('J')->setWidth(20);
        $sheet->getColumnDimension('K')->setWidth(20);
        $style = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:K1')->applyFromArray($style);
        $sheet->setCellValue('A1', 'Código Estudiante');
        $sheet->setCellValue('B1', 'Apellido');
        $sheet->setCellValue('C1', 'Nombre');
        $sheet->setCellValue('D1', 'Edad');
        $sheet->setCellValue('E1', 'Fecha de Inscripción');
        $sheet->setCellValue('F1', 'Nacionalidad');
        $sheet->setCellValue('G1', 'Grado');
        $sheet->setCellValue('H1', 'CUI');
        $row = 2;
        foreach ($inscripcions as $inscripcion) {
            $sheet->setCellValue('A' . $row, $inscripcion->alumno->codigoes);
            $sheet->setCellValue('B' . $row, $inscripcion->alumno->apellido);
            $sheet->setCellValue('C' . $row, $inscripcion->alumno->nombre);
            $sheet->setCellValue('D' . $row, $inscripcion->alumno->edad);
            $sheet->setCellValue('E' . $row, $inscripcion->anio);
            $sheet->setCellValue('F' . $row, $inscripcion->nacionalidad);
            $sheet->setCellValue('G' . $row, $inscripcion->grado);
            $sheet->setCellValue('H' . $row, $inscripcion->alumno->cui);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="inscripciones.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
    public function exportPadreToExcel(){
        $padre_encargados = padreencargado::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getColumnDimension('A')->setWidth(20);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(10);
        $sheet->getColumnDimension('D')->setWidth(60);
        $sheet->getColumnDimension('E')->setWidth(40);
        $style = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:F1')->applyFromArray($style);
        $sheet->setCellValue('A1', 'Nombre');
        $sheet->setCellValue('B1', 'Apellido');
        $sheet->setCellValue('C1', 'Teléfono');
        $sheet->setCellValue('D1', 'Dirección');
        $sheet->setCellValue('E1', 'Alumno a Cargo');
        $row = 2;
        foreach ($padre_encargados as $padre_encargado) {
            $sheet->setCellValue('A' . $row, $padre_encargado->nombre);
            $sheet->setCellValue('B' . $row, $padre_encargado->apellido);
            $sheet->setCellValue('C' . $row, $padre_encargado->telefono);
            $sheet->setCellValue('D' . $row, $padre_encargado->direccion);
            $sheet->setCellValue('E' . $row, $padre_encargado->alumno->nombre . ' ' . $padre_encargado->alumno->apellido);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="padres_encargados.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
    public function exportGraduandoToExcel(){
        $graduandos = graduandos::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getColumnDimension('A')->setWidth(20); 
        $sheet->getColumnDimension('B')->setWidth(25); 
        $sheet->getColumnDimension('C')->setWidth(25); 
        $sheet->getColumnDimension('D')->setWidth(20); 
        $style = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:F1')->applyFromArray($style);
        $sheet->setCellValue('A1', 'Código Estudiante');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Apellido');
        $sheet->setCellValue('D1', 'Año de graduación');
        $row = 2;
        foreach ($graduandos as $graduando) {
            $sheet->setCellValue('A' . $row, $graduando->codigoalu);
            $sheet->setCellValue('B' . $row, $graduando->nombre);
            $sheet->setCellValue('C' . $row, $graduando->apellido);
            $sheet->setCellValue('D' . $row, $graduando->anio);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="graduandos.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
    public function exportAdmonToExcel(){
        $admons = Administracion::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->getColumnDimension('A')->setWidth(20); 
        $sheet->getColumnDimension('B')->setWidth(30); 
        $sheet->getColumnDimension('C')->setWidth(20); 
        $sheet->getColumnDimension('D')->setWidth(40); 
        $sheet->getColumnDimension('E')->setWidth(40); 
        $style = [
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER],
        ];
        $sheet->getStyle('A1:F1')->applyFromArray($style);
        $sheet->setCellValue('A1', 'Código Actividad');
        $sheet->setCellValue('B1', 'Nombre');
        $sheet->setCellValue('C1', 'Fecha');
        $sheet->setCellValue('D1', 'Descripción');
        $sheet->setCellValue('E1', 'Encargado de revisión e impresión');
        $row = 2;
        foreach ($admons as $admon) {
            $sheet->setCellValue('A' . $row, $admon->codigoadmon);
            $sheet->setCellValue('B' . $row, $admon->nombreact);
            $sheet->setCellValue('C' . $row, $admon->fecha);
            $sheet->setCellValue('D' . $row, $admon->descripcion);
            $sheet->setCellValue('E' . $row, $admon->docente->nombre . ' ' . $admon->docente->apellido);
            $row++;
        }
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="actividades_administrativas.xlsx"');
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
    }
}
