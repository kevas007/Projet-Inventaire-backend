<?php











namespace Composer;

use Composer\Autoload\ClassLoader;
use Composer\Semver\VersionParser;






class InstalledVersions
{
private static $installed = array (
  'root' => 
  array (
    'pretty_version' => 'dev-main',
    'version' => 'dev-main',
    'aliases' => 
    array (
    ),
    'reference' => '81d0c49da7630b639cc81ec3adada14e3431241c',
    'name' => 'nwidart/inventaire',
  ),
  'versions' => 
  array (
    'bacon/bacon-qr-code' => 
    array (
      'pretty_version' => '2.0.6',
      'version' => '2.0.6.0',
      'aliases' => 
      array (
      ),
      'reference' => '0069435e2a01a57193b25790f105a5d3168653c1',
    ),
    'barryvdh/laravel-snappy' => 
    array (
      'pretty_version' => 'v1.0.0',
      'version' => '1.0.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '2c18a3602981bc6f25b32908cf8aaa05952ab2f7',
    ),
    'dasprid/enum' => 
    array (
      'pretty_version' => '1.0.3',
      'version' => '1.0.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '5abf82f213618696dda8e3bf6f64dd042d8542b2',
    ),
    'doctrine/inflector' => 
    array (
      'pretty_version' => '2.0.4',
      'version' => '2.0.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '8b7ff3e4b7de6b2c84da85637b59fd2880ecaa89',
    ),
    'doctrine/lexer' => 
    array (
      'pretty_version' => '1.2.2',
      'version' => '1.2.2.0',
      'aliases' => 
      array (
      ),
      'reference' => '9c50f840f257bbb941e6f4a0e94ccf5db5c3f76c',
    ),
    'egulias/email-validator' => 
    array (
      'pretty_version' => '2.1.25',
      'version' => '2.1.25.0',
      'aliases' => 
      array (
      ),
      'reference' => '0dbf5d78455d4d6a41d186da50adc1122ec066f4',
    ),
    'h4cc/wkhtmltoimage-amd64' => 
    array (
      'pretty_version' => '0.12.4',
      'version' => '0.12.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c4e33f635207af89a704205b8902fb5715ca88be',
    ),
    'h4cc/wkhtmltopdf-amd64' => 
    array (
      'pretty_version' => '0.12.4',
      'version' => '0.12.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '4e2ab2d032a5d7fbe2a741de8b10b8989523c95b',
    ),
    'illuminate/collections' => 
    array (
      'pretty_version' => 'v8.83.1',
      'version' => '8.83.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '5cf7ed1c0a1b8049576b29f5cab5c822149aaa91',
    ),
    'illuminate/console' => 
    array (
      'pretty_version' => 'v8.83.1',
      'version' => '8.83.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd93e3aeff1b7a0f647a8b20eefa8547fdcd61dcf',
    ),
    'illuminate/container' => 
    array (
      'pretty_version' => 'v8.83.1',
      'version' => '8.83.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '14062628d05f75047c5a1360b9350028427d568e',
    ),
    'illuminate/contracts' => 
    array (
      'pretty_version' => 'v8.83.1',
      'version' => '8.83.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '5e0fd287a1b22a6b346a9f7cd484d8cf0234585d',
    ),
    'illuminate/filesystem' => 
    array (
      'pretty_version' => 'v8.83.1',
      'version' => '8.83.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '73db3e9a233ed587ba54f52ab8580f3c7bc872b2',
    ),
    'illuminate/macroable' => 
    array (
      'pretty_version' => 'v8.83.1',
      'version' => '8.83.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'aed81891a6e046fdee72edd497f822190f61c162',
    ),
    'illuminate/support' => 
    array (
      'pretty_version' => 'v8.83.1',
      'version' => '8.83.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'fe5469faa982e2dd8c2f5978b23cf881e3715d1b',
    ),
    'illuminate/translation' => 
    array (
      'pretty_version' => 'v8.83.1',
      'version' => '8.83.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'c10a68f37f590dc8c1c1fe5b6ad3f09381282137',
    ),
    'illuminate/validation' => 
    array (
      'pretty_version' => 'v8.83.1',
      'version' => '8.83.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '49b1cfd3a32f04255eed68fc1c304659de50e374',
    ),
    'knplabs/knp-snappy' => 
    array (
      'pretty_version' => 'v1.4.1',
      'version' => '1.4.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '5126fb5b335ec929a226314d40cd8dad497c3d67',
    ),
    'laravel/breeze' => 
    array (
      'pretty_version' => 'v1.8.1',
      'version' => '1.8.1.0',
      'aliases' => 
      array (
      ),
      'reference' => 'bdd6b8ac4ef7237770b4cb8b741a14e471e890a3',
    ),
    'laravel/ui' => 
    array (
      'pretty_version' => 'v3.4.4',
      'version' => '3.4.4.0',
      'aliases' => 
      array (
      ),
      'reference' => '1596de849ecafc0bcc891389da939012b67f9d5c',
    ),
    'nesbot/carbon' => 
    array (
      'pretty_version' => '2.56.0',
      'version' => '2.56.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '626ec8cbb724cd3c3400c3ed8f730545b744e3f4',
    ),
    'nwidart/inventaire' => 
    array (
      'pretty_version' => 'dev-main',
      'version' => 'dev-main',
      'aliases' => 
      array (
      ),
      'reference' => '81d0c49da7630b639cc81ec3adada14e3431241c',
    ),
    'psr/container' => 
    array (
      'pretty_version' => '1.1.1',
      'version' => '1.1.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '8622567409010282b7aeebe4bb841fe98b58dcaf',
    ),
    'psr/container-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0',
      ),
    ),
    'psr/log' => 
    array (
      'pretty_version' => '1.1.4',
      'version' => '1.1.4.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd49695b909c3b7628b6289db5479a1c204601f11',
    ),
    'psr/log-implementation' => 
    array (
      'provided' => 
      array (
        0 => '1.0|2.0',
      ),
    ),
    'psr/simple-cache' => 
    array (
      'pretty_version' => '1.0.1',
      'version' => '1.0.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '408d5eafb83c57f6365a3ca330ff23aa4a5fa39b',
    ),
    'simplesoftwareio/simple-qrcode' => 
    array (
      'pretty_version' => '4.2.0',
      'version' => '4.2.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '916db7948ca6772d54bb617259c768c9cdc8d537',
    ),
    'symfony/console' => 
    array (
      'pretty_version' => 'v5.4.3',
      'version' => '5.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a2a86ec353d825c75856c6fd14fac416a7bdb6b8',
    ),
    'symfony/deprecation-contracts' => 
    array (
      'pretty_version' => 'v2.5.0',
      'version' => '2.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '6f981ee24cf69ee7ce9736146d1c57c2780598a8',
    ),
    'symfony/finder' => 
    array (
      'pretty_version' => 'v5.4.3',
      'version' => '5.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '231313534dded84c7ecaa79d14bc5da4ccb69b7d',
    ),
    'symfony/http-foundation' => 
    array (
      'pretty_version' => 'v5.4.3',
      'version' => '5.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'ef409ff341a565a3663157d4324536746d49a0c7',
    ),
    'symfony/mime' => 
    array (
      'pretty_version' => 'v5.4.3',
      'version' => '5.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'e1503cfb5c9a225350f549d3bb99296f4abfb80f',
    ),
    'symfony/polyfill-ctype' => 
    array (
      'pretty_version' => 'v1.24.0',
      'version' => '1.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '30885182c981ab175d4d034db0f6f469898070ab',
    ),
    'symfony/polyfill-intl-grapheme' => 
    array (
      'pretty_version' => 'v1.24.0',
      'version' => '1.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '81b86b50cf841a64252b439e738e97f4a34e2783',
    ),
    'symfony/polyfill-intl-idn' => 
    array (
      'pretty_version' => 'v1.24.0',
      'version' => '1.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '749045c69efb97c70d25d7463abba812e91f3a44',
    ),
    'symfony/polyfill-intl-normalizer' => 
    array (
      'pretty_version' => 'v1.24.0',
      'version' => '1.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '8590a5f561694770bdcd3f9b5c69dde6945028e8',
    ),
    'symfony/polyfill-mbstring' => 
    array (
      'pretty_version' => 'v1.24.0',
      'version' => '1.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '0abb51d2f102e00a4eefcf46ba7fec406d245825',
    ),
    'symfony/polyfill-php72' => 
    array (
      'pretty_version' => 'v1.24.0',
      'version' => '1.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '9a142215a36a3888e30d0a9eeea9766764e96976',
    ),
    'symfony/polyfill-php73' => 
    array (
      'pretty_version' => 'v1.24.0',
      'version' => '1.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'cc5db0e22b3cb4111010e48785a97f670b350ca5',
    ),
    'symfony/polyfill-php80' => 
    array (
      'pretty_version' => 'v1.24.0',
      'version' => '1.24.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '57b712b08eddb97c762a8caa32c84e037892d2e9',
    ),
    'symfony/process' => 
    array (
      'pretty_version' => 'v5.4.3',
      'version' => '5.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '553f50487389a977eb31cf6b37faae56da00f753',
    ),
    'symfony/service-contracts' => 
    array (
      'pretty_version' => 'v2.5.0',
      'version' => '2.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => '1ab11b933cd6bc5464b08e81e2c5b07dec58b0fc',
    ),
    'symfony/string' => 
    array (
      'pretty_version' => 'v5.4.3',
      'version' => '5.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => '92043b7d8383e48104e411bc9434b260dbeb5a10',
    ),
    'symfony/translation' => 
    array (
      'pretty_version' => 'v5.4.3',
      'version' => '5.4.3.0',
      'aliases' => 
      array (
      ),
      'reference' => 'a9dd7403232c61e87e27fb306bbcd1627f245d70',
    ),
    'symfony/translation-contracts' => 
    array (
      'pretty_version' => 'v2.5.0',
      'version' => '2.5.0.0',
      'aliases' => 
      array (
      ),
      'reference' => 'd28150f0f44ce854e942b671fc2620a98aae1b1e',
    ),
    'symfony/translation-implementation' => 
    array (
      'provided' => 
      array (
        0 => '2.3',
      ),
    ),
    'voku/portable-ascii' => 
    array (
      'pretty_version' => '1.6.1',
      'version' => '1.6.1.0',
      'aliases' => 
      array (
      ),
      'reference' => '87337c91b9dfacee02452244ee14ab3c43bc485a',
    ),
  ),
);
private static $canGetVendors;
private static $installedByVendor = array();







