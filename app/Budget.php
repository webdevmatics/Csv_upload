<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    //
    protected $fillable=['zip','month','lodging','meal'];



    public function validateSaveStipendCsv($uploadedFile)
    {

        $upload = $uploadedFile;
        $filePath = $upload->getRealPath();
        $file = fopen($filePath, 'r');

        //csv table header
        $header = fgetcsv($file, 5000, ',');
        $escaped_header = [];
        foreach ($header as $key => $value) {
            array_push($escaped_header, preg_replace('/[^a-z]/','',strtolower($value)));
        }
        //looping through other columns skipping empty one
        while ($columns = fgetcsv($file)) {
            if ($columns[0] == "") {
                continue;
            }
            //refining data triming special char
            foreach ($columns as $key => &$val) {
                $val = preg_replace('/\D/', "", $val);
            }

            $data = array_combine($escaped_header, $columns);
            //settype to int and float
            foreach ($data as $key => &$val) {
                $val = ($key == 'zip' || $key == 'month') ? (integer)$val : (float)$val;
            }

            /*
             * Table update part
             */
            $zip = $data['zip'];
            $month = $data['month'];
            $lodging = $data['lodging'];
            $meal = $data['meal'];
            $housing = $data['housing'];
            $budget = Budget::firstOrNew(['zip' => $zip, 'month' => $month]);
            $budget->lodging = $lodging;
            $budget->meal = $meal;
            $budget->housing = $housing;
            $budget->save();
        }

    }
}
