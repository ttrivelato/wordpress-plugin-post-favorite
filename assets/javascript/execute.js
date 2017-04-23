/**
 * @function favorite
 * Add Data to favorite
 * @Param id int
 */
function favorite(id){
    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        
        data: {"action": "update_favorites","IdFavorite":id},
        success: function (response) {
            
            //IMG FOLDER + IMG ON
            var favorite_on = '/wp-content/plugins/wordpress-plugin-post-favorite/assets/images/favorite_on.png';
            
            jQuery('a[data-id-favorite="' + id + '"] .star-favorite').attr('src', favorite_on);
            jQuery('a[data-id-favorite="' + id + '"] .star-favorite').closest('a').removeClass('add-favorite').addClass('remove-favorite');
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

/**
 * @function remove
 * Remove data favorite
 * @Param id int
 */
function remove(id){
    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        data: {"action": "remove_favorites","IdFavorite":id},
        
        success: function (response) {
            
            //IMG FOLDER + IMG OFF
            var favorite_off = '/wp-content/plugins/wordpress-plugin-post-favorite/assets/images/favorite_off.png';
            
            
            jQuery('a[data-id-favorite="' + id + '"] .star-favorite').attr('src', favorite_off);
            jQuery('a[data-id-favorite="' + id + '"] .star-favorite').closest('a').removeClass('remove-favorite').addClass('add-favorite');

        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

function mountWidget(){
    
    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        data: {"action": "get_title_favorites"},
        
        success: function (response) {
            jQuery("#log-favorite-widget").html('');
            jQuery.each(response, function( key, value ){
                jQuery("#log-favorite-widget").append('<li>'+value+'</li>');
            });
        },
        
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
        
    });
}

function embedFavorite(){
    jQuery.ajax({
        type: "POST",
        url: "/wp-admin/admin-ajax.php",
        
        data: {"action": "get_title_favorites"},
        
        success: function(response) {

            //Verify if favorite is empty
            if(response.length == 0) {
               
                jQuery("#log-favorite-widget").html('Favorites is empty');
                jQuery("#log-favorite-shortcode").html('Favorites is empty');
            
            } else {
                 jQuery("#log-favorite-widget").html('');
                 jQuery("#log-favorite-shortcode").html('');

                 jQuery.each(response, function(key, value) {

                     jQuery("#log-favorite-widget").append('<li><a href=?p='+key+'>'+value+'</a></li>');
                     jQuery("#log-favorite-shortcode").append('<li><a href=?p='+key+'>'+value+'</a></li>');
                 });
            }
        },
        
        error: function(jqXHR, textStatus, errorThrown) {
            console.log(textStatus, errorThrown);
        }
    });
}

jQuery(document).on('click', ".add-favorite", function () {
    favorite(jQuery(this).attr('data-id-favorite'));
    setTimeout(function(){
        embedFavorite();
    }, 1000);
});

jQuery(document).on('click', ".remove-favorite", function () {
    remove(jQuery(this).attr('data-id-favorite'));
    setTimeout(function(){
        embedFavorite();
    }, 1000);
});