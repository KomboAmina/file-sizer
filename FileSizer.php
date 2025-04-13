<?php
/**
 * @author Amina Kombo <https://aminakombo.work>
 * Class to get the size of a file and format them in units from bytes to Yottabytes.
 * 13th April 2025
 */

class FileSizer{

    private static string $unitString = "BKMGTPEZY";

    /**
     * @param string $fileName
     * @param string $unit
     * @return array
     */
    public static function getFileSize(string $fileName, string $unit = "b"):array{

        if(!file_exists($fileName)){

            echo "<p>Error: ".$fileName." does not exist.</p>";

        }

        $unit = self::getValidUnit($unit);

        return array(
                    "filename"=>$fileName,
                    "size"=>self::sizeThisFile($fileName, $unit),
                    "unit"=>$unit,
                    "longunit"=>self::getLongUnit($unit)
                );

    }

    /**
     * @param string $fileName
     * @param string $unit
     * @return float $fileSize
     */
    public static function sizeThisFile(string $fileName, string $unit):float{

        $fileSize = 0;

        if($unit == "b"){

            $fileSize = filesize($fileName) * 8;

        }

        else{

            $bytes = filesize($fileName);

            $factor = strpos(self::$unitString, $unit);

            $fileSize = $bytes / pow(1024, $factor);

        }

        return $fileSize;

    }

    /**
     * @param string $testUnit
     * @return string $validUnit
     */
    public static function getValidUnit(string $testUnit):string{

        $validUnit = "";

        if(strlen($testUnit) > 1){

            $testUnit = $testUnit[0];

        }

        if(strlen($testUnit) == 0){

            $validUnit = "b";

        }

        if(strlen($testUnit) > 0 && $testUnit !== "b"){

            $testUnit = strtoupper($testUnit);

            $validUnit = (str_contains(self::$unitString,$testUnit)) ?
                $testUnit : $validUnit;

        }

        return $validUnit;

    }

    /**
     * @param string $unit
     * @return string
     */
    private static function getLongUnit(string $unit = "b"):string{

        $longUnit = ($unit == "b") ? "bytes" : strtoupper($unit)."B";

        return ($unit == "B") ? "B" : $longUnit;

    }

}
