<?php
    class Classes_PlanDeEstudioService
    {
        public function __construct( )
        {
            
        }
        
        public function GetMaterias( $plan )
        {
            $q = Doctrine_Query::create()
            ->select('m.materiaid')
            ->from('MateriaAlumno m')
            ->where('m.plandeestudioid= ?', $plan);
            
            return $q;
        }
    }
?>