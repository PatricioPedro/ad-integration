Set-ExecutionPolicy Unrestricted 

# --------------

Import-Module WebAdministration

# --------------

$sitenome = $args[0]

New-WebVirtualDirectory -Site $sitenome -Name "teste1" -PhysicalPath "C:\Inetpub\vhost\site.com.br\httpdocs\teste1" 
