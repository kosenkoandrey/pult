<?
class Emoji {

    function __construct($conf) {
        foreach ($conf['routes'] as $route) APP::Module('Routing')->Add($route[0], $route[1], $route[2]);
    }
    
    public function Admin() {
        return APP::Render('emoji/admin/nav', 'content');
    }
    
    public function Manage() {
        APP::Render('emoji/admin/manage', 'include', glob(ROOT . '/public/ui/img/emoji/*.{png}', GLOB_BRACE));
    }

}