public static function getInstalledPackages()
{
$packages = array();
foreach (self::getInstalled() as $installed) {
$packages[] = array_keys($installed['versions']);
}


if (1 === \count($packages)) {
return $packages[0];
}

return array_keys(array_flip(\call_user_func_array('array_merge', $packages)));
}









public static function isInstalled($packageName)
{
foreach (self::getInstalled() as $installed) {
if (isset($installed['versions'][$packageName])) {
return true;
}
}

return false;
}














public static function satisfies(VersionParser $parser, $packageName, $constraint)
{
$constraint = $parser->parseConstraints($constraint);
$provided = $parser->parseConstraints(self::getVersionRanges($packageName));

return $provided->matches($constraint);
}










public static function getVersionRanges($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

$ranges = array();
if (isset($installed['versions'][$packageName]['pretty_version'])) {
$ranges[] = $installed['versions'][$packageName]['pretty_version'];
}
if (array_key_exists('aliases', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['aliases']);
}
if (array_key_exists('replaced', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['replaced']);
}
if (array_key_exists('provided', $installed['versions'][$packageName])) {
$ranges = array_merge($ranges, $installed['versions'][$packageName]['provided']);
}

return implode(' || ', $ranges);
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['version'])) {
return null;
}

return $installed['versions'][$packageName]['version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getPrettyVersion($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['pretty_version'])) {
return null;
}

