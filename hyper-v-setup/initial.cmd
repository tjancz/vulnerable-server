$templateVMName = "KaliLinuxTemplate"
$vmBaseName = "kali-linux-"
$numberOfVMs = 20

for ($i = 1; $i -le $numberOfVMs; $i++) {
    $newVMName = "$vmBaseName$i"
    $newVHDPath = "C:\VMs\$newVMName\$newVMName.vhdx"

    # Kopiowanie VHD z maszyny wzorcowej
    $templateVHDPath = (Get-VMHardDiskDrive -VMName $templateVMName).Path
    $newVHDDir = Split-Path -Path $newVHDPath -Parent
    if (-not (Test-Path -Path $newVHDDir)) {
        New-Item -ItemType Directory -Path $newVHDDir
    }
    Copy-Item -Path $templateVHDPath -Destination $newVHDPath

    # Tworzenie nowej maszyny wirtualnej z użyciem skopiowanego VHD
    New-VM -Name $newVMName -MemoryStartupBytes 2GB -VHDPath $newVHDPath -Generation 2 -SwitchName "Default Switch"

    # Uruchomienie nowej maszyny wirtualnej
    Start-VM -Name $newVMName
}
