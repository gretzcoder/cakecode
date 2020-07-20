<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!empty($data['user']['role_id']) && $data['user']['role_id'] == 2) {
            redirect('main');
        } else if (!empty($data['user']['role_id']) && $data['user']['role_id'] == 1) {
            redirect('admin/productmanagement');
        }
        $this->form_validation->set_rules('email', '<strong>Email</strong>', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', '<strong>Password</strong>', 'required|trim');
        $data['email'] = set_value('email');


        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Sign in | CakeCode';

            $this->load->view('templates/header', $data);
            $this->load->view('login', $data);
            $this->load->view('templates/footer');
        } else {
            $user = $this->db->get_where('user', ['email' => $this->input->post('email')])->row_array();
            if ($user) {
                if (password_verify($this->input->post('password'), $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    if ($user['role_id'] == 1) {
                        $this->session->set_userdata($data);
                        redirect('admin/productmanagement');
                    } else {
                        $this->session->set_userdata($data);
                        redirect('main');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered.</div>');
                redirect('auth');
            }
        }
    }

    public function signup()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if (!empty($data['user']['role_id']) && $data['user']['role_id'] == 2) {
            redirect('main');
        } else if (!empty($data['user']['role_id']) && $data['user']['role_id'] == 1) {
            redirect('admin/productmanagement');
        }
        $this->form_validation->set_rules('username', '<strong>Username</strong>', 'is_unique[user.username]|trim');
        $this->form_validation->set_rules('email', '<strong>Email</strong>', 'required|trim|valid_email|is_unique[user.email]');
        $this->form_validation->set_rules('password1', '<strong>Password</strong>', 'required|trim');
        $this->form_validation->set_rules('password2', '<strong>Password</strong>', 'required|trim|matches[password1]|min_length[6]');

        if ($this->form_validation->run() == FALSE) {

            $data['title'] = 'Sign up | CakeCode';

            $this->load->view('templates/header', $data);
            $this->load->view('signup');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username'), true),
                'email' => htmlspecialchars($this->input->post('email'), true),
                'password' => htmlspecialchars(password_hash($this->input->post('password1'), PASSWORD_DEFAULT), true),
                'role_id' => '2',
                'date_created' => date("Y-m-d", time())
            ];

            $this->db->insert('user', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! Your account has been created. Please login</div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        unset($_SESSION['email'],
        $_SESSION['role_id']);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You has been logged out.</div>');
        redirect('auth');
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
