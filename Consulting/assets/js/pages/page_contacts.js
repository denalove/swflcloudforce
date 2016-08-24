

var ContactPage = function () {

    return {
        
    	//Basic Map
        initMap: function () {
			var map;
			$(document).ready(function(){
			  map = new GMaps({
				div: '#map',
				scrollwheel: false,				
				lat: 26.644164,
				lng: -81.870074
			  });
			  
			  var marker = map.addMarker({
				lat: 26.644164,
				lng: -81.870074,
	            title: 'SWFL CRM Specialists'
		       });
			});
        },

        //Panorama Map
        initPanorama: function () {
		    var panorama;
		    $(document).ready(function(){
		      panorama = GMaps.createPanorama({
		        el: '#panorama',
		        lat : 26.644164,
		        lng : -81.870074
		      });
		    });
		}        

    };
}();