return $installed['versions'][$packageName]['pretty_version'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getReference($packageName)
{
foreach (self::getInstalled() as $installed) {
if (!isset($installed['versions'][$packageName])) {
continue;
}

if (!isset($installed['versions'][$packageName]['reference'])) {
return null;
}

return $installed['versions'][$packageName]['reference'];
}

throw new \OutOfBoundsException('Package "' . $packageName . '" is not installed');
}





public static function getRootPackage()
{
$installed = self::getInstalled();

return $installed[0]['root'];
}







public static function getRawData()
{
return self::$installed;
}



















public static function reload($data)
{
self::$installed = $data;
self::$installedByVendor = array();
}




private static function getInstalled()
{
if (null === self::$canGetVendors) {
self::$canGetVendors = method_exists('Composer\Autoload\ClassLoader', 'getRegisteredLoaders');
}

$installed = array();

if (self::$canGetVendors) {
foreach (ClassLoader::getRegisteredLoaders() as $vendorDir => $loader) {
if (isset(self::$installedByVendor[$vendorDir])) {
$installed[] = self::$installedByVendor[$vendorDir];
} elseif (is_file($vendorDir.'/composer/installed.php')) {
$installed[] = self::$installedByVendor[$vendorDir] = require $vendorDir.'/composer/installed.php';
}
}
}

$installed[] = self::$installed;

return $installed;
}
}
