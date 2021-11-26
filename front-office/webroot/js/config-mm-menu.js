jQuery(document).ready(function( $ ) {
  $("nav#menu").mmenu({
     "extensions": [
        "pagedim-black",
        "shadow-page"
     ],
     "offCanvas": {
        zposition   : "front"
     },
     "searchfield" : {
     "placeholder" : 'Besoin de couches ?'
    },
    "navbar" : {
            title : 'WERP Store'
          },
     "navbars": [
        {
           "position": "top",
           "content": [
             '<a href="index.php"><img src="images/logo.jpg" class="img-responsive" alt="Image"></a>'
           ]
        },
        {
          "position"  : 'top',
          "content"   : [ 'searchfield' ]
        }, {
          "position"  : 'top',
          "content"   : [ 'breadcrumbs' ]
        }
     ]
  });
});