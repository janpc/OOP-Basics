<?php
class Device
{
    private int $id;
    private int $serialNumber;
    private string $chipset;

    public function __construct( int $id, int $serialNumber, string $chipset)
    {
        $this->id = $id;
        $this->serialNumber = $serialNumber;
        $this->chipset =$chipset;
    }

    public function getId(): int
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

    public function setId( $id )
    {
        $this->id = $id;
    }

    public function setSerialNumber( $serialNumber )
    {
        $this->serialNumber = $serialNumber;
    }

    public function setChipset( $chipset )
    {
        $this->chipset = $chipset;
    }
}

class Mobile extends Device
{
    private string $connectivity;

    public function __construct( int $id, int $serialNumber, string $chipset, string $connectivity)
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

}

class Tablet extends Device
{
    private string $display;

    public function __construct( int $id, int $serialNumber, string $chipset, string $display){
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
}



class DeviceManager
{

    public function getDeviceSerialNumber(Device $device){
        return $device->getSerialNumber();
    }
}

$mobile = new Mobile(1, 12345, 'SnapDragon', '5G');

$tablet = new Tablet(2, 34625, 'Intel', 'Amoled 10.1"');

$deviceManager = new DeviceManager();

echo $deviceManager->getDeviceSerialNumber($mobile);
echo '<br>';
echo $deviceManager->getDeviceSerialNumber($tablet);