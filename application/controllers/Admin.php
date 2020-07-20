<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
    public function usermanagement()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user']['role_id'] == 2) {
            redirect('main');
        } else if (empty($data['user'])) {
            redirect('auth');
        }
        $data['alluser'] = $this->db->get('user')->result_array();
        $data['title'] = 'Admin | CakeCode';
        $data['usermanagement'] = 'active';

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar');
        $this->load->view('admin/user_management', $data);
        $this->load->view('admin/templates/footer', $data);
    }

    public function productmanagement()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user']['role_id'] == 2) {
            redirect('main');
        } else if (empty($data['user'])) {
            redirect('auth');
        }
        $data['product'] = $this->db->get('product')->result_array();
        $data['title'] = 'Admin | CakeCode';
        $data['produk'] = 'active';

        $this->load->view('admin/templates/header', $data);
        $this->load->view('admin/templates/sidebar', $data);
        $this->load->view('admin/templates/topbar');
        $this->load->view('admin/product_management', $data);
        $this->load->view('admin/templates/footer');
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
        $this->session->set_flashdata('flash', 'deleted.');
        redirect('admin/usermanagement');
    }
    public function deleteproduct($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('product');
        $this->session->set_flashdata('message', 'Product deleted.');
        redirect('admin/productmanagement');
    }

    public function editProduct($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user']['role_id'] == 2) {
            redirect('main');
        } else if (empty($data['user'])) {
            redirect('auth');
        }
        $data['product'] = $this->db->get_where('product', ['id' => $id])->row_array();
        $data['title'] = 'Admin | CakeCode';
        $data['produk'] = 'active';
        $categories = $this->db->query("SELECT `COLUMN_TYPE` FROM `information_schema`.`COLUMNS` WHERE `TABLE_SCHEMA` = 'cakecode' AND `TABLE_NAME` = 'product' AND `COLUMN_NAME` = 'category'")->result_array();
        $set  = $categories['0']['COLUMN_TYPE'];
        // Remove "set(" at start and ");" at end.
        $set  = substr($set, 5, strlen($set) - 7);
        // Split into an array.
        $data['categories'] = (preg_split("/','/", $set));
        $data['category'] = (preg_split("/,/", $data['product']['category']));

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar');
            $this->load->view('admin/editproduct', $data);
            $this->load->view('admin/templates/footer');
        } else {
            $upload_image = $_FILES['photo']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/product';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('photo')) {
                    $new_image = $this->upload->data('file_name');
                    $old_image = $data['product']['photo'];

                    $this->db->set('photo', $new_image);
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/product/' . $old_image);
                    }
                } elseif (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('message', 'Select image with gif/jpg/png type and less than 2048 kb!');
                    $this->load->view('admin/templates/header', $data);
                    $this->load->view('admin/templates/sidebar', $data);
                    $this->load->view('admin/templates/topbar');
                    $this->load->view('admin/editproduct', $data);
                    $this->load->view('admin/templates/footer');
                }
            }

            $data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'price' => $this->input->post('price'),
                'category' => implode(",", $this->input->post('category')),
                'status' => $this->input->post('status')
            ];

            $this->db->where('id', $id);
            $this->db->update('product', $data);
            $this->session->set_flashdata('message', 'Product updated!');
            redirect(base_url('admin/productmanagement'));
        }
    }

    public function addProduct()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user']['role_id'] == 2) {
            redirect('main');
        } else if (empty($data['user'])) {
            redirect('auth');
        }
        $data['title'] = 'Admin | CakeCode';
        $data['produk'] = 'active';

        $categories = $this->db->query("SELECT `COLUMN_TYPE` FROM `information_schema`.`COLUMNS` WHERE `TABLE_SCHEMA` = 'cakecode' AND `TABLE_NAME` = 'product' AND `COLUMN_NAME` = 'category'")->result_array();
        $set  = $categories['0']['COLUMN_TYPE'];
        // Remove "set(" at start and ");" at end.
        $set  = substr($set, 5, strlen($set) - 7);
        // Split into an array.
        $data['categories'] = (preg_split("/','/", $set));

        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('description', 'Description', 'required|trim');
        $this->form_validation->set_rules('price', 'Price', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/templates/sidebar', $data);
            $this->load->view('admin/templates/topbar');
            $this->load->view('admin/addproduct');
            $this->load->view('admin/templates/footer');
        } else {
            $upload_image = $_FILES['photo']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/product';

                $this->load->library('upload', $config);
                $this->upload->do_upload('photo');

                $data = [
                    'title' => htmlspecialchars($this->input->post('title'), true),
                    'description' => htmlspecialchars($this->input->post('description'), true),
                    'price' => htmlspecialchars($this->input->post('price'), true),
                    'status' => htmlspecialchars($this->input->post('status'), true),
                    'category' => implode(",", $this->input->post('category')),
                    'photo' => $this->upload->data('file_name')
                ];

                $this->db->insert('product', $data);
                $this->session->set_flashdata('message', 'Product uploaded!');
                redirect(base_url('admin/productmanagement'));
                if (!$this->upload->do_upload('photo')) {
                    $this->session->set_flashdata('message', 'Select image with gif/jpg/png type and less than 2048 kb!');

                    $this->load->view('admin/templates/header', $data);
                    $this->load->view('admin/templates/sidebar', $data);
                    $this->load->view('admin/templates/topbar');
                    $this->load->view('admin/addproduct');
                    $this->load->view('admin/templates/footer');
                }
            } elseif (!$upload_image) {
                $data = [
                    'title' => htmlspecialchars($this->input->post('title'), true),
                    'description' => htmlspecialchars($this->input->post('description'), true),
                    'price' => htmlspecialchars($this->input->post('price'), true),
                    'category' => implode(",", $this->input->post('category')),
                    'status' => htmlspecialchars($this->input->post('status'), true),
                    'photo' => 'default.jpg'
                ];

                $this->db->insert('product', $data);
                $this->session->set_flashdata('message', 'Product uploaded!');
                redirect(base_url('admin/productmanagement'));
            }
        }
    }
}
