<?php
include 'exercise3.php';
interface DeviceRepository
{
    function create(Device $device);
    function findById($deviceId): Device;
}

class MemoryRepository  implements DeviceRepository
{
    public array $devices = [];

    function create(Device $device)
    {
        array_push($this->devices, $device);
    }
    function findById($deviceId): Device
    {
        foreach ($this->devices as $device) {
            if ($device->getId() === $deviceId) {
                return $device;
            }
        }

        return null;
    }
}


class DeviceManager
{
    public function addDevice(DeviceRepository $repository, Device $device)
    {
        $repository->create($device);
    }
}


$repository = new MemoryRepository();

$deviceManager = new DeviceManager;

$deviceManager->addDevice($repository, $mobile);
$deviceManager->addDevice($repository, $tablet);
echo "<br><br>4<br>";
echo $repository->findById('Tablet')->getDetail('Tablet');
echo "<br><br>";
echo $repository->findById('Mobile')->getDetail('Tablet');
