<?php

namespace OpenMooc;

class Service
{
      private $errors; //array of errors

      public function setError($error)
      {
          if(is_array($error))
              $this->errors = $error;
          else
              $this->errors[] = $error;
      }

      public function errors()
      {
          return $this->errors;
      }
}