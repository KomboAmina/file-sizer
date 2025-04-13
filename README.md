# FileSizer
PHP Class to get the size of a file and format them in units from bytes (by default) to Yottabytes.

## Usage
Call the static method getFileSize() and store the returned array in a variable.

```php
<?php
$fileSize = FileSizer::getFileSize("file.txt","K");//in KB

print_r($fileSize);//displays the returned array

echo "<hr>";

//show the size in human readable format.

echo "<p>".number_format($fileSize['size'],2)." ".$fileSize['longunit']."</p>";

```

### The unitString Parameter
Consists of a single string arranged in increasing quantity from Bytes to YottaBytes.
Bits should not feature in the unitSrring parameter.
```php
<?php
Class FileSizer{

  private static string $unitString = "BKMGTPEZY";

  //this method is for demonstration only and will not be in the real class

  public static getUnitString():string{

    return self::$unitString;

  }

}

//display the unitString parameter
echo FileSizer::getUnitString();

```

### The getFileSize() returned Array
```php
<?php
array(
      "filename"=>$fileName,//path to the file size to be measured.
      "size"=>self::sizeThisFile($fileName, $unit),//perform the sizing calculation
      "unit"=>$unit,//passed as a paremeter
      "longunit"=>self::getLongUnit($unit)//eg K becomes KB
  );
```

## Errors
The getFileSize() method will throw an error if the file path given in the $fileName parameter does not exist.
