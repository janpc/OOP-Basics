<?php
abstract class  Device
{
    private string $id;
    private int $serialNumber;
    private string $chipset;

    public function __construct( string $id, int $serialNumber, string $chipset)
    {
        $this->id = $id;
        $this->serialNumber = $serialNumber;
        $this->chipset =$chipset;
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getSerialNumber(): int
    {
        return $this->serialNumber;
    }

    public function getChipset(): string
    {
        return $this->chipset;
    }

    public function setId( string $id )
    {
        $this->id = $id;
    }

    public function setSerialNumber( int $serialNumber )
    {
        $this->serialNumber = $serialNumber;
    }

    public function setChipset( string $chipset )
    {
        $this->chipset = $chipset;
    }

    public abstract function getDetail( string $deviceId );
}


class Mobile extends Device
{
    private string $connectivity;

    public function __construct( string $id, int $serialNumber, string $chipset, string $connectivity)
    {
        parent::__construct($id, $serialNumber, $chipset);

        $this->connectivity = $connectivity;
    }   

    public function getConnectivity(): string
    {
        return $this->connectivity;
    }

    public function setConnectivity( string $connectivity ) 
    {
        $this->connectivity = $connectivity;
    }

    public function getDetail( string $deviceId ){
        return $this->getId() . ": <br>Serial Number: " . $this->getSerialNumber() . " <br>Chipset: " . $this->getChipset(). " <br>Connectivity: " . $this->getConnectivity();
    }

}

class Tablet extends Device
{
    private string $display;

    public function __construct( string $id, int $serialNumber, string $chipset, string $display){
        parent::__construct($id, $serialNumber, $chipset);

        $this->display = $display;
    }

    public function getDisplay(): string
    {
        return $this->display;
    }

    public function setDisplay( string $display ) 
    {
        $this->display = $display;
    }

    public function getDetail( string $deviceId ){
        return $this->getId() . ": <br>Serial Number: " . $this->getSerialNumber() . " <br>Chipset: " . $this->getChipset(). " <br>Connectivity: " . $this->getDisplay();
    }
}


$mobile = new Mobile('Mobile', 12345, 'SnapDragon', '5G');

$tablet = new Tablet('Tablet', 34625, 'Intel', 'Amoled 10.1"');

echo "3<br>";
echo $mobile->getDetail("Mobile");
echo "<br><br>";
echo $tablet->getDetail("Tablet");
