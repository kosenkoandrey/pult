<?
APP::$insert['css_datetimepicker'] = ['css', 'file', 'after', '</title>', APP::Module('Routing')->root . 'public/ui/vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css'];
?>
<style>
    #mail-list-chart {
        width: 100%;
	height: 300px;
	font-size: 14px;
	line-height: 1.2em;
    }
    
    #mail-list-legend{
        background-color: #fff;
        margin-bottom:8px;
        margin:0 auto;
        display:inline-block;
        border-radius: 3px 3px 3px 3px;
        border: 1px solid #E6E6E6;
    }
    
    #mail-list-legend td{
        padding: 5px;
    }
</style>