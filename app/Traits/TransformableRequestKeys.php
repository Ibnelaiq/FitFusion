<?php

namespace App\Traits;

trait TransformableRequestKeys
{
    protected $exceptedColumns = [];
    protected $transformTable = [];

    /**
     * Convert keys to snake_case.
     *
     * @param array $data
     * @return void
     */
    protected function transformKeys(array $data = null) : void
    {
        if(!$data)
            $data = $this->except($this->exceptedColumns);

        $this->transformTableKeys($data);

        foreach ($data as $key => $value) {


            if (
                !(strpos($key, '_') !== false || preg_match('/[A-Z]/', $key))
            ){
                continue;
            }
            $this->offsetUnset($key);
            // Convert key to snake_case
            $newKey = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $key));
            $newKey = str_replace(' ', '_', $newKey);

            // Recursively process nested arrays
            if (is_array($value)) {
                $this->merge([
                    $newKey => $this->transformKeys($value)
                ]);
            } else {
                $this->merge([
                    $newKey => $value
                ]);
            }
        }
    }

    protected function transformTableKeys(array $data = null) : void
    {
        if(!$data)
        $data = $this->except($this->exceptedColumns);

        foreach ($data as $key => $value) {

            if(array_key_exists($key,$this->transformTable)){
                array_push($this->exceptedColumns, $key);
                $this->merge([
                    $this->transformTable[$key] => $value
                ]);
            }
        }


    }

    /**
    * Set columns to ignore in keys transformation.
    *
    * @param array $columns
    * @return void
    */
    public function setExceptColumns(array $columns) : void
    {
        $this->exceptedColumns = array_merge($this->exceptedColumns,$columns);
    }

    /**
    * Set columns to custom tranform except snake case.
    *
    * @param array $columns
    * @return void
    */
    public function setTransformTable(array $table) : void
    {
        $this->transformTable = $table;
    }

    /**
    * Override: for FormRequest PassedValidation
    *
    * @param array $columns
    * @return void
    */

    public function passedValidation() : void
    {
        $this->transformKeys();
        parent::passedValidation();
    }

}
