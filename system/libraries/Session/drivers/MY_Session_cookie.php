<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once SYSDIR . '/libraries/Driver.php';
require_once SYSDIR . '/libraries/Session/Session.php';
require_once SYSDIR . '/libraries/Session/drivers/Session_cookie.php';

class MY_Session_cookie extends CI_Session_cookie
{

    public function __construct()
    {
        parent::__construct();
        log_message('info', 'MY_Session_cookie loaded');
    }

    protected function _sess_update($force = false)
    {

        // Do NOT update an existing session on AJAX calls.
        if ($force || !$this->CI->input->is_ajax_request())
            return parent::_sess_update($force);
    }
    
    // --------------------------------------------------------------------

        /**
        * sess_destroy()
        *
            * Clear's out the user_data array on sess::destroy.
            *
            * @access    public
            * @return    void
            */
        public function sess_destroy()
        {
        $this->userdata = array();

        parent::sess_destroy();
        }

}

/* End of file MY_Session_cookie.php */
/* Location: ./system/libraries/Session/drivers/MY_Session_cookie.php */ 