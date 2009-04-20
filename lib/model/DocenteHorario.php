<?php

require_once 'lib/model/om/BaseDocenteHorario.php';


/**
 * Skeleton subclass for representing a row from the 'docente_horario' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package model
 */	
class DocenteHorario extends BaseDocenteHorario {

    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(DocenteHorarioPeer::DATABASE_NAME);
        }

        try {
            $con->beginTransaction();

            $evento = EventoPeer::retrieveByPk($this->getFkEventoId());
            $evento->delete();

            DocenteHorarioPeer::doDelete($this, $con);
            $this->setDeleted(true);

            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }



} // DocenteHorario
