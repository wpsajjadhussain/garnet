jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
    
    $('#misha_loadmore_btn').click(function(){
        var excludeStickyPost = "";
        if($('#excludeStickyPost').length>0){
            excludeStickyPost = $('#excludeStickyPost').val();
        }
        var button = $(this),
            postType = $('#postType').val(),
            templateParts = $('#templateParts').val(),
            termId = $('#termId').val(),
            buttonText = $(this).text(),
            pageId = $('#pageId').val(),
            data = {
                'action': 'loadmore',
                'query': misha_loadmore_params.posts, // that's how we get params from wp_localize_script() function
                'page' : misha_loadmore_params.current_page,
                'postType' : postType,
                'templateParts' : templateParts,
                'termId' : termId,
                'pageId' : pageId,
                'excludeStickyPost' : excludeStickyPost
            };

        $.ajax({ // you can also use $.post here
            url : misha_loadmore_params.ajaxurl, // AJAX handler
            data : data,
            type : 'POST',
            beforeSend : function ( xhr ) {
                button.text('Loading...'); // change the button text, you can also add a preloader image
                $('.all-articles .posts_not_found').css('display', 'none');
            },
            success : function( data ){
                button.text(buttonText); // insert new posts
                if( data ) {
                    $('.all-articles > #posts').append( data ); // insert new posts
                    misha_loadmore_params.current_page++;
					
                    if ( misha_loadmore_params.current_page == misha_loadmore_params.max_page )
                        button.hide(); // if last page, remove the button

                    // you can also fire the "post-load" event here if you use a plugin that requires it
                    // $( document.body ).trigger( 'post-load' );
                } else {
                    button.hide(); // if no data, remove the button as well
                }
            }
        });
    });

    /*
     * Filter
     */
    $('#misha_filters ul li').click(function(){
        var termId = $(this).data('value');
        $('#misha_filters ul li').removeClass('active');
        $(this).addClass('active');
        $('#termId').val(termId);
        $.ajax({
            url : misha_loadmore_params.ajaxurl,
            data : $('#misha_filters').serialize(), // form data
            dataType : 'json', // this data type allows us to receive objects from the server
            type : 'POST',
            beforeSend : function(xhr){
                $('.all-articles .posts_not_found').css('display', 'none');
            },
            success : function( data ){

                if(data.content){
                    // set the current page to 1
                    misha_loadmore_params.current_page = 1;

                    // set the new query parameters
                    misha_loadmore_params.posts = data.posts;

                    // set the new max page parameter
                    misha_loadmore_params.max_page = data.max_page;

                    // insert the posts to the container
                    $('.all-articles > #posts').html( data.content ); // insert new posts

                    // hide load more button, if there are not enough posts for the second page
                    if ( data.max_page < 2 ) {
                        $('#misha_loadmore_btn').hide();
                    } else {
                        $('#misha_loadmore_btn').show();
                    }
                }
                else{
                    $('.all-articles > #posts').html('');
                    $('#misha_loadmore_btn').hide();
                    $('.all-articles .posts_not_found').css('display', 'block');
                }
            }
        });

        // do not submit the form
        return false;

    });

});