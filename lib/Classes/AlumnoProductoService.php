<?php

    class Classes_AlumnoProductoService
    {
        private $PlanId;
        
        public function __contruct()
        {

        }
        
        public function GetAlumnoProducto($alumno, $producto)
        {
            $q = Doctrine_Query::create()
            ->select('ap.ProductoId, ap.AlumnoId')
            ->from('AlumnoProducto ap')
            ->where('ap.AlumnoId = ?', $alumno)
            ->andWhere('ap.ProductoId = ?', $producto)
            ->limit(1);
            //echo $q->getSqlQuery();
            return $q;
        }
        
        /**
         * asociar materias del plan template asociado al colegio
         */
        public function AsignarPlan(Doctrine_Record $AlumnoProducto)
        {
            // crear Plan de estudio  
            $Plan = new PlanDeEstudio();
            $Plan->save();
            
            $this->PlanId   =   $Plan->Id;
            
            // asociar plan al producto del alumno
            $AlumnoProducto->PlanDeEstudioId = $Plan->Id;
            $AlumnoProducto->save();
            //echo 'plan creado :'. $AlumnoProducto->PlanDeEstudioId;
            
            // si el producto requiere colegio
            if ($AlumnoProducto->Producto->RequiereColegio())
            {            
                $this->AddMateriasDeTemplate($AlumnoProducto);
            }
            else
            {
                //echo 'el tipo de producto no requiere colegio, entonces no se asigna plan de estudio de colegio';
                // redirigir a page
                $this->AddMateriasDeProducto($AlumnoProducto);
            }
        }
        
        private function AddMateriasDeProducto(Doctrine_Record $AlumnoProducto)
        {
            $MateriasProducto   =   $AlumnoProducto->Producto->GetMaterias();
            // crear materias del alumno del producto asociado
            $this->AddMaterias($MateriasProducto);
            
            // redirigir a page edit plan de estudio
            header("Location: /PlanDeEstudio/Edit/AlumnoProducto/$AlumnoProducto->Id");
        }
        
        private function AddMateriasDeTemplate($AlumnoProducto)
        {
            $MateriasTemplate = $AlumnoProducto->Alumno->GetColegio()->GetMateriasTemplate();
            
            // crear materias del alumno del plan template al plan de estudio creado
            $this->AddMaterias($MateriasTemplate);

            // redirigir a page edit plan de estudio
            header("Location: /PlanDeEstudio/Edit/AlumnoProducto/$AlumnoProducto->Id");
        }
        
        private function AddMaterias(Doctrine_Collection $Materias)
        {
            foreach ($Materias as $Materia)
            {

                $MateriaAlumno = new MateriaAlumno();
                
                $MateriaAlumno->MateriaId = $Materia->MateriaId;
                $MateriaAlumno->PlanDeEstudioId = $this->PlanId;
                
                $MateriaAlumno->save();

            }
        }
        
    }
?>