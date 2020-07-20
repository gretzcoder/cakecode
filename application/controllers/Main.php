<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['product'] = $this->db->query("SELECT * FROM product WHERE find_in_set('best-seller', category) AND status=1 LIMIT 8")->result_array();
        $data['title'] = 'CakeCode';

        $this->load->view('templates/header', $data);
        $this->load->view('index', $data);
        $this->load->view('templates/footer');
    }
    public function maintenance()
    {
        $data['title'] = 'Maintenance';

        $this->load->view('admin/templates/header', $data);
        $this->load->view('404', $data);
        $this->load->view('admin/templates/footer');
    }

    public function product($category = null)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!empty($_GET['title'])) {
            $title = $_GET['title'];
            $data['category'] = null;
            $data['search'] = $_GET['title'];
            $data['product'] = $this->db->query("SELECT * FROM product WHERE title LIKE '%$title%'")->result_array();
        } else {
            $data['category'] = $category;
            $data['product'] = $this->db->query("SELECT * FROM product WHERE find_in_set('$category', category) AND status=1")->result_array();
        }
        $data['title'] = 'CakeCode';

        $this->load->view('templates/header', $data);
        $this->load->view('product', $data);
        $this->load->view('templates/footer');
    }
}
