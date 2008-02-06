<?php
  /**
 * sfCustomUniqueValidator checks if a record exist in the database with all the mentionned fields.
 *
 * ex: Check if a companie with company_name exist in country_id 
 *   class:            sfCustomUniqueValidator
 *   param:
 *     class:          Companies    //the class on which the search is performed
 *     nb_fields:      2            //the number of fields on which the comparison is done
 *     field_1:        company_name //First field of the comparison
 *     field_2:        country_id   //Other country for the comparison
 *
 * @package    lib
 * @author     Joachim Martin
 * @date       15/06/2007
 */
 
class sfCustomUniqueValidator extends sfValidator {
 
   /**
   * Executes this validator.
   *
   * @param mixed A file or parameter value/array
   * @param error An error message reference
   *
   * @return bool true, if this validator executes successfully, otherwise false
   */
 
    public function execute(&$value, &$error) {
 
        $className  = $this->getParameter('class').'Peer';
 
        //Get fields number
        $nb_fields = $this->getParameter('nb_fields')
            ;
        //Define new criteria       
        $c = new Criteria();
        $myClass =  strtolower($this->getParameterHolder()->get("class"));
        $values = $this->getContext()->getRequest()->getParameter("$myClass");
        $values["fk_establecimiento_id"] = $this->getContext()->getUser()->getAttribute('fk_establecimiento_id');

        //Loop on the fields
        for($i = 1; $i <= $nb_fields ; $i++) {
            //Retrieve field_$i
            $check_param = $this->getParameterHolder()->get("field_$i");
            $check_value = $values["$check_param"];
            //If check value defined        
            if ($check_value != '') {   
                //Adding field to the criteria
                $columnName = call_user_func(array($className, 'translateFieldName'), $check_param, BasePeer::TYPE_FIELDNAME, 
                    BasePeer::TYPE_COLNAME);
                $c->add($columnName, $check_value);
            }
        }
        $object = call_user_func(array($className, 'doSelectOne'), $c);
 
        if ($object)
        {
          $tableMap = call_user_func(array($className, 'getTableMap'));
          foreach ($tableMap->getColumns() as $column)
          {
            if (!$column->isPrimaryKey())
            {
              continue;
            }
            $method = 'get'.$column->getPhpName();
            $primaryKey = call_user_func(array($className, 'translateFieldName'), $column->getPhpName(), BasePeer::TYPE_PHPNAME, 
BasePeer::TYPE_FIELDNAME);
            if ($object->$method() != $this->getContext()->getRequest()->getParameter($primaryKey))
            {
              $error = $this->getParameter('custom_unique_error');
 
              return false;
            }
          }
        }
        return true;
    } 
 
    public function initialize ($context, $parameters = null) {
        // initialize parent
        parent::initialize($context);
 
        //Set default parameters value
        $this->setParameter('custom_unique_error','The value is not unique');
 
        $this->getParameterHolder()->add($parameters);
 
        // check parameters
        if (!$this->getParameter('class'))
        {
          throw new sfValidatorException('The "class" parameter is mandatory for the sfCustomUniqueValidator validator.');
        }
 
        if (!$this->getParameter('nb_fields'))
        {
          throw new sfValidatorException('The "nb_fields" parameter is mandatory for the sfCustomUniqueValidator validator.');
        }
 
        return true;
    }
}
