<?php
class Costumers
{
    /**
     *
     */
    public function __construct()
    {
    }

    /**
     *
     */
    public function __destruct()
    {
    }
    
    /**
     * Set friendly columns\' names to order tables\' entries
     */
    public function setOrderingValues()
    {
        $ordering = [
            'id' => 'ID',
            'f_name' => 'First Name',
            'l_name' => 'Last Name',
            'certificate_number' =>'Certificate Number',
            'training_name' => 'Training Name',
            'college_name' => 'Organization Name'
          //  'updated_at' => 'Updated at'
        ];

        return $ordering;
    }
}
?>
