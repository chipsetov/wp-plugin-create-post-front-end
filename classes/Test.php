<?php

class Test
{
    public function __construct()
    {
//        add_action('wp_ajax_nopriv_getFormTest', array($this, 'getFormTest'));
       add_action('wp_ajax_nopriv_createPost', array($this, 'createPost'));
//        add_action('wp_ajax_getFormTest', array($this, 'getFormTest'));
       add_action('wp_ajax_createPost', array($this, 'createPost'));
        add_action('wp_enqueue_scripts', array($this, 'addJS'));
        add_shortcode('createPostShortcode', array($this, 'createPostShortcode'));
    }

    function addJS()
    {
        wp_enqueue_script('getForm', plugins_url('../js/getFormData.js', __FILE__), array('jquery'), NULL, true);
        // wp_enqueue_script('getFormm', plugins_url('../getFormData.js', __FILE__), array('jquery'), NULL, true);
        wp_localize_script('getForm', 'getdata_form', array(
            'ajax_url' => admin_url('admin-ajax.php')
        ));
    }

    function createPost()
    {
        try {
            $post_data = array(
                'post_title' => wp_strip_all_tags($_POST['title']),
                'post_content' => $_POST['body'],
                'post_status' => 'publish',
                'post_author' => 1,
                'post_category' => array($_POST['cat'])
            );

            $post_id = wp_insert_post($post_data);
            echo "Post created";
        } catch (Exception $e) {
            echo 'Error : ',  $e->getMessage(), "\n";
        }
        wp_die();
    }

    public function createPostShortcode()
    {
        ?>

        <fieldset>
            <legend>Add new post</legend>
            Title: <input type="text" name="title"><br>
            Body:
            <textarea rows="4" name="body"></textarea>

            <?php wp_dropdown_categories('hide_empty=0'); ?><br>
            <button type="button" id="createpost">Create post</button>
        </fieldset>


        <?php

    }
}

new Test;