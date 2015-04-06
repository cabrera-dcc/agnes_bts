/**
* jQuery plugin for Agnes, the bug tracking system
*
* Gets the url params
* jquery.get-url-params.js from https://github.com/cabrera-dcc/agnes_bts
*
* @author cabrera-dcc (http://cabrera-dcc/github.io)
* @copyright Copyright (c) 2012, Rodrigo Asensio (http://www.rodrigoasensio.com/2012/04/como-obtener-los-parametros-del-la-url-con-jquery/)
* @license GNU General Public License (GPLv3 - https://github.com/cabrera-dcc/agnes_bts/blob/master/LICENSE)
* @version Beta-1 (rev. 20150406)
*/

(function($) {  
    jQuery.get = function(key)   {  
        key = key.replace(/[\[]/, '\\[');  
        key = key.replace(/[\]]/, '\\]');  
        var pattern = "[\\?&]" + key + "=([^&#]*)";  
        var regex = new RegExp(pattern);  
        var url = unescape(window.location.href);  
        var results = regex.exec(url);  
        if (results === null) {  
            return null;  
        } else {  
            return results[1];  
        }  
    } 
})(jQuery);  