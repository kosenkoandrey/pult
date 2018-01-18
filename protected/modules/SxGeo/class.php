<?
class SxGeo {

    public $settings;
    public $db;
    
    function __construct($conf) {
        foreach ($conf['routes'] as $route) APP::Module('Routing')->Add($route[0], $route[1], $route[2]);
    }
    
    public function Init() {
        $this->settings = APP::Module('Registry')->Get([
            'module_sxgeo_source_url',
            'module_sxgeo_tmp_dir'
        ]);
        
        $module_dir = ROOT . '/protected/modules/SxGeo';

        if (file_exists($module_dir . '/SxGeoCity.dat')) {
            include_once ROOT . '/protected/class/sxgeo.php';
            $this->db = new SxGeoClass($module_dir . '/SxGeoCity.dat', SXGEO_BATCH | SXGEO_MEMORY);
        }
    }
    
    public function Test() {
        ?><pre><? print_r($this->db->getCityFull(APP::Module('Utils')->ClientIP())); ?></pre><?
    }
    
    public function Admin() {
        return APP::Render('sxgeo/admin/nav', 'content');
    }

    
    public function UpdateDB() {
        $tmp_file = $this->settings['module_sxgeo_tmp_dir'] . '/sxgeo.zip';
        $file = fopen($tmp_file, 'w');
        $module_dir = ROOT . '/protected/modules/SxGeo';
        
        APP::Module('Utils')->Curl([
            'url' => $this->settings['module_sxgeo_source_url'],
            'file' => $file
        ]);

        fclose($file);

        $zip = new ZipArchive;
        $zip->open($tmp_file);
        $zip->extractTo($module_dir, ['SxGeoCity.dat']);
        $zip->close();
        
        unlink($tmp_file);
    }
    
    
    public function Settings() {
        APP::Render('sxgeo/admin/settings');
    }
    
    
    public function APIUpdateSettings() {
        APP::Module('Registry')->Update(['value' => $_POST['module_sxgeo_source_url']], [['item', '=', 'module_sxgeo_source_url', PDO::PARAM_STR]]);
        APP::Module('Registry')->Update(['value' => $_POST['module_sxgeo_tmp_dir']], [['item', '=', 'module_sxgeo_tmp_dir', PDO::PARAM_STR]]);
        
        APP::Module('Triggers')->Exec('sxgeo_update_settings', [
            'source_url' => $_POST['module_sxgeo_source_url'],
            'tmp_dir' => $_POST['module_sxgeo_tmp_dir']
        ]);
        
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');
        
        echo json_encode([
            'status' => 'success',
            'errors' => []
        ]);
        exit;
    }

}