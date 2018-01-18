<?
class Crypt {

    public $settings;
    
    function __construct($conf) {
        foreach ($conf['routes'] as $route) APP::Module('Routing')->Add($route[0], $route[1], $route[2]);
    }
    
    public function Init() {
        $this->settings = APP::Module('Registry')->Get([
            'module_crypt_key',
            'module_crypt_cipher'
        ]);
        
        if (mb_strlen($this->settings['module_crypt_key'], '8bit') !== 32) {
            throw new Exception('Needs a 256-bit key!');
        }
    }
    
    public function Admin() {
        return APP::Render('crypt/admin/nav', 'content');
    }
    
    
    public function SafeB64Encode($string) {
        $data = base64_encode($string);
        
        return str_replace(['+', '/', '='], ['-', '_', ''], $data);
    }

    public function SafeB64Decode($string) {
        $data = str_replace(['-', '_', ''], ['+', '/', '='], $string);
        $mod4 = strlen($data) % 4;
        
        if ($mod4) $data .= substr('====', $mod4);

        return base64_decode($data);
    }

    public function Encode($value) {
        if (!$value) return false;
        
        $ivsize = openssl_cipher_iv_length($this->settings['module_crypt_cipher']);
        $iv = openssl_random_pseudo_bytes($ivsize);
        $ciphertext = openssl_encrypt($value, $this->settings['module_crypt_cipher'], $this->settings['module_crypt_key'], OPENSSL_RAW_DATA, $iv);

        return trim($this->SafeB64Encode($iv . $ciphertext));
    }

    public function Decode($value) {
        if (!$value) return false;
        
        $value = $this->SafeB64Decode($value);
        $ivsize = openssl_cipher_iv_length($this->settings['module_crypt_cipher']);
        $iv = mb_substr($value, 0, $ivsize, '8bit');
        $ciphertext = mb_substr($value, $ivsize, null, '8bit');

        return trim(openssl_decrypt($ciphertext, $this->settings['module_crypt_cipher'], $this->settings['module_crypt_key'], OPENSSL_RAW_DATA, $iv));
    }

    /*
    public function Encode($value) {
        if (!$value) return false;
        return trim($this->SafeB64Encode(openssl_encrypt($value, $this->settings['module_crypt_cipher'], $this->settings['module_crypt_key'], OPENSSL_RAW_DATA, $this->StrToHex('0000'))));
    }

    public function Decode($value) {
        if (!$value) return false;
        return trim(openssl_decrypt($this->SafeB64Decode($value), $this->settings['module_crypt_cipher'], $this->settings['module_crypt_key'], OPENSSL_RAW_DATA, $this->StrToHex('0000')));
    }

    public function StrToHex($string) {
        $string = str_split($string);
        foreach($string as &$char) $char = "\x".dechex(ord($char));
        return implode('',$string);
    }
    */

    public function Settings() {
        APP::Render('crypt/admin/index');
    }

    
    public function APIEncode() {
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');
        
        echo json_encode([
            'result' => APP::Module('Crypt')->Encode($_POST['string'])
        ]);
        exit;
    }
    
    public function APIDecode() {
        header('Access-Control-Allow-Headers: X-Requested-With, Content-Type');
        header('Access-Control-Allow-Origin: ' . APP::$conf['location'][1]);
        header('Content-Type: application/json');
        
        echo json_encode([
            'result' => APP::Module('Crypt')->Decode($_POST['string'])
        ]);
        exit;
    }
    

    public function APIUpdateSettings() {
        APP::Module('Registry')->Update(['value' => $_POST['module_crypt_key']], [['item', '=', 'module_crypt_key', PDO::PARAM_STR]]);

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